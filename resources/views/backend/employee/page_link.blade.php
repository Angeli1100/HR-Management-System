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
                Click here to check in.
                @isset($link)
                <form action="{{URL::to('check-in/{link}')}}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-info" id="checkIn">Check In</button>
                </form>
                @endisset

                @isset($link)
                <form action="{{URL::to('check-out/{link}')}}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger" id="checkOut">Check Out</button>
                </form>
                @endisset
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
