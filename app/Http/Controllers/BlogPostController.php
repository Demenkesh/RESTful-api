<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// Only Auth user
class BlogPostController extends Controller
{
    // this review all post posted by users
    public function index()
    {
        if (auth()->user()) {

            $blogPosts = BlogPost::all();
            return response()->json($blogPosts);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    // user can create his / her post
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $blogPost = new BlogPost();
        $blogPost->user_id = Auth::id();
        $blogPost->title = $request->title;
        $blogPost->content = $request->content;
        $blogPost->save();
        return response()->json($blogPost, 201);
    }

    //show only user post
    public function show($id)
    {
        $blogPost = BlogPost::findOrFail($id);

        return response()->json($blogPost);
    }
    //only user can update his / her post
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $blogPost = BlogPost::findOrFail($id);

        // Check if the authenticated user is the owner of the blog post
        if ($blogPost->user_id == $blogPost->user_id) {
            $blogPost->user_id = Auth::id();
            $blogPost->title = $request->title;
            $blogPost->content = $request->content;
            $blogPost->update();
            return response()->json($blogPost);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
    //only user can delete his / her post
    public function destroy($id)
    {
        $blogPost = BlogPost::findOrFail($id);

        // Check if the authenticated user is the owner of the blog post
        if ($blogPost->user_id == $blogPost->user_id) {
            $blogPost->delete();

            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
