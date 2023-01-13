@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    
    
  <div class="w-8/12 bg-white p-6 rounded-lg">
    <form action="{{route('posts')}}" method="POST" class="mb-4">
      @csrf
      <div class="mb-4">
        <label for="body" class="sr-only">Body</label>
        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
          placeholder="Post something interesting!"
        ></textarea>
        @error('body')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message}}

            
          </div>
        @enderror 
      </div>

      <div>
        <button class="bg-blue-500 text-white px-4 py-2 rounded font-medium">
          Post
        </button>
      </div>
  

    </form>

    @if($posts->count())
      @foreach($posts as $post) 
        <div class="mb-4">
          <a href="" class="font-bold">{{ $post->user->username }}</a> <span class="text-grat-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
          <p class="mb-2">{{$post->body }}</p>
          <div class="flex items-center">
            <form action="" method="post" class="mr-1">
              <button type="submit" class="text-blue-500">Like</button>
            </form>
            <form action="" method="post" class="mr-1">
              <button type="submit" class="text-blue-500">Unlike</button>
            </form>
          </div>
        </div>
      @endforeach
{{-- Pagination --}}
        {{ $posts->links() }}

    @else 
      <p> There are no posts.</p>
    @endif
  </div>
  </div>
@endsection
