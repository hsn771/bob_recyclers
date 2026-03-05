@extends('backend.layout.app')
@section('content')           
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Career</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Career</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Position</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>Cover Letter</th>
                            <th>CV</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $s)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{ optional($s->circular)->position }}</td>
                            <td>{{$s->full_name}}</td>
                            <td>{{$s->email}}</td>
                            <td>{{$s->phone}}</td>
                            <td>{{$s->cover_letter}}</td>
                            <td>
                                @if($s->file)
                                    <a href="{{ asset('uploads/career/'. $s->file) }}" target="_blank">Download</a>
                                @else
                                    No File Uploaded
                                @endif
                            </td>
                             {{-- <form action="{{ route('applicants.destroy',encryptor('encrypt',$s->id)) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger">Delete</button>
                                </form> --}}
                             @empty
                             <td colspan="7" class="text-center">No Data Found</td>
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