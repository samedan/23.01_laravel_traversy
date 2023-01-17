<x-mail::message>
# Your post was liked

{{ $likerOfPost->name }} liked one of your posts.

{{-- <x-mail::button :url="{{ route('posts.show', $post)}}"> --}}
{{-- <x-mail::button :url="{{$post->id}}">
  View post
</x-mail::button> --}}
@component('mail::button', ['url' => env('APP_URL')."/posts/".$post->id])
View post
@endcomponent


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
