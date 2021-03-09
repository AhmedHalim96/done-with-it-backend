<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ListingResource;
use App\Models\Listing;
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
        $categories = Listing::all();
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
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('listings/photos');
            $data['photo'] = $photoPath;
        }
        $listing = Listing::create($data);

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
        if ($request->hasFile('photo')) {
            Storage::delete($listing->photo);
            $photoPath = $request->file('photo')->store('listings/photos');
            $data['photo'] = $photoPath;
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
        $listing->delete();
        Storage::delete($listing->photo);

        return response(null, \Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);

    }
}