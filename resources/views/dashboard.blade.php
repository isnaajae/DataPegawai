@extends('layouts.app')

@section('content')
    <div class="container mt-4">
    <h2>Dashboard</h2>
<p>Selamat datang, {{ Auth::user()->name }}!</p>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h4 class="card-title">Total Pegawai</h4>
                        <p class="card-text">{{ $totalPegawai }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h4 class="card-title">Bidang Pegawai</h4>
                        <ul class="list-group list-group-flush">
                            @foreach ($bidangPegawai as $bidang)
                                <li class="list-group-item d-flex justify-content-between">
                                    {{ $bidang->bidang }} 
                                    <span>{{ $bidang->total }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h4 class="card-title">Pegawai Terbaru</h4>
                        <ul class="list-group list-group-flush">
                            @foreach ($latestPegawai as $pegawai)
                                <li class="list-group-item">
                                    {{ $pegawai->nama }} ({{ $pegawai->bidang }})
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Lihat Data Pegawai</a>
        </div>
    </div>
@endsection
