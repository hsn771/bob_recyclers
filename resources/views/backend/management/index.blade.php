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
                {{-- <div class="card-header">
                    <a href="{{route('team.create')}}" class="btn btn-primary mb-3">Add New</a>
                </div> --}}
                <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#SL</th>
                                    <th scope="col">Title 1</th>
                                    <th scope="col">Title 2</th>
                                    <th scope="col">Title 3</th>
                                    <th scope="col">Description 1</th>
                                    <th scope="col">Description 2</th>
                                    <th scope="col">Description 3</th>
                                    <th scope="col">Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $d)
                                    <tr>
                                        <td>{{ $d->id }}</td>
                                        <td>{{ $d->top_management_title }}</td>
                                        <td>{{ $d->mid_management_title }}</td>
                                        <td>{{ $d->yard_management_title }}</td>
                                        <td>{{ $d->top_description }}</td>
                                        <td>{{ $d->mid_description }}</td>
                                        <td>{{ $d->yard_description }}</td>
                                         <td class="white-space-nowrap">
                                            <a href="{{route('team.edit',encryptor('encrypt',$d->id))}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            {{-- <a href="javascript:void()" onclick="$('#form{{$d->id}}').submit()">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                            <form id="form{{$d->id}}" action="{{route('team.destroy',encryptor('encrypt',$d->id))}}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form> --}}
                                        </td>
                                 @empty
                                <td colspan="8" class="text-center">No Data Found</td>
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
