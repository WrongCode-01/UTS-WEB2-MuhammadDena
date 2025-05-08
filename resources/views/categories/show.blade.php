@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Category Details</div>
                <div class="card-body">
                     <div class="row">
                        <div class="col-md-4"><strong>Name:</strong></div>
                        <div class="col-md-8">{{ $category->category->name ?? 'N/A' }}</div>
                    </div>
                     <div class="row">
                        <div class="col-md-4"><strong>Description:</strong></div>
                        <div class="col-md-8">{{ $category->description ?? '-' }}</div>
                    </div>
                     <div class="row">
                        <div class="col-md-4"><strong>Created At:</strong></div>
                        <div class="col-md-8">{{ $category->created_at }}</div>
                    </div>
                     <div class="row">
                        <div class="col-md-4"><strong>Updated At:</strong></div>
                        <div class="col-md-8">{{ $category->updated_at }}</div>
                    </div>

                    <a href="{{ route('assets.index') }}" class="btn btn-primary mt-3">Back to Assets</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection