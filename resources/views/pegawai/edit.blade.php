@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Edit Pegawai</h2>

        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" class="bg-light p-4 rounded">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $pegawai->nama }}" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pegawai->alamat }}" required>
            </div>

            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur" value="{{ $pegawai->umur }}" required>
            </div>

            <div class="mb-3">
                <label for="bidang" class="form-label">Bidang</label>
                <input type="text" class="form-control" id="bidang" name="bidang" value="{{ $pegawai->bidang }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
