@php
    $i=0;
@endphp
@extends('layouts.retailor.layout')
@section('page-header')
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10"> Completed Orders</h5>
                    <p class="m-b-0">&nbsp;</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('retailor.home')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Completed Orders</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>COMPLETED ORDERS</h2>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                <li><i class="fa fa-minus minimize-card"></i></li>
                                <li><i class="fa fa-refresh reload-card"></i></li>
                                <li><i class="fa fa-trash close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Product</th>
                                    <th>Status</th>
                                    <th>Shippment Address</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $row)

                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$row->full_name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{ $row->name }}</td>
                                        @if($row->status=='pending')
                                            <td class="bg-warning">{{$row->status}}</td>
                                        @endif
                                        @if($row->status=='under processing')
                                            <td class="bg-primary">{{$row->status}}</td>
                                        @endif
                                        @if($row->status=='completed')
                                            <td class="bg-success">{{$row->status}}</td>
                                        @endif

                                        <td>{{$row->shippment_address}}</td>
                                        <td>{{$row->phone}}</td>
                                        <td>{{$row->created_at}}</td>
                                        <td><a href="orderDetail/{{$row->id}}"><button class="btn btn-primary">Details</button></a></td>

                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
