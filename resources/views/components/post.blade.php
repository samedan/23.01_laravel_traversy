@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->username }}</a> <span class="text-grat-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
    <p class="mb-2">{{$post->body }}</p>

    {{-- DELETE Post, 'deletePost'is a PostPolicy --}}
    @can('deletePost', $post)
      <form action="{{route('posts.destroy', $post) }}" method="post" class="mr-1">
        @csrf
        {{-- Method spoothing --}}
        @method('DELETE') 
        <button type="submit" class="text-blue-500">Delete</button>
      </form>
    @endcan
    

    <div class="flex items-center">
      @auth 
        @if (!$post->likedBy(auth()->user())) 
          {{-- LIKE --}}
          <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
            @csrf
            <button type="submit" class="text-blue-500">Like</button>
          </form>
        @else 
          {{-- UNLIKE --}}
          <form action="{{route('posts.likes', $post) }}" method="post" class="mr-1">
            @csrf
            {{-- Method spoothing, insert Delete method instead of post --}}
            @method('DELETE') 
            <button type="submit" class="text-blue-500">Unlike</button>
          </form>
        @endif             
      @endauth
      <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>
  </div>
