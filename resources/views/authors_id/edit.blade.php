@extends('templates.default')

@php
    $title = 'Authors_id';
    $preTitle = 'Edit Authors_id';
@endphp

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('authors_id.update', $author->id)}}" class="" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control
                @error('name')
                    is-invalid
                @enderror" 
                placeholder="Edit name" value="{{ old('name') ?? $author->name}}">
                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control
                @error('slug')
                    is-invalid
                @enderror" 
                placeholder="Edit slug" value="{{ old('slug') ?? $author->slug}}">
                @error('slug')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="nb-3">
                <input type="submit" value="Simpan" class="submit btn btn-primary">
              </div>
        </form>
    </div>
</div>
@endsection