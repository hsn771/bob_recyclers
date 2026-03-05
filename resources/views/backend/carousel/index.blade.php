@extends('backend.layout.app')
@section('content')           
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Home</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('carousel.create') }}" class="btn btn-primary mb-3">Add New</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Description</th>
                            <th>Slogan</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($carousel as $s)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{$s->short_description}}</td>
                            <td>{{$s?->slogan}}</td>
                            <td>
                               <img width="100px" src="{{asset('uploads/carousel/'.$s->image)}}" alt="carousel">
                            </td>
                           {{-- <td class="white-space-nowrap">
                                <a href="{{route('carousel.edit',encryptor('encrypt',$s->id))}}" class="btn btn-warning">Edit</a> --}}
                                    {{-- <i class="bi bi-pencil-square"></i> --}}
                                
                                {{-- <a href="javascript:void()" onclick="$('#form{{$s->id}}').submit()">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <form id="form{{$s->id}}" action="{{route('carousel.destroy',encryptor('encrypt',$s->id))}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form> --}}
                                {{-- <form action="{{ route('carousel.destroy',encryptor('encrypt',$s->id)) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td> --}}
                            <td class="white-space-nowrap">
                                <div class="btn-group" role="group">
                                    <a href="{{route('carousel.edit',encryptor('encrypt',$s->id))}}" class="btn btn-warning me-2 mb-2">Edit</a>
                                    <form action="{{ route('carousel.destroy',encryptor('encrypt',$s->id)) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>

                             @empty
                             <td colspan="5" class="text-center">No Data Found</td>
                        </tr>
                         @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/pages/simple-datatables.css')}}">
@endpush
@push('scripts')
<script src="{{asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
<script src="{{asset('assets/js/pages/simple-datatables.js')}}"></script>
@endpush