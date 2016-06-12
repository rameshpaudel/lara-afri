@extends(config('watchtower.views.layouts.master'))

@section('content')

    <h1>Tags</h1>
    <p>Click On a tag to subscribe</p>

    @foreach($posts as $tags)
        @foreach($tags->tags as $tag)
            {!! Form::open( [ 'action' => 'TagsSubscriptionController@subscribe' ,'method' => 'POST'] ) !!}
                {!! Form::hidden('tag_id',$tag->id)  !!}
                <button type="submit"><span class="badge">{{$tag->name}}</span></button>
            {!! Form::close() !!}
        @endforeach
    @endforeach
@stop

