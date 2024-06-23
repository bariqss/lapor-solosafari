@extends('layouts.user.dashboard')

@section('content')
<div class="mt-8 mb-4">
    <h1 class="text-2xl font-bold text-green-700 dark:text-white">Selamat Datang,</h1>
    <p class="text-md">Web Pelaporan Kejadian Solo Safari !!</p>
</div>

@include('layouts.user.table')

@endsection