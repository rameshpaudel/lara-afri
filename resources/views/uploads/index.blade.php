@extends(config('watchtower.views.layouts.master'))

@section('content')

    <h1>Uploads
        <div class="btn-group pull-right" role="group" aria-label="...">

            <a href="{{ route('dash.uploads.create') }}">
                <button type="button" class="btn btn-info">
                    <i class="fa fa-plus fa-fw"></i>
                    <span class="hidden-xs hidden-sm">Add New Upload</span>
                </button></a>
        </div>
    </h1>

    <!-- search bar -->
    {{--@include(config('watchtower.views.layouts.search'), [ 'search_route' => 'dash.uploads.index', 'items' => $uploads, 'acl' => 'user' ] )--}}

    <div class="table">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Username</th>
                <th>Image</th>
                <th>Upload</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @forelse($uploads as $upload)
                <tr>
                    <td>{{ $upload->users->username }}</td>
                    <td><img class="img-responsive" src="{{ asset('uploads/images/certificates/' . $upload->file_name) }}" alt="{{  $upload->file_name }}"></td>
                    <td>
                        <a href="{{ route('dash.uploads.show', $upload->id) }}">{{ $upload->file_name }}</a>
                    </td>

                    <td>
                        @if ( Shinobi::can( config('watchtower.acl.user.role', false)) )
                            <a href="{{ route('dash.uploads.show', $upload->id) }}">
                                <button type="button" class="btn btn-primary btn-xs">
                                    <i class="fa fa-users fa-fw"></i>
                                    <span class="hidden-xs hidden-sm">Approve</span>
                                </button></a>
                        @endif

                        @if ( Shinobi::can( config('watchtower.acl.user.edit', false)) )
                            <a href="{{ route('dash.uploads.edit', $upload->id) }}">
                                <button type="button" class="btn btn-default btn-xs">
                                    <i class="fa fa-pencil fa-fw"></i>
                                    <span class="hidden-xs hidden-sm">Update</span>
                                </button></a>
                        @endif


                        @if ( Shinobi::can( config('watchtower.acl.user.destroy', false)) )
                            {!! Form::open(['method'=>'delete','route'=> ['dash.uploads.destroy',$upload->id], 'style' => 'display:inline']) !!}
                            <button type="submit" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash-o fa-lg"></i>
                                <span class="hidden-xs hidden-sm">Delete</span>
                            </button>
                            {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td>There are no users</td></tr>
                @endforelse

                        <!-- pagination -->
            <tfoot>
            <tr>
                <td colspan="3" class="text-center small">

                </td>
            </tr>
            </tfoot>
            </tbody>
        </table>
    </div>

@endsection