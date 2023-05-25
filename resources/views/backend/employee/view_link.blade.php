@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- Profile Information -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Profile Information</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  Link has been generated.
                  @isset($link)
                  <a href="{{ route('backend.employee.check_in', $link) }}" class="btn btn-sm btn-info" id="checkIn">Check In</a>                  {{-- <a href="{{ $link }}" class="btn btn-sm btn-primary">Check In</a> --}}
              @endisset
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection