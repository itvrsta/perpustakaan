@extends('templates.default')

@php
    $title = 'Publisher';
    $preTitle = 'Edit Publisher';
@endphp

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('publisher.update', $publisher->id)}}" class="" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control
                @error('name')
                    is-invalid
                @enderror" 
                placeholder="Edit Nama" value="{{ old('name') ?? $publisher->name}}">
                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="address" class="form-control
                @error('address')
                    is-invalid
                @enderror" 
                placeholder="Edit Alamat" value="{{ old('address') ?? $publisher->address}}">
                @error('address')
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