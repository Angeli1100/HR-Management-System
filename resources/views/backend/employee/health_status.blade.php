@extends('backend.layouts.app')
@section('content')

       <div class="row">
<div class="col-md-12">
<div class="card card-primary">
<div class="card-header info">
<h3 class="card-title">Attrition Status</h3>
</div>
            <!-- /.card-header -->
 <div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Employee ID</th>
<th>Name</th> 
<th>Status Employment</th>                
</tr>
</thead>
<tbody>
@foreach($employees as $row)
<tr>
<td>{{ $row->id }}</td>
<td>{{ $row->employeeName }}</td>
<td>
<a href="{{ URL::to('/show_details/'.$row->id) }}" class="btn btn-sm btn-info" id="showDetails" class="middle-align">View Details</a>
<a href="{{ URL::to('delete_Health/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" class="middle-align">Delete</a>
</td>
</tr>
@endforeach


        </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        </div>

            @endsection