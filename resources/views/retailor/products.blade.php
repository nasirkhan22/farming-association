@php
    $i=1;
@endphp
@extends('layouts.retailor.layout')
@section('page-header')
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Products</h5>
                    <p class="m-b-0">&nbsp;</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('retailor.home')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Products</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Products</h5>
            <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
            <a href="{{route('retailor.addproduct')}}"> <button class="btn btn-out waves-effect waves-light btn-primary btn-square float-right">Add Product</button> </a>

        </div>
        <div class="card-block">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Use</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($retailorProducts as $row)
                    <tr>
                        <td>{{ date('d-F-Y', strtotime($row->created_at)) }}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->price}}</td>
                        <td>{{$row->perception}}</td>
                        <td><img src="{{asset('images/retailor_products/'.$row->image)}}" width="100%" height="100px"/></td>
                        <td>
                            <a href="">  <button  class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">Edit</button></a>
                            <button class="btn btn-out-dashed waves-effect waves-light btn-danger btn-square">Delete</button>
                        </td>

                    </tr>
                @endforeach



                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
@endsection
