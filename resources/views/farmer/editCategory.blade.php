@extends('layouts.farmer.layout')

@section('page-header')
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Edit Product Category</h5>
                    <p class="m-b-0">&nbsp;</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('farmer.home')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Edit Product Category</a>
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
    <div class="card">
        <div class="card-header">
            <h5>Edit Product Category</h5>
            <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
        </div>
        <div class="card-block">
            <form class="form-material" method="post" action="{{route('farmer.category.edit')}}">
                @csrf
                <input hidden value="{{$category->id}}" name="category_id">
                <div class="form-group form-default">
                    <input value="{{$category->name}}" type="text" name="name" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Category Name</label>
                </div>
                <div class="form-group form-default">
                    <input value="{{$category->description}}" type="text" name="description" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Description</label>
                </div>
                <div class="form-group form-default">
                    <span class="form-bar"></span>
                    <button class="btn btn-out waves-effect waves-light btn-primary btn-square float-right">Update Category</button>
                    <span class="form-bar"></span>
                </div>




            </form>
        </div>
    </div>
@endsection
