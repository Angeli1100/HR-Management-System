@extends('backend.layouts.app')
@section('content')

       <div class="row">
<div class="col-md-12">
<div class="card card-primary">
<div class="card-header info">
<h3 class="card-title">Leave Application</h3>
</div>
            <!-- /.card-header -->
<div class="card-body">
<table id="examples1" class="table table-bordered table-striped">
<thead>
<tr>
<th>ID</th>
<th>Employee ID</th>
<th>Name</th> 
<th>Email</th>              
<th>Date: From</th>      
<th>Date: To</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($leavetable as $row)
<tr>
<td>{{ $row->id }}</td>
<td>{{ $row->usersID}}</td>
<td>{{ $row->employeeName }}</td>
<td>{{ $row->email }}</td>
<td>{{ $row->dateFrom }}</td>
<td>{{ $row->dateTo }}</td>
<td>
<a href="" class="btn btn-sm btn-info">View</a>
<a href="{{ URL::to('delete_employee/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" class="middle-align">Delete</a>
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