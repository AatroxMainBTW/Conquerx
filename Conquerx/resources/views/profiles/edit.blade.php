@extends('layouts.app')

@section('content')

    <div class="flex justify-center ">
        <form action="{{route('profile.update',['profile'=>auth()->user()->profile->id])}}" enctype="multipart/form-data" method="POST">
            @method('PATCH')
            @csrf

        <div class="w-80">
            <div class="font-bold text-4xl text-center text-white underline">Edit Profile</div>

            <div class="mb-6 pt-3 rounded bg-gray-200 mt-9">

                <label for="fullname" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                    <span>Fullname</span>

                </label>

                <div>
                    <input id="fullname" type="text" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-500 transition duration-500 pl-4 pt-3 pb-3" name="fullname">
                </div>
            </div>




            <div class="mb-6 pt-3 rounded bg-gray-200 mt-9">

                <label for="username" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                    <span>Username</span>

                </label>

                <div>
                    <input id="username" type="text" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-500 transition duration-500 pl-4 pt-3 pb-3 " name='username'>
                </div>
            </div>

            <div class="mb-6 pt-3 rounded bg-gray-200 mt-9">

                <label for="url" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                      </svg>
                    <span>URL</span>

                </label>

                <div>
                    <input id="url" type="text" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-500 transition duration-500 pl-4 pt-3 pb-3 " name='url'>
                </div>
            </div>


            <div class="mb-6 pt-3 rounded bg-gray-200 mt-9">

                <label for="description" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                      </svg>
                    <span>Description</span>

                </label>

                <div>
                    <input id="description" type="text" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-500 transition duration-500 pl-4 pt-3 pb-3 " name='description'>
                </div>
            </div>


            <div class="mb-6 pt-3 rounded bg-gray-200 mt-9">

                <label for="address" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                    <span>Address</span>

                </label>

                <div>
                    <input id="address" type="text" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-500 transition duration-500 pl-4 pt-3 pb-3 " name='address'>
                </div>
            </div>

            <div class="mb-6 pt-3 rounded bg-gray-200 mt-9">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Profile image</label>

                <input type="file" class="bg-gray-200 rounded w-full text-gray-700" id="image" name="image">
            </div>

            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 rounded-full shadow-lg hover:shadow-xl transition duration-500 w-80">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                <span>Edit</span>
            </button>
        </div>
    </form>
    </div>



@endsection
