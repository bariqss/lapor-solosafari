@extends('layouts.user.dashboard')
@section('breadcrumb')
<nav class="py-4 px-4 flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="#"
                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                Admin
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <span class="mx-2 text-gray-400">/</span>
                <span
                    class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-white">Dashboard
                </span>
            </div>
        </li>
    </ol>
</nav>
@endsection

@section('content')
@include('layouts.user.form')

<section class="mt-6 flex flex-col bg-white w-full mx-auto max-w-6xl shadow-lg rounded-lg dark:bg-gray-800">
    @include('layouts.user.table')
</section>
@endsection