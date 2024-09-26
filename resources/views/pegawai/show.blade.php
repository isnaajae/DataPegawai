@extends('layouts.app')

@section('content')
    <h2>Detail Pegawai</h2>

    <table class="table">
        <tr>
            <th>Nama:</th>
            <td>{{ $pegawai->nama }}</td>
        </tr>
        <tr>
            <th>Alamat:</th>
            <td>{{ $pegawai->alamat }}</td>
        </tr>
        <tr>
            <th>Umur:</th>
            <td>{{ $pegawai->umur }}</td>
        </tr>
        <tr>
            <th>Bidang:</th>
            <td>{{ $pegawai->bidang }}</td>
        </tr>
    </table>

    <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-primary">Edit</a>

    <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
@endsection
