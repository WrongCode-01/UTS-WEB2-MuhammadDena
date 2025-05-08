@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Add New Asset</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('assets.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category_id">Category:</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Asset Name" value="{{ old('name') }}">
                        </div>
                         <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control" placeholder="Description">{{ old('description') }}</textarea>
                        </div>
                         <div class="form-group">
                            <label for="serial_number">Serial Number:</label>
                            <input type="text" name="serial_number" class="form-control" placeholder="Serial Number" value="{{ old('serial_number') }}">
                        </div>
                         <div class="form-group">
                            <label for="purchase_date">Purchase Date:</label>
                            <input type="date" name="purchase_date" class="form-control" value="{{ old('purchase_date') }}">
                        </div>
                         <div class="form-group">
                            <label for="purchase_price">Purchase Price:</label>
                            <input type="text" name="purchase_price" class="form-control" placeholder="Purchase Price" value="{{ old('purchase_price') }}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-control">
                                @foreach(['Available', 'Assigned', 'Maintenance', 'Retired'] as $status)
                                     <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                                        {{ $status }}
                                     </option>
                                @endforeach
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" name="location" class="form-control" placeholder="Location" value="{{ old('location') }}">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                         <a href="{{ route('assets.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection