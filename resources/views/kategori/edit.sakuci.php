@extends('layouts.app')
@section('content')
        <h1>Edit Kategori</h1>
        <form action="{{ route('kategori.update', ['kategori' => $kategori->id_kategori]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $kategori->keterangan }}" required>
            </div>
            <button type="submit" class="btn btn-primary m-3">Update</button>
        </form>
    @endsection
    