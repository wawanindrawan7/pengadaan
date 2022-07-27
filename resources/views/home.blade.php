@extends('layouts.master')

@section('content')
    <h1>Hii, {{ Auth::user()->name }}</h1>
@endsection
