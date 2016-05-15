@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Username</th>
                        <th>Credential Files</th>
                        <th></th>
                   </tr>
                </thead>
                <tbody>
                @foreach($uploads as $upload)
                    <tr>
                        <td>1</td>
                        <td>{{ $upload->users->username }}</td>
                        <td>{{ $upload->file_name }}</td>
                        <td>Edit| Delete</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop