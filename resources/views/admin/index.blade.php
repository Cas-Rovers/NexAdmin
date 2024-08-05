@extends('admin.layouts.app')

@section('content')
    <h1 class="text-center">
        Hello World
        <i class="fas fa-xl fa-exclamation"></i>
        <br>
        {{ $user->first_name }}
    </h1>
@endsection
