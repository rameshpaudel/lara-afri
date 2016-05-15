@extends(config('watchtower.views.layouts.master'))

@section('content')
    <img src="{{ asset('uploads/images/certificates/'.$upload->file_name) }}" alt="">
    Updated At:{{ $upload->updated_at->diffForHumans() }}<br>
    Created At:{{ $upload->created_at->diffForHumans() }}<br>
@stop