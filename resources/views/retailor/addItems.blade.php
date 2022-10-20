@extends('layouts.retailor.layout')

@section('page-header')
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Add Product Item</h5>
                    <p class="m-b-0">&nbsp;</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('farmer.home')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Add Product Item</a>
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
            <h5>Add Product Item</h5>
            <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
        </div>
        <div class="card-block">
            <form class="form-material" method="post" action="{{route('farmer.item.add')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group form-default">
                    <select name="category" class="form-control">
                        <option>--select Category--</option>
                        @foreach($categories as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                    </select>
                    <span class="form-bar"></span>
                </div>
                <div class="form-group form-default">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <span class="form-bar"></span>
                    <label class="float-label">Item Name</label>
                </div>

                <div class="form-group form-default">
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <span class="form-bar"></span>
                    <label class="float-label">Price(Per Kg)</label>
                </div>
                <div class="form-group form-default">
                    <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
                    @error('quantity')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <span class="form-bar"></span>
                    <label class="float-label">Quantity</label>
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
