<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{

    /**
     * return a list of all categories
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }
}
