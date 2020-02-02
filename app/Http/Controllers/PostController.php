<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Category;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostCollection;
use Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::with('category')->get();
        // return Response::json($posts);

        $posts = Post::all();
        return new PostCollection($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dump("Image: ", $request->file);

        $title = $request->get('title');
        $content = $request->get('content');
        $category_id = $request->get('category_id');
        $online = $request->get('online');
        $cover_path = $this->uploadCover($request->file("cover"));
        $visits = 0;
        // 'slug'] = Str::slug($value);
            
        Post::create([
            "title" => $title,
            'slug' => Str::slug($title),
            "content" => $content,
            "user_id" => 1,
            "category_id" => $category_id,
            "cover_path" => $cover_path,
            "online" => $online,
            "visits" => $visits,
        ]);
        return response()->json(true);
    }

    private function uploadCover(UploadedFile $file) : string
    {
        $filename = time() . "." . $file->getClientOriginalExtension();
        $file->storeAs("public/covers", $filename);
        return asset("storage/covers/". $filename);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Post $post) : PostResource
    {
        // if(! auth()->user()) {
        //     $post->increment("visits");
        // }

        $post->load(["category", "creator"]);

        return new PostResource($post);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        Storage::delete("public/covers/{$post->cover}");
        return response()->json([], 204);
    }
}
