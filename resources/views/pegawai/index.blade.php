@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Daftar Pegawai</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('pegawai.create') }}" class="btn btn-success">Tambah Pegawai</a>
        </div>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Umur</th>
                    <th>Bidang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawais as $pegawai)
                    <tr>
                        <td>{{ $pegawai->nama }}</td>
                        <td>{{ $pegawai->alamat }}</td>
                        <td>{{ $pegawai->umur }}</td>
                        <td>{{ $pegawai->bidang }}</td>
                        <td>
                            <a href="{{ route('pegawai.show', $pegawai->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
