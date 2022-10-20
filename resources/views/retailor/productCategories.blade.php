@extends('layouts.retailor.layout')

@section('page-header')
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Product Categories</h5>
                    <p class="m-b-0">&nbsp;</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('farmer.home')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Product Categories</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h5>Product Categories</h5>
            <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
            <a href="{{route('retailor.addCategory')}}"> <button class="btn btn-out waves-effect waves-light btn-primary btn-square float-right">Add Category</button> </a>

        </div>
        <div class="card-block">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>

                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $row)
                <tr>
                    <td>{{ date('d-F-Y', strtotime($row->created_at)) }}</td>
                    <td>{{$row->name}}</td>
                    <td>
                     <a href="../retailor/editCategory/{{$row->id}}">  <button  class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">Edit</button></a>
                      <a href="../retailor/deleteCategory/{{$row->id}}">   <button class="btn btn-out-dashed waves-effect waves-light btn-danger btn-square">Delete</button> </a>
                    </td>

                </tr>
                @endforeach



                </tbody>
                <tfoot>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    
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
