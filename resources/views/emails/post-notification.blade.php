@component('mail::message')
# New Post Alert: {{ $post->title }}

Hi there,

A new post has been published on the website you subscribed to. Here are the details:

@component('mail::panel')
## {{ $post->title }}
{{ $post->content }}
@endcomponent

@component('mail::button', ['url' => url('/posts/'.$post->id)])
Read More
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
