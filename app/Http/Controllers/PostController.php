<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Hole alle Posts aus der Datenbank
        $posts = Post::all();

        // Gib die Posts zurück
        return $posts;

        // alternativer Einzeiler
        // return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Post::create($request->all());
        
            $validated = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
            ]);

            Post::create([
                'title' => $validated['title'],
                'content' => $validated['content']
            ]);

        return response()->json(['message' => 'Post created successfully'], 201);    
    }

    /** 
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $post = Post::find($id);

        return response()->json($post, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id); // Fehlermeldung inklusive

        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content']
        ]);

        $post->save();      // aktualisiert final, keine Änderung mehr möglich

        return response()->json(['message' => 'Post updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully'], 204);
    }
}
