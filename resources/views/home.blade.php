@extends('backend.layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h1 class="text-center mb-4">Welcome, <b>{{ Auth::user()->name }}</b>!</h1>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5> Your Profile</h5>
                                <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                <!-- Add more personal details here -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5> Your Tasks</h5>
                                <ul class="list-group">
                                    <li class="list-group-item">Task 1</li>
                                    <li class="list-group-item">Task 2</li>
                                    <li class="list-group-item">Task 3</li>
                                    <!-- Add more tasks dynamically or fetch from a database -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
