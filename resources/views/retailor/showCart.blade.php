@php
$i=1;
$total_amount=0;
@endphp

@extends('layouts.retailor.layout')
@section('page-header')
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Cart</h5>
                    <p class="m-b-0">&nbsp;</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('retailor.home')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Show Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <h2>Cart</h2>
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
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>item Price</th>
                        <th>Quantity(price*quantity)</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartData as $row)
                        @php
                        $total_amount+=$row->price;
                        @endphp
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$row->product}}</td>
                        <td>{{$row->quantity}}</td>
                        <td>{{$row->item_price}}</td>
                        <td>{{$row->price}}</td>
                        <td><a href="deletecartitem/{{$row->cartid}}"> <i class="fa fa-remove"></i></a></td>
                    </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>
        <div class="=col-md4">
            <div class="card">
                <div class="card-header">
                <h2><i class="fa fa-credit-card"></i>&nbsp;Payment Details</h2>
                </div>

                <div class="card-block table-border-style">
                    <div class="row">
                        <div class="col-md-8"> <font size="+1"><b>Item amount:</b></font></div>
                        <div class="col-md-4"> {{$total_amount}}</div>


                    </div>
                    <div class="row">
                        <div class="col-md-8"> <font size="+1"><b>Discount:</b></font></div>
                        <div class="col-md-4"> 0</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8"> <font size="+1"><b>Total:</b></font></div>
                        <div class="col-md-4"> {{$total_amount}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8"> <font size="+2"><b>Sub Total:</b></font></div>
                        <div class="col-md-4"> {{$total_amount}}</div>
                    </div>
                    <hr>
                    <a href="{{route('cart.checkout')}}">
                    <button class="btn btn-primary btn-block">Checkout</button>
                    </a>

                </div>
                </div>
        </div>
    </div>


@endsection
