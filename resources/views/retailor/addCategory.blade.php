@extends('layouts.retailor.layout')

@section('page-header')
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Add Product Category</h5>
                    <p class="m-b-0">&nbsp;</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('retailor.home')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Add Product Category</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @if(Session::get('success'))

            <div class="alert alert-success">{{ Session::get('success')}}</div>


    @endif
    @if(Session::get('error'))

            <div class="alert alert-danger">{{ Session::get('error')}}</div>


    @endif
    <div class="card">
        <div class="card-header">
            <h5>Add Product Category</h5>
            <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
        </div>
        <div class="card-block">
            <form class="form-material" method="post" action="{{route('farmer.submitCategory')}}">
                @csrf
                <div class="form-group form-default">
                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{ old('name') }}">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <span class="form-bar"></span>
                    <label class="float-label">Category Name</label>
                </div>
                <div class="form-group form-default">
                    <span class="form-bar"></span>
                    <button class="btn btn-out waves-effect waves-light btn-primary btn-square float-right">Add Category</button>
                    <span class="form-bar"></span>
                </div>




            </form>
        </div>
    </div>
@endsection
