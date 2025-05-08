@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Edit Category</div>
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

                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Use PUT method for updates --}}
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Category Name" value="{{ old('name', $category->name) }}">
                        </div>
                         <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control" placeholder="Description">{{ old('description', $category->description) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                         <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection