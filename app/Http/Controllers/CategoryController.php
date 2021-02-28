<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{

    /**
     * return a list of all categories
     *
     * @return Json
     */
    public function index()
    {
        return response()->json(Category::all());
    }
}
