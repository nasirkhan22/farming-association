@php
    $i=1;
@endphp
@extends('layouts.retailor.layout')
@section('page-header')
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10"> Add Product</h5>
                    <p class="m-b-0">&nbsp;</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('retailor.home')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Add Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @if (session('success'))
        <div class="card table-borderless-card">
            <div class="card-block success-breadcrumb">
                {!! session('success') !!}
            </div>
        </div>

    @endif
    <div class="card">
        <div class="card-header">
            <h5>Add Product Item</h5>
            <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
        </div>
        <div class="card-block">
            <form class="form-material" method="post" action="{{route('retailor.product.add')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group form-default">
                    <input type="text" name="name" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Product Name</label>
                </div>

                <div class="form-group form-default">
                    <input type="text" name="price" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Price</label>
                </div>
                <div class="form-group form-default">
                    <input type="text" name="use" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Use</label>
                </div>
                <div class="form-group form-default">
                    <input type="file" name="file" class="form-control" required="">
                    <span class="form-bar"></span>
                </div>
                <div class="form-group form-default">
                    <span class="form-bar"></span>
                    <button class="btn btn-out waves-effect waves-light btn-primary btn-square float-right">Add Item</button>
                    <span class="form-bar"></span>
                </div>




            </form>
        </div>
    </div>
@endsection
