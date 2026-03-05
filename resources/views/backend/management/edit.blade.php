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
                {{--<div class="card-header">
                    <h4 class="card-title">Edit Management</h4>
                </div>--}}
                <div class="card-body">
                    <form action="{{ route('team.update', encryptor('encrypt',$data->id)) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="top_management_title">Title 1<i class="text-danger">*</i></label>
                                    <input type="text" id="top_management_title" class="form-control" name="top_management_title" value="{{ old('top_management_title', $data->top_management_title)}}" placeholder="Enter Title" required>
                                    @if($errors->has('top_management_title'))
                                        <span class="text-danger"> {{ $errors->first('top_management_title') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="top_description">Description:</label>
                                    <textarea class="form-control" rows="5" id="top_description" name="top_description">{{ old('top_description',$data->top_description)}}</textarea>
                                     @if($errors->has('top_description'))
                                        <span class="text-danger"> {{ $errors->first('top_description') }}</span>
                                    @endif
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="mid_management_title">Title 2<i class="text-danger">*</i></label>
                                    <input type="text" id="mid_management_title" class="form-control" name="mid_management_title" value="{{ old('mid_management_title',$data->mid_management_title)}}" placeholder="Enter Title" required>
                                     @if($errors->has('mid_management_title'))
                                        <span class="text-danger"> {{ $errors->first('mid_management_title') }}</span>
                                    @endif
                                </div>
                               
                                <div class="form-group">
                                    <label for="mid_description">Description:</label>
                                    <textarea class="form-control" rows="5" id="mid_description" name="mid_description">{{ old('mid_description ',$data->mid_description)}}</textarea>
                                     @if($errors->has('mid_description'))
                                        <span class="text-danger"> {{ $errors->first('mid_description') }}</span>
                                    @endif
                                 </div>
                
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="yard_management_title" >Title 3</label>
                                    <input type="text" id="yard_management_title" class="form-control" name="yard_management_title" value="{{ old('yard_management_title',$data->yard_management_title)}}" placeholder="Enter Title">
                                     @if($errors->has('yard_management_title'))
                                        <span class="text-danger"> {{ $errors->first('yard_management_title') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="yard_description">Description:</label>
                                    <textarea class="form-control" rows="5" id="yard_description" name="yard_description">{{ old('yard_description',$data->yard_description)}}</textarea>
                                     @if($errors->has('yard_description'))
                                        <span class="text-danger"> {{ $errors->first('yard_description') }}</span>
                                    @endif
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
