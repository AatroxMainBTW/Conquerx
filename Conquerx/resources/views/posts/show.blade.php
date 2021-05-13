@extends('layouts.app')

@section('content')

<div class="flex flex-row justify-center">

        <!--post will be a component-->
        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white ">
           <img class="w-full" src="/storage/{{$post->image}}" >
            <div class="px-6 py-4 ">
              <p class="text-gray-700 text-base">
                {{$post->caption}}
              </p>
            </div>
            <div class="px-6 pt-4 pb-2">
              <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Likes : {{$post->likers->count()}}</span>
              <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Comment : 40</span>
            </div>

    </div>
     <!--comment will be a component-->
    <div class="text-white ml-4">
        <div>
            <img src="/storage/{{$profile->image}}" class="rounded-full w-10 h-10 inline-block" alt="">
            <span>{{$profile->username}}</span>
        </div>
        <div class="mt-3"><HR WIDTH="100%" SIZE="2"></div>
        <div class="mt-9">
            <div class="max-w-lg rounded overflow-hidden bg-white">
                <div class="px-6 py-4">
                  <div class="font-bold text-xl mb-2 text-black">
                    <img src="/storage/{{$profile->image}}" class="rounded-full w-10 h-10 inline-block" alt="">
                    <span>{{$profile->username}}</span>
                  </div>
                  <p class="text-gray-700 text-base">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                  </p>
                </div>

              </div>
        </div>

    </div>

</div>
<div class="flex flex-row justify-center mt-2 mr-80">
          <like-button post-id="{{$post->id}}" likes="{{$likes}}" >
            </like-button>


<button class="bg-red-500 text-sm py-3 px-4 text-white rounded-full hover:bg-red-700 transition duration-500 ml-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
      </svg>
    <span class="ml-2">Comment</span>
</button>
</div>
@endsection
