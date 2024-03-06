@extends('templates.default')

@php
    $title = 'Authors';
    $preTitle = 'Semua Data';
@endphp

@push('page-action')
    <a href="{{ route('authors.create')}}" class="btn btn-primary">Tambah Data</a>
@endpush

@section('content')
<div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Photo</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
         @foreach ($authors as $authors)
             <tr>
                <td>{{$authors->id }}</td>
                <td>{{$authors->name }}</td>
                <td> <img src="{{ asset('storage/' . $authors->photo) }}" height="100px" alt="">
                </td>
                <td>
                    <a href="{{ route('authors.edit', $authors->id)}}">Edit</a>
                    <form action="{{ route('authors.destroy', $authors->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="submit" value="Hapus" class="btn btn-danger">
                    </form>
                </td>
             </tr>
         @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection