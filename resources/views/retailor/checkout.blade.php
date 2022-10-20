@extends('layouts.retailor.layout')
@section('page-header')
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Checkout</h5>
                    <p class="m-b-0">&nbsp;</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('retailor.home')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Checkout</a>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Checkout</h5>
                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                </div>
                <div class="card-block">
                    <form class="form-material" method="post" action="{{route("checkout.submit")}}">
                        @csrf
                        <div class="form-group form-default">
                            <input type="text" name="name" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Full Name</label>
                        </div>
                        <div class="form-group form-default">
                            <input type="text" name="email" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Email</label>
                        </div>
                     <div class="form-group form-default">
                            <textarea name="address" class="form-control" required=""></textarea>
                            <span class="form-bar"></span>
                            <label class="float-label">Address</label>
                        </div>

                        <div class="form-group form-default">
                            <input type="text" name="phone" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Phone</label>
                        </div>
                        <button  class="btn btn-primary pull-right">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
