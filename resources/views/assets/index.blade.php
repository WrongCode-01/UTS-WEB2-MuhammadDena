@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Assets
                    @can('manage-assets') {{-- Tampilkan tombol ini hanya jika user punya izin 'manage-assets' --}}
                        <a href="{{ route('assets.create') }}" class="btn btn-primary btn-sm float-right">Add New Asset</a>
                    @endcan
                </div>
                <div class="card-body">
                     @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Serial Number</th>
                                <th>Status</th>
                                <th width="200px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($assets as $asset)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $asset->name }}</td>
                                <td>{{ $asset->category->name ?? 'N/A' }}</td> {{-- Tampilkan nama kategori, atau N/A jika tidak ada --}}
                                <td>{{ $asset->serial_number ?? '-' }}</td>
                                <td>{{ $asset->status }}</td>
                                <td>
                                     <form action="{{ route('assets.destroy', $asset->id) }}" method="POST">
                                        <a class="btn btn-info btn-sm" href="{{ route('assets.show', $asset->id) }}">Show</a>
                                        @can('manage-assets') {{-- Tampilkan tombol edit/delete hanya jika user punya izin 'manage-assets' --}}
                                            <a class="btn btn-primary btn-sm" href="{{ route('assets.edit', $asset->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No Assets Found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection