@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('content')
    <h1>Dashboard Guru</h1>
    <p>Halo, {{ auth()->user()->name }}</p>
@endsection
