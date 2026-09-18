@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <h1>Dashboard Admin</h1>
    <p>Halo, {{ auth()->user()->name }}</p>
@endsection
