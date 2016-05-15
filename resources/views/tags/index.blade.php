@extends(config('watchtower.views.layouts.master'))

@section('content')

    <h1>Tags</h1>
    <p>Click On a tag to subscribe</p>

    @foreach($posts as $tags)
        @foreach($tags->tags as $tag)
            <a href="{{ action('TagSubscriptionController@subscribe',$tag->id) }}"></a><span class="badge">{{$tag->name}}</span>
        @endforeach
    @endforeach
@stop

