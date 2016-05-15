@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            @if($user->user_registered == '0')
                Hello {{ $personalProfile->first_name }}You are logged in as <span><b>Admin</b></span>
            @elseif($user->user_registered == '1')
                Hello {{ $personalProfile->first_name }}You are logged in as <span><b>Personal Account</b></span>

            @elseif($user->user_registered == '2')
                Hello {{ $personalProfile->first_name }}You are logged in as <span><b>Business Account</b></span>
            @endif
            <h2>Your Personal Information</h2>
            <b>Username:</b> {{ $user->username }}<br>
            <b>Email:</b> {{ $user->email }} <br>

            <b>Country:</b> {{ ucfirst($personalProfile->country) }} <br>
            <b>Date Of Birth:</b> {{ $personalProfile->dob }} <br>
            <h3>Meta info</h3>
                @if($metadata != null)
                    @foreach($metadata as $meta)
                    Title: {{ $meta->meta_title }}
                    Info: {{ $meta->meta_data }}
                    @endforeach
                @endif
                @foreach($user->uploads as $upload)
                    <img src="{{  url('/') . '/uploads/images/certificates/'. $upload->file_name  }}" alt="">
                @endforeach
            @if($businessProfile != null)
                <h2>Your business Description</h2>
                <b>Company</b> : {!! $businessProfile->company_name !!} <br>
                <b>Address</b> : {!! $businessProfile->address !!} <br>
                <b>City</b> : {!! $businessProfile->city !!} <br>
                <b>Country</b> : {!! $businessProfile->country !!} <br>
                <b>Established on: </b> {!! $businessProfile->established_on !!}

            @endif
        </div>
    </div>
@stop

