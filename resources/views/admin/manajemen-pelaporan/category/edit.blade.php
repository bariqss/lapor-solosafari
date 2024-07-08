@extends('layouts.admin.dashboard')

@section('breadcrumb')
<nav class="py-4 px-4 flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="#"
                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                Admin
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <span class="mx-2 text-gray-400">/</span>
                <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2">
                    Manajemen Pelaporan
                </span>
            </div>
        </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container-fluid py-4 px-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-3">
                    <form action="{{ route('admin.event.category.update', $category->id) }}" method="POST">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="namaKategori" class="form-label">Nama Kategori</label>
                            <input type="text" id="namaKategori" name="nama_kategori" class="form-control"
                                value="{{ $category->nama_kategori }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection