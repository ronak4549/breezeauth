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
                                        <h1> Users Detail</h1>
                                    </div>
                                    <div class="pull-right">

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>First Name:</strong>
                                        {{ $students->first_name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Last Name:</strong>
                                        {{ $students->last_name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email ID:</strong>
                                        {{ $students->email }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Gender:</strong>
                                        {{ $students->gender }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Status:</strong>
                                        @if($students->status==0)
                                             {{ 'Active' }}
                                             @else
                                             {{ 'Inactive' }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Profile Picture:</strong>
                                        <img
                                        @if ($students->profile) src="{{ asset('/images/profile/' . $students->profile) }}" @else avatar="{{ $students->profile }}" @endif
                                        id="profile" alt="user-image" class="img-thumbnail w-10"
                                        style="width:300px; height:200px;"><br>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Resume:</strong>
                                        {{ $students->resume }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection
