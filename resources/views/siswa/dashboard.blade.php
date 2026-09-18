@extends('layouts.app')

@section('title', 'Dashboard Siswa')

@section('content')
    <h1>Dashboard Siswa</h1>
    <p>Halo, {{ auth()->user()->name }}</p>
@endsection
