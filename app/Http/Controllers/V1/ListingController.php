<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ListingResource;
use App\Models\Listing;
use App\Models\Photo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Storage;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    protected function index()
    {
        $categories = Listing::paginate(10);
        return ListingResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreListingRequest $request
     * @return ListingResource
     */
    public function store(StoreListingRequest $request)
    {
        $data = $request->all();
        $photos = $request->file("photos");

        $listing = Listing::create($data);

        if ($photos) {
            foreach ($photos as $photo) {
                $photoPath = $photo->store('listings/photos');
                Photo::create(["url" => $photoPath, "listing_id" => $listing->id]);
            }
        }
        return new ListingResource($listing);
    }

    /**
     * Display the specified resource.
     *
     * @param Listing $listing
     * @return ListingResource
     */
    public function show(Listing $listing)
    {
        return new ListingResource($listing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Listing $listing
     * @param UpdateListingRequest $request
     * @return ListingResource
     */
    public function update(Listing $listing, UpdateListingRequest $request)
    {
        $data = $request->all();
        $photos = $request->file("photos");
        if ($request->hasFile('photos')) {
            foreach ($photos as $photo) {
                $photoPath = $photo->store('listings/photos');
                Photo::create(["url" => $photoPath, "listing_id" => $listing->id]);
            }
        }

        if ($request->deleted_photos) {
            foreach ($request->deleted_photos as $photo) {
                $photoPath = Photo::find($photo)->url;
                Photo::destroy($photo);
                Storage::delete($photoPath);
            }
        }

        $listing->update($data);
        return new ListingResource($listing);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Listing $listing
     * @return Response
     * @throws \Exception
     */
    public function destroy(Listing $listing)
    {
        foreach ($listing->photos as $photo) {
            $photo->delete();
            Storage::delete($photo->url);
        }

        $listing->delete();

        return response(null, \Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);

    }
}
