@extends('layouts.app')
@section('content')
<a href="{{ route('login') }}">User Login</a>
<a href="{{ route('login') }}">Teacher Login</a>
<a href="{{ route('login') }}">Organization Login</a>
<a href="{{ route('admin.login') }}">Admin Login</a>
@endsection