<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function __construct()
    {
    }






    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'caption' => 'required',
            'image' => ['required', 'image']
        ]);
        $imagePath = request('image')->store('upload', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        return redirect(route('profile.show', ['profile' => auth()->user()->profile->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $profile = $post->user->profile;
        $likes = (auth()->user()) ? auth()->user()->likes->contains($post->id) : false;
        $user_all = User::All();

        $comments = Comment::select('*')->where('commentable_id', $post->id)->get();


        return view('posts.show', [
            'post' => $post,
            'likes' => $likes,
            'profile' => $profile,
            'comments' => $comments,
            'user_all' => $user_all
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
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
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function like(Post $post)
    {
        return auth()->user()->likes()->toggle($post->id);
    }

    public function comment(Request $request, Post $post)
    {
        $data = $request->validate([
            'comments' => 'required',
        ]);

        $comment = $post->comments->create([
            'body' => $data['comments']
        ]);
        dd($comment);
    }
}
