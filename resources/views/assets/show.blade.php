@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Asset Details</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4"><strong>Name:</strong></div>
                        <div class="col-md-8">{{ $asset->name }}</div>
                    </div>
                     <div class="row">
                        <div class="col-md-4"><strong>Category:</strong></div>
                        <div class="col-md-8">{{ $asset->category->name ?? 'N/A' }}</div>
                    </div>
                     <div class="row">
                        <div class="col-md-4"><strong>Description:</strong></div>
                        <div class="col-md-8">{{ $asset->description ?? '-' }}</div>
                    </div>
                     <div class="row">
                        <div class="col-md-4"><strong>Serial Number:</strong></div>
                        <div class="col-md-8">{{ $asset->serial_number ?? '-' }}</div>
                    </div>
                     <div class="row">
                        <div class="col-md-4"><strong>Purchase Date:</strong></div>
                        <div class="col-md-8">{{ $asset->purchase_date ?? '-' }}</div>
                    </div>
                     <div class="row">
                        <div class="col-md-4"><strong>Purchase Price:</strong></div>
                        <div class="col-md-8">{{ $asset->purchase_price ?? '-' }}</div>
                    </div>
                     <div class="row">
                        <div class="col-md-4"><strong>Status:</strong></div>
                        <div class="col-md-8">{{ $asset->status }}</div>
                    </div>
                     <div class="row">
                        <div class="col-md-4"><strong>Location:</strong></div>
                        <div class="col-md-8">{{ $asset->location ?? '-' }}</div>
                    </div>
                     <div class="row">
                        <div class="col-md-4"><strong>Created At:</strong></div>
                        <div class="col-md-8">{{ $asset->created_at }}</div>
                    </div>
                     <div class="row">
                        <div class="col-md-4"><strong>Updated At:</strong></div>
                        <div class="col-md-8">{{ $asset->updated_at }}</div>
                    </div>

                    <a href="{{ route('assets.index') }}" class="btn btn-primary mt-3">Back to Assets</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection