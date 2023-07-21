@extends('backend.layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header info">
        <h3 class="card-title">Leave Application Status</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Leave Type</th>
              <th>Duration</th>
              <th>Date From</th>
              <th>Date To</th>
              <th>Status</th>
              <th>Attachment</th>
            </tr>
          </thead>
          <tbody>
            @foreach($leave as $leavetable)
              <tr>
                <td>{{ $leavetable->select_leave }}</td>
                <td>{{ $leavetable->duration }}</td>
                <td>{{ $leavetable->dateFrom }}</td>
                <td>{{ $leavetable->dateTo }}</td>
                <td>{{ $leavetable->status }}</td>
                <td>
                  @if($leavetable->file)
                    <a href="{{ asset('storage/' . $leavetable->file) }}" class="btn btn-primary">View Attachment</a>
                  @else
                    No Attachment
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
