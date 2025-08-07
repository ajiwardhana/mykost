@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Kos</h1>
    <a href="{{ route('kos.create') }}" class="btn btn-primary mb-3">Tambah Kos</a>
    
    <div class="row">
        @foreach($kos as $k)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $k->gambar) }}" class="card-img-top" alt="{{ $k->nama }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $k->nama }}</h5>
                    <p class="card-text">{{ $k->alamat }}, {{ $k->kota }}</p>
                    <p class="card-text">Rp {{ number_format($k->harga, 0, ',', '.') }}/bulan</p>
                    <p class="card-text">Kamar tersedia: {{ $k->sisa_kamar }}/{{ $k->jumlah_kamar }}</p>
                    <a href="{{ route('kos.show', $k->id) }}" class="btn btn-info">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection