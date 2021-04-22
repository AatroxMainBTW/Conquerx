<?php

namespace App\Http\Controllers;

use App\Models\Profile;
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
        $likes = $profile->user->likes;
        $follows = (auth()->user()) ? auth()->user()->follows->contains($profile->id) : false;
        return view('profiles.show')->with(['profile' => $profile, 'follows' => $follows, 'likes' => $likes]);
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
}
