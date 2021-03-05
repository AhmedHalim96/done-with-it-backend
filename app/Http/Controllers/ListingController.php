<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Listing::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $listing = new Listing;
        $listing->title = $request->title;
        $listing->description = $request->description;
        $listing->price = $request->price;
        $photoPath = $request->file('photo')->store('listings/photos');

        $listing->category_id = $request->category_id;
        $listing->photo = $photoPath;
        if (!$listing->save()) {
            return response()->json(["message" => "Something Wrong happened"], 500);
        }
        return response()->json($listing);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        $listing = Listing::find($id);
        if (!$listing) {
            return response()->json(["message" => "Listing Not Found"], 404);
        }

        $listing['category'] = $listing->category;
        unset($listing->category_id);

        return response()->json($listing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(int $id, Request $request)
    {
        $listing = Listing::find($id);
        if ($request->title) {
            $listing->title = $request->title;
        }

        if ($request->description) {
            $listing->description = $request->description;
        }

        if ($request->photo) {
            Storage::delete($listing->photo);
            $photoPath = $request->file("photo")->store("listings/photos");
            $listing->photo = $photoPath;
        }

        if (!$listing->save()) {
            return response()->json(["message" => "Something Wrong happened"], 500);
        }
        return response()->json($listing);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(int $id)
    {
        $listing = Listing::find($id);
        if (!$listing->delete()) {
            return response()->json(["Internal Server Error"], 500);
        }
        Storage::delete($listing->photo);

        return response()->json(["id" => $listing->id]);
    }
}
