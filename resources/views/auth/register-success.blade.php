@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow mb-4"> {{-- Gunakan kelas card yang lebih baik --}}
                <div class="card-header py-3"> {{-- Gunakan kelas header yang lebih baik --}}
                    <h6 class="m-0 font-weight-bold text-success">Pendaftaran Berhasil!</h6> {{-- Warna hijau untuk sukses --}}
                </div>

                <div class="card-body">
                    <p>Selamat, akun Anda berhasil didaftarkan.</p>
                    <p>Detail Pendaftaran:</p>
                    <ul>
                        <li><strong>Nama:</strong> {{ $name ?? '-' }}</li>
                        <li><strong>Email:</strong> {{ $email ?? '-' }}</li>
                    </ul>
                    <p>Silakan <a href="{{ route('login') }}">Login</a> untuk masuk ke sistem.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection