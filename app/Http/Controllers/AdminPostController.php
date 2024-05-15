<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function edit(Post $post){
        return view('admin.posts.edit',compact('post'));
    }

    public function update(Request $request, Post $post){
        $validated = $request->validate([
            'title' => ['required','min:5','max:255'],
            'content' => ['required','min:10'],
        ]);

        Post::where('id', $post->id)->update($validated);

        return to_route('admin',compact('post'));
    }

    public function destroy(Post $post){
        $post->delete();
        return to_route('admin');
    }
}
