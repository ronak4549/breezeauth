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
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h1>Add Student Detail</h1>
                            </div>
                            <div class="text-center">
                                <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
                            </div>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops Something Wrong !!</strong> <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <div class="card-body">

                            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <strong>First Name:</strong>
                                            <input type="text" name="first_name" class="form-control" placeholder="First Name"  value="{{ old('first_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <strong>Last Name:</strong>
                                            <input type="text" name="last_name" class="form-control" placeholder="Last Name"  value="{{ old('last_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <strong>Email ID:</strong>
                                            <input type="text" name="email" class="form-control" placeholder="Email"  value="{{ old('email') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <strong>Select Gender:</strong>
                                            <input type="radio" class="form-check-input" name="gender" id="male" value="male"><label for="male">Male</label>
                                            <input type="radio" class="form-check-input" name="gender" id="female" value="female"><label for="female">Female</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <strong>Status:</strong>
                                            <input type="radio" name="status" id="active" value="0"><label for="active">Active</label>
                                            <input type="radio" name="status" id="deactive" value="1"><label for="deactive">Deactive</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <strong>Profile Pict:</strong>
                                            <input type="file" name="profile" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <strong>Resume:</strong>
                                            <input type="file" name="resume" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4 text-center">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
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
