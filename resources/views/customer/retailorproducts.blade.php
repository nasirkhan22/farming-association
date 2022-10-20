@extends('layouts.customer.layout')

@php
$i=1;
@endphp
@section('page-header')
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard</h5>
                    <p class="m-b-0">&nbsp;</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('retailor.home')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="pull-right">
        <a href="{{route('customer.cart.show')}}">
        <i class="fa" style="font-size:24px">&#xf07a;</i>
        <span class='badge badge-warning' id='lblCartCount'> {{$count}} </span>
        </a>
    </div>
    @if (session('success'))
        <div class="card table-borderless-card">
            <div class="card-block success-breadcrumb">
                {!! session('success') !!}
            </div>
        </div>

    @endif
    @if (session('error'))
        <div class="card table-borderless-card">
            <div class="card-block danger-breadcrumb">
                {!! session('error') !!}
            </div>
        </div>

    @endif


    <div class="row">

        @foreach($items as $row)
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">

                        <h5 class="card-header-text">{{$row->item_name}}</h5>

                    </div>

                    <div class="card-block accordion-block color-accordion-block">
                        <div class="color-accordion ui-accordion ui-widget ui-helper-reset" id="color-accordion" role="tablist">
                            <a class="accordion-msg b-none waves-effect waves-light scale_active ui-accordion-header ui-corner-top ui-state-default ui-accordion-icons ui-accordion-header-active ui-state-active" role="tab" id="ui-id-7" aria-controls="ui-id-8" aria-selected="true" aria-expanded="true" tabindex="0"><span class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-up"></span>Product Details</a>
                            <div class="accordion-desc ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content ui-accordion-content-active" style="" id="ui-id-8" aria-labelledby="ui-id-7" role="tabpanel" aria-hidden="false">
                                <p>
                                    Description
                                </p>
                                <img src="{{asset('images/items/'.$row->image)}}" width="100%" height="100px">
                                <b>Item Category</b>: &nbsp; {{$row->category_name}} <br>
                                <b>Item Name</b>: &nbsp; {{$row->item_name}} <br>
                                <b>Item price</b>: &nbsp; {{$row->price}} <br>
                                <b>Item Quantity</b>: &nbsp; {{$row->quantity}} <br>
                                <b>Published on</b>: &nbsp; {{date('d-F-Y', strtotime($row->published_date))}} <br>
                            </div>


                        </div>
                        <hr>
                        Retailor Details: <br>
                        <b> Name:</b> &nbsp; {{$row->name}} <br>
                        <b>Address:</b> &nbsp; {{$row->address}} <br>
                        <b>Contact #:</b> &nbsp; {{$row->phone}} <br>
                        <hr>
                        <form method="post" action="{{route('cart.add')}}">
                            @csrf
                        <div class="row">
                            <div class="col-md-12">
                        <input name="quantity" class="form-control" min="1" style="text-align: center" type="number" value="1"> </div>
                        <input name="product_id" hidden type="tex" value="{{$row->product_id}}">
                        </div>
                        <div class="row">&nbsp;</div>
                        <button class="btn btn-block btn-primary"><i class="fa fa-cart-plus"> &nbsp;Add to Cart</i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
