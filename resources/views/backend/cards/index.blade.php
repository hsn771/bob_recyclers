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
            {{-- <div class="card-header">
                <a href="{{ route('track-record.create') }}" class="btn btn-primary mb-3">Add New</a>
            </div> --}}
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title 1</th>
                            <th>Title 2</th>
                            <th>Title 3</th>
                            <th>Title 4</th>
                            <th>Number 1</th>
                            <th>Number 2</th>
                            <th>Number 3</th>
                            <th>Number 4</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $s)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{$s->title_1}}</td>
                            <td>{{$s->title_2}}</td>
                            <td>{{$s->title_3}}</td>
                            <td>{{$s->title_4}}</td>
                            <td>{{$s->number_1}}</td>
                            <td>{{$s->number_2}}</td>
                            <td>{{$s->number_3}}</td>
                            <td>{{$s->number_4}}</td>
                            <td>{{$s->short_description}}</td>
                           <td class="white-space-nowrap">
                                <a href="{{route('track-record.edit',encryptor('encrypt',$s->id))}}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                {{-- <a href="javascript:void()" onclick="$('#form{{$s->id}}').submit()">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <form id="form{{$s->id}}" action="{{route('track-record.destroy',encryptor('encrypt',$s->id))}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form> --}}
                            </td>
                             @empty
                             <td colspan="11" class="text-center">No Data Found</td>
                        </tr>
                         @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
