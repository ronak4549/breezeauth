@extends('students.app')
@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div class="content" style="margin-top: 50px;">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h1> Users Detail</h1>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
                                </div>
                            </div>
                        </div>

                        <div class="content" style="margin-top: 50px;">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h1>Edit Users Detail</h1>
                                    </div>
                                    <div class="pull-right">

                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('students.update', $students->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <p><strong>Opps Something went wrong</strong></p>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <input type="hidden" name="id" value="{{ $students->id }}">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>First Name:</strong>
                                            <input type="text" name="first_name" value="{{ $students->first_name }}" class="form-control"
                                                placeholder="first_name">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Last Name:</strong>
                                            <input type="text" name="last_name" value="{{ $students->last_name }}" class="form-control"
                                                placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Email ID:</strong>
                                            <input type="text" name="email" value="{{ $students->email }}" class="form-control"
                                                placeholder="Email Id">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Select Gender:</strong>
                                            <input type="radio" name="gender" id="male" value="male"
                                                @if ($students->gender == 'male') checked @endif><label for="male">Male</label>
                                            <input type="radio" name="gender" id="female"value="female"
                                                @if ($students->gender == 'female') checked @endif><label for="female">Female</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Status:</strong>
                                            <input type="radio" name="status" id="active" value="0"
                                                @if ($students->status == '0') checked @endif> <label for="0">Active</label>
                                            <input type="radio" name="status" id="deactive" value="1"
                                                @if ($students->status == '1') checked @endif><label for="1">Deactive</label>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Profile Picture:</strong>
                                            <label for="cover_image">
                                                <input type="file" name="profile" class="form-control" value="{{ $students->profile }}"
                                                    id="image" data-filename="image-logo">
                                            </label>
                                            <h6 class="small-title">
                                                {{ __('Show profile') }}
                                            </h6>
                                            <img @if ($students->profile) src="{{ asset('/images/profile/' . $students->profile) }}" @else avatar="{{ $students->profile }}" @endif
                                                id="profile" alt="user-image" class="img-thumbnail w-10"
                                                style="width:300px; height:200px;"><br>
                                            <div class="choose-file mt-3">
                                                <p class="image-logo"></p>
                                                <span class="invalid-feedback" role="alert">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Resume:</strong>
                                            <label>
                                                <input type="file" name="resume" class="form-control">
                                            </label>
                                            {{ $students->resume }}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection
