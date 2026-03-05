@extends('backend.layout.app')
@section('content')         
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Management</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Management</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('mid.create')}}" class="btn btn-primary mb-3">Add New</a>
                </div>
                <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Image </th>
                                    <th scope="col">Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $d)
                                    <tr>
                                        <td>{{ $d->id }}</td>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->designation }}</td>
                                         <td>
                                            <img width="60px" src="{{asset('uploads/midManagement/'.$d->image)}}" alt="Management">
                                        </td>
                                        <td class="white-space-nowrap">
                                            <div class="btn-group" role="group">
                                                <a href="{{route('mid.edit',encryptor('encrypt',$d->id))}}" class="btn btn-warning me-2 mb-2">Edit</a>
                                                <form action="{{ route('mid.destroy',encryptor('encrypt',$d->id)) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                 @empty
                                <td colspan="6" class="text-center">No Data Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('assets/extensions/simple-dtables/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/pages/simple-dtables.css')}}">
@endpush
@push('scripts')
<script src="{{asset('assets/extensions/simple-dtables/umd/simple-dtables.js')}}"></script>
<script src="{{asset('assets/js/pages/simple-dtables.js')}}"></script>
@endpush