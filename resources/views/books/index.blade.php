@extends('templates.default')

@php
    $title = 'Books';
    $preTitle = 'Semua Data';
@endphp

@push('page-action')
    <a href="{{ route('books.create')}}" class="btn btn-primary">Tambah Data</a>
@endpush

@section('content')
<div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Author_Id</th>
            <th>Title</th>
            <th>Cover</th>
            <th>Year</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
         @foreach ($books as $books)
             <tr>
                <td>{{$books->id }}</td>
                <td>{{$books->books_author_id}}</td>
                <td>{{$books->title}}</td>
                <td> <img src="{{ asset('storage/' . $books->cover) }}" height="100px" alt="">
                </td>
                <td>{{$books->year }}</td>
                <td>
                    <a href="{{ route('books.edit', $books->id)}}">Edit</a>
                    <form action="{{ route('books.destroy', $books->id)}}" method="POST">
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