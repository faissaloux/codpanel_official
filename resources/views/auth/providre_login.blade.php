@extends('auth/login_layout')
@section('data-link')
    {{ route('attempt.provider') }}
@endsection