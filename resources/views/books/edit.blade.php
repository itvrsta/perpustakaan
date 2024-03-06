@extends('templates.default')

@php
    $title = 'Books';
    $preTitle = 'Edit Books';
@endphp

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('books.update', $books->id)}}" class="" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label class="form-label">Author_Id</label>
              <select name="books_author_id" id="" class="form-control">
                @foreach ($authors as $author)
                    <option value="{{ $author->name}}">{{$author->slug}}</option>
                @endforeach
              </select>
              @error('author_id')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

              <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control
                @error('title')
                    is-invalid
                @enderror" 
                placeholder="Edit Title" value="{{ old('title') ?? $books->title}}">
                @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Cover</label>
                <input type="file" name="cover" class="form-control" 
                @error('cover')
                    is-invalid
                @enderror
                placeholder="Edit Cover" value="{{ old('cover') ?? $books->cover}}">
                @error('cover')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">tahun</label>
                <input type="text" name="year" class="form-control
                @error('year')
                    is-invalid
                @enderror" 
                placeholder="Tulis Tahun" value="{{ old('year') ?? $books->year}}">
                @error('year')
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