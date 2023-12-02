@extends('students.app')
@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if (Auth::User()->hasRole('admin'))
                    {{"Admin Dashboard"}}
                @elseif(Auth::User()->hasrole('user'))
                    {{"User Dashboard"}}
                @endif
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <b>{{ Auth::user()->name }}</b> {{ __("is logged in!") }}
                        <div class="content" style="margin-top: 50px;">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h1> Information </h1>
                                    </div>
                                    <div class="pull-right">
                                        @if (Auth::User()->hasRole('admin'))
                                            <a class="btn btn-success" href="{{ route('students.create') }}"> Add
                                                Student</a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th>Profile Pict</th>
                                    @if (Auth::User()->hasRole('admin'))<th>Action</th>@endif
                                </tr>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $student->first_name }}</td>
                                        <td>{{ $student->last_name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>
                                            @if ($student->status == 0)
                                                {{ 'Active' }}
                                            @else
                                                {{ 'Inactive' }}
                                            @endif
                                        </td>
                                        <td><img @if ($student->profile) src="{{ asset('/images/profile/' . $student->profile) }}" @else avatar="{{ $student->profile }}" @endif
                                                id="image" alt="user-image form-control"
                                                class="rounded-circle img-thumbnail w-50" style="width:70; height:70px;">
                                        </td>
                                        @if (Auth::User()->hasRole('admin'))
                                        <td>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                                    <a class="btn btn-info" href="{{ route('students.show', $student->id) }}">Show</a>

                                                    <a class="btn btn-primary" href="{{ route('students.edit', $student->id) }}">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this Record?');">Delete</button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                            {!! $students->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endsection
