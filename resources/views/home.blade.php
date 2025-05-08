@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Anda berhasil login!') }}

                    <div class="mt-3">
                        <h4>Manajemen Data:</h4>
                        <ul>
                            <li><a href="{{ route('categories.index') }}">Lihat & Kelola Kategori</a></li>
                            <li><a href="{{ route('assets.index') }}">Lihat & Kelola Aset</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Develop By : Muhammad Dena | 21552011440 | TIF-RM 22 CID') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection