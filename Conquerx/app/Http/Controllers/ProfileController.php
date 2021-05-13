<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Support\Arr;
use App\Models\Profile;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        $likesTest = Like::select('post_id')->where('user_id', $profile->user->id)->get();
        $followingTest = Follow::select('profile_id')->where('user_id', $profile->user->id)->get();
        $followersTest = Follow::select('user_id')->where('profile_id', $profile->id)->get();


        $likecount = $likesTest->count();
        $followerscount = $followersTest->count();
        $followingcount = $followingTest->count();


        $follows = (auth()->user()) ? auth()->user()->follows->contains($profile->id) : false;
        return view('profiles.show')->with(['profile' => $profile, 'follows' => $follows,  'likecount' => $likecount ?? '0', 'followers' => $followerscount, 'following' => $followingcount]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {

        return view('profiles.edit')->with(['profile' => $profile]);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $data = $request->validate(
            [
                'fullname' => 'required',
                'username' => 'required',
                'url' => 'url',
                'description' => 'required',
                'address' => 'required',
                'image' => 'image'
            ]
        );
        $imagePath = request('image')->store('profile', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
        $image->save();
        $profile->update(array_merge(
            $data,
            ['image' => $imagePath]
        ));
        return redirect(route('profile.show', ['profile' => $profile->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function follow(Profile $profile)
    {
        return auth()->user()->follows()->toggle($profile->id);
    }

    /* public function search()
    {
        $profiles = Profile::search('Star Trek')->get();
        dd($profiles);
    }*/
}
