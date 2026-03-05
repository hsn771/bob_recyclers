@extends('backend.layout.app')
@section('pageTitle',trans('Page List'))
@section('pageSubTitle',trans('List'))
@section('content')
<style>
    /* Hide CKEditor specific elements */
    .ck.ck-widget__type-around__button.ck-widget__type-around__button_before,
    .ck.ck-widget__type-around__button.ck-widget__type-around__button_after {
        display: none;
    }
    /* Additional styles to remove unwanted space */
    .ck.ck-content > div {
        margin-bottom: 0;
    }
</style>
<div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Page</h3>
            </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Page</li>
                </ol>
             </nav>
         </div>
    </div>
</div>  
<!-- Bordered table start -->
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card p-4">
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <div class="float-start">
                            <a class="float-start btn btn-info mb-3" href="{{route('page.create')}}">Add New</a>
                        </div>
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">{{__('#SL')}}</th>
                                    <th scope="col">{{__('Title')}}</th>
                                    <th scope="col">{{__('Published')}}</th>
                                    <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($page as $m)
                                <tr class="text-center">
                                <th scope="row">{{ ++$loop->index }}</th>
                                    <td>{{$m->page_title}}</td>
                                    
                                    <td>{{ $m->published == 1?"Show":"Hide" }}</td>
                                    <td class="white-space-nowrap">
                                        <a class="btn btn-warning" href="{{route('page.edit',encryptor('encrypt',$m->id))}}">Edit</a>
                                         {{-- <form action="{{ route('page.destroy',encryptor('encrypt',$m->id)) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form> --}}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="5" class="text-center">No Data Found</th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="my-3">
                            {!! $page->links()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection