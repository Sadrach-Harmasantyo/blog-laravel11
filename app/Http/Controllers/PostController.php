<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $name = 'Alfredo';
        // $age = 20;

        // // $post = Post::all();
        // $posts = [
        //     'post 1',
        //     'post 2',
        //     'post 3',
        //     'post 4',
        //     'post 5',
        // ];

        // return view('posts.index',compact('name','age','posts'));

        $posts = Post::all();

        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required','min:5','max:255'],
            'content' => ['required','min:10'], 
            'thumbnail' => ['required','image'],
        ]);

        $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails');

        auth()->user()->posts()->create($validated);

        // Post::create($validated);

        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);
        Post::findOrFail($post->id);
        // dd($post->thumbnail);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        
        // if($post->user_id !== auth()->id()){
        //     abort(403);
        // }

        Gate::authorize('update', $post);
       return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('update', $post);
        $validated = $request->validate([
            'title' => ['required','min:5','max:255'],
            'content' => ['required','min:10'],
            'thumbnail' => ['sometimes','image'],
        ]);

        if($request->hasFile('thumbnail')){
            File::delete(storage_path('app/public/'.$post->thumbnail));
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        }

        Post::where('id', $post->id)->update($validated);

        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        File::delete(storage_path('app/public/'.$post->thumbnail));
        Post::destroy($post->id);
        return to_route('posts.index');
    }
}
