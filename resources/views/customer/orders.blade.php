@extends('layouts.customer.layout')
@php
$i=1;
@endphp
@section('page-header')
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Orders</h5>
                    <p class="m-b-0">&nbsp;</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('farmer.home')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Orders</a>
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
                        <h2>BUYING ORDERS</h2>
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
                                    <th>Quantity</th>
                                    <th>Amount</th>
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
                                        <td>{{ $row->quantity }}</td>
                                        <td>{{ $row->amount }}</td>
                                        @if($row->status=='pending')
                                            <td class="bg-warning">{{$row->status}}</td>
                                        @endif
                                        @if($row->status=='under processing')
                                            <td class="bg-primary">{{$row->status}}</td>
                                        @endif
                                        @if($row->status=='completed')
                                            <td class="bg-success">{{$row->status}}</td>
                                        @endif
                                        @if($row->status=='rejected')
                                            <td class="bg-danger">{{$row->status}}</td>
                                        @endif
                                        <td>{{$row->shippment_address}}</td>
                                        <td>{{$row->phone}}</td>
                                        <td>{{$row->created_at}}</td>
                                        <td>
                                           <!--  @if($row->status!='completed')
                                            @if($row->status!='rejected' && $row->status!='under processing')
                                          <a href="changestatus/{{$row->id}}/accept">  <button class="btn btn-success">Accept</button></a>
                                           <a href="changestatus/{{$row->id}}/reject"> <button class="btn btn-danger">Reject</button></a>
                                           @endif
                                           <a href="changestatus/{{$row->id}}/completed"><button class="btn btn-secondary">Complete</button></a>
                                            @endif
                                            <button class="btn btn-primary">Details</button> -->
                                        </td>
{{--                                        <td><a href="orderDetail/{{$row->id}}"><button class="btn btn-primary">Details</button></a></td> --}}

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

