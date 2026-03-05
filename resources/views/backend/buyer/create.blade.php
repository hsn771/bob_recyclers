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
    <div class="page-content">
        <section class="section">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">Carousel</h4>
                </div> --}}
                <div class="card-body">
                    <form action="{{ route('buyer-logo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Buyer Logo</h4>
                                <div class="form-group">
                                    <label for="buyer_name">Buyer Name</label>
                                    <input type="text" id="buyer_name" class="form-control" name="buyer_name">
                                </div>
                                <div class="form-group">
                                    <label for="image">Buyer Image</label>
                                    <input type="file" id="mage" class="form-control" name="image" >
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
