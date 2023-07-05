@extends('backend.layout')

@section('content')
        <div class="row mt-2">
            <div class="col-sm-12 col-md-8">
                <h2>Category</h2>
            </div>
            <div class="col-sm-12 col-md-4">
                <a href="{{ route('category.create')}}" class="btn btn-primary float-end">Add Category</a>
            </div>
            <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Tanggal Dibuat</th>
                    <th scope="col">Tanggal Diperbarui</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($category as $category)
                    <tr>
                      <th scope="row">{{ $category -> nama}}</th>
                        <td>
                            <img src="{{ asset('uploads/'. $category->gambar)}}" alt="" width="200">
                        </td>
                      <td>{{ $category -> created_at}}</td>
                      <td>{{ $category -> updated_at}}</td>
                      <td>
                      <form action="{{ route('category.delete', ['id' => $category->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                    <button type="submit"class="btn btn-danger">Hapus</button>
                      <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-warning">Edit</a>
                    </form>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
@endsection
