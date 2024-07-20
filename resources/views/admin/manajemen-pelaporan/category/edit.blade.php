@extends('layouts.admin.dashboard')
@section('title', 'Edit Kategori')

@section('content')
<div class="container-fluid py-4 px-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-3">
                    <form action="{{ route('admin.manajemen-pelaporan.category.update', $category->id) }}"
                        method="POST">
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