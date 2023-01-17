@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    
    
  <div class="w-8/12 bg-white p-6 rounded-lg">
    @auth
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
      @endauth

      @guest
            <p class="mb-5"><a href="{{ route('register')}}" class="text-blue-500">Sign up</a> or <a href="{{ route('login')}}" class="text-blue-500">Login</a> if you want to add a post or Like a post.</p>

      @endguest
  
      @if($posts->count())
      @foreach($posts as $post) 
        <x-post :post="$post"/>
      @endforeach
        {{-- Pagination --}}
        {{ $posts->links() }}

    @else 
      <p> {{$user->name}} does not have any posts. </p>
    @endif
    </form>

    
  </div>
  </div>
@endsection
