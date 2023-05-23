@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- Profile Information -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Profile Information</h3>
            </div>
            <a href="{{ URL::to('/attendance') }}" class="btn btn-sm btn-info" id="generatelink" class="middle-align">Generate Attendance Link</a>
            </div>
            </div>

</div>
@endsection