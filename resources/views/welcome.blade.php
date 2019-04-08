@extends('layouts.app')
@section('content')
<a href="{{ route('login') }}">User Login</a>
<a href="/portal">Teacher Login</a>
<a href="/club">Organization Login</a>
<a href="{{ route('admin.login') }}">Admin Login</a>
@endsection