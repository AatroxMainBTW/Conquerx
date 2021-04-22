@extends('layouts.app')

@section('content')

<div class="flex flex-row justify-center">
    <div><img class='rounded-xl max-h-96 max-w-96' src="/storage/{{$post->image}}" ></div>
    <div class="text-white ml-4">
        <div>
            <span>{{$profile->username}}</span>
        </div>
        <div><HR WIDTH="100%" SIZE="2"></div>
        <div class="mt-9">Commentaire</div>

    </div>

</div>
<div class="flex flex-row justify-center mt-2 ml-11">
          <like-button post-id="{{$post->id}}" likes="{{$likes}}">
            </like-button>


<button class="bg-red-500 text-sm py-3 px-4 text-white rounded-full hover:bg-red-700 transition duration-500 ml-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
      </svg>
    <span class="ml-2">Comment</span>
</button>
</div>
@endsection
