@extends('templates.default')

@php
    $title = 'Books';
    $preTitle = 'Tambah Data';
@endphp

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('books.store')}}" class="" method="post" enctype="multipart/form-data">
            @csrf

              <div class="mb-3">
                <label class="form-label">Author_Id</label>
                <select name="books_author_id" id="" class="form-control">
                  @foreach ($authors as $author)
                      <option value="{{ $author->name}}">{{$author->slug}}</option>
                  @endforeach
                </select>
                @error('books_author_id')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            
              <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control 
                @error('title')
                    is-invalid
                @enderror"
                placeholder="Tulis Title">
                @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Cover</label>
                <input type="file" name="cover" class="form-control 
                @error('cover')
                    is-invalid
                @enderror"
                placeholder="Upload Cover" value="{{ old('cover')}}">
                @error('cover')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            
              <div class="mb-3">
                <label class="form-label">year</label>
                <input type="text" name="year" class="form-control 
                @error('year')
                    is-invalid
                @enderror"
                placeholder="Tulis year">
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