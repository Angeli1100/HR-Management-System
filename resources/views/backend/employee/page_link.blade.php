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
                    Click here to check in.     
                    @isset($link)
                    <form action="{{ route('backend.employee.check_in', $link) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-info" id="checkIn">Check In</button>
                    </form>
                    @endif

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
