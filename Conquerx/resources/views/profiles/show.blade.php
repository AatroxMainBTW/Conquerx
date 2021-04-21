@extends('layouts.app')

@section('content')

<div class="flex space-x-5 ml-96 mt-20">
<!--Likes and posts design-->
<div class="flex-2 text-right">
    <div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block text-red-500" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
              </svg>
            <span class="text-white font-semibold text-sm">Likes (50)</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
            <span class="text-white font-semibold text-sm">Posts (10)</span>
        </div>
    </div>
</div>
<!--Rest of the profile design-->
<div class="flex-1">
    <div class="flex flex-row">
        <div>
            <img src="/storage/{{$profile->image}}" class="rounded-full w-32 h-32" alt="">
        </div>

        <div class="ml-5 mt-4">
            <div class="text-white font-bold text-2xl">{{$profile->fullname ?? 'You must add it in Edit profile'}}</div>
            <div class="text-white text-base mt-3">{{$profile->username ?? 'You must add username in Edit profile'}}</div>
            <div class="flex flex-row">
                <div class="mr-7 mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                    <span class="text-gray-300 text-sm">{{$profile->address ?? 'you must edit it in Edit profile'}}</span>
                </div>
                <div class="mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                      </svg>
                    <a href="{{$profile->url ?? '#'}}"><span class="text-gray-300 text-sm hover:text-red-500">{{$profile->url ??'you must add address in Edit profile'}}</span></a>
                </div>
            </div>
            <div class="text-gray-400 text-base mt-4">{{$profile->description ?? ''}}</div>
            @auth
                    @if(auth()->user()->id==$profile->user->id)
            <div class="mt-8">
                <!--Follow will be an vue commponent-->
                <a href='#' class="bg-red-500 px-4 py-2 text-white text-sm rounded-full hover:bg-red-700 transition duration-500 mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                      </svg>
                    <span class="pl-2">Follow</span>
                </a>
                <a href="#"  class="bg-red-500 px-4 py-2 text-white text-sm rounded-full hover:bg-red-700 transition duration-500 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                      </svg>
                    <span class="pl-2">Message</span>
                </a>

                <a href="{{route('profile.edit',['profile'=>auth()->user()->profile->id])}}"  class="bg-red-500 px-4 py-2 text-white text-sm rounded-full hover:bg-red-700 transition duration-500 ml-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                    <span class="pl-2">Edit profile</span>
                </a>

                <a href="{{route('post.create')}}"  class="bg-red-500 px-4 py-2 text-white text-sm rounded-full hover:bg-red-700 transition duration-500 ml-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                    <span class="pl-2">Add post</span>
                </a>
            </div>
            @endif
            @endauth
            <div class="grid grid-cols-3 gap-4 mt-10">

                @foreach ( $profile->user->posts as $post )
                <a href="#"><img class="w-40 h-40 rounded-lg" src="/storage/{{$post->image}}" alt=""></a>

                @endforeach
            </div>
        </div>


    </div>
</div>
</div>


@endsection
