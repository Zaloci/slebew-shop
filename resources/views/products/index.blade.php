@extends('backend.layout')

@section('content')

 <div class="row mt-3">
            <div class="col-sm-12 col-md-8">
                <h2 class="text-dark">List Products</h2>
            </div>
            <div class="col-sm-12 col-md-4">
                <a href="{{ route('products.create')}}" class="btn btn-outline-primary float-end">Add Product</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table mt-2">
            <thead class="bg-dark text-white">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Picture</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Discount</th>
                <th scope="col">Category</th>
                <th scope="col">Create Date</th>
                <th scope="col">Update Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                  <th scope="row">{{$product->id}}</th>
                  <td>{{$product->nama}}</td>
                  <td><img src="{{ asset('uploads/' . $product->gambar) }}" alt="" class="img-thumbnail" width="100px"></td>
                  <td>{{$product->deskripsi}}</td>
                  <td>Rp.{{ number_format ($product->harga)}}</td>
                  <td>{{$product->discount}}%</td>
                  <td>{{$product->category ? $product->category->nama : 'None' }}</td>
                  <td>{{$product->created_at}}</td>
                  <td>{{$product->updated_at}}</td>
                  <td class="d-flex justify-content-end p-5">

                    <form action="{{ route('products.delete', ['id' => $product->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary mx-2">Delete</button>
                    </form>

                    <form action="{{ route('products.edit', ['id' => $product->id]) }}" method="POST">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-secondary">Edit</button>
                    </form>

                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>

@endsection

