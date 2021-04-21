@extends('layouts.app')

@section('content')

<div class="flex justify-center text-center">
<div>
<div class="text-white font-bold text-7xl mt-8">Add post</div>
<div class="border-b-2 border-gray-200"></div>
<div class="mt-8">
    <form action="{{route('post.store')}}" enctype="multipart/form-data" method="post">
        @csrf

        <div class="mb-6 pt-3 rounded bg-gray-200 mt-9">

            <label for="caption" class="block text-gray-700 text-sm font-bold mb-2 ml-3">

                <span>Caption</span>

            </label>

            <div>
                <textarea id="caption" type="text" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-500 transition duration-500 pl-4 pt-3 pb-3 " name='caption' placeholder="Say something :) !!"></textarea>
            </div>
        </div>

        <div class="mb-6 pt-3 rounded bg-gray-200 mt-9">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2 ml-3">image</label>

            <input type="file" class="bg-gray-200 rounded w-full text-gray-700" id="image" name="image">
        </div>

        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 rounded-full shadow-lg hover:shadow-xl transition duration-500 w-80">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            <span>Post</span>
        </button>
    </form>
</div>
</div>
</div>
@endsection
