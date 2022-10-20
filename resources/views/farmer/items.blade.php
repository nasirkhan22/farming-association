@extends('layouts.farmer.layout')

@section('page-header')
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Product Items</h5>
                    <p class="m-b-0">&nbsp;</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('farmer.home')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Product Items</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h5>Product Items</h5>
            <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
            <a href="{{route('farmer.addItems')}}"> <button class="btn btn-out waves-effect waves-light btn-primary btn-square float-right">Add Item</button> </a>

        </div>
        <div class="card-block">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Item</th>
                    <th>Price (Per Kg)</th>
                    <th>Quantity</th>
                    <th>Image</th>

                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($items as $row)
                    <tr>
                        <td>{{date('d-F-Y', strtotime($row->created_at))}}</td>
                        <td>{{$row->category}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->price}}</td>
                        <td>{{$row->quantity}}</td>
                        <td><img src="{{asset('images/items/'.$row->image)}}" width="100%" height="100px"/></td>
                        <td>
                           <a href="../farmer/editItem/{{$row->id}}"> <button class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">Edit</button></a>
                            <a href="deleteItem/{{$row->id}}">   <button class="btn btn-out-dashed waves-effect waves-light btn-danger btn-square">Delete</button></a>
                        </td>

                    </tr>
                    @endforeach



                </tbody>
                <tfoot>
                <tr>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Item</th>
                    <th>Price (Per Kg)</th>
                    <th>Quantity</th>
                    <th>Image</th>

                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
