<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostCollection;

// use JWTAuth;

class CategoryController extends Controller
{

    /**
     * TaskController constructor.
     */
    public function __construct()
    {
        // $this->user = JWTAuth::parseToken()->authenticate();
        // $this->middleware("api")->only(["store", "update", "destroy"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ "names" => "required" ]);
        $categoriesNames = explode(",", $request->get("names"));
        $categoriesSaved = Category::register($categoriesNames);

        return CategoryResource::collection($categoriesSaved);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([ "name" => "required|max:255"]);

        if($request->name !== $category->name) {
            $request->validate(["name" => "unique:categories"]);
        }

        $category->update([
            "name" => $request->name,
            "slug" => Str::slug($request->name)
        ]);

        return new CategoryResource($category);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return response()->json($this->successResponse([], 204));
    }

    public function getPosts(Category $category)
    {
        $posts = $category->posts()->latest()->get();
        return new PostCollection($posts);
    }
}
