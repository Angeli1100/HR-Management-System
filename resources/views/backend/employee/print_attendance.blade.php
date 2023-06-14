<div class="row">
    <div class="col-md-12">
        <!-- Profile Information -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ARKOD EMPLOYEE DAILY ATTENDANCE</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Date</th>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendances as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->date }}</td>
                            <td>{{ $row->userID }}</td>
                            <td>{{ $row->employeeName }}</td>
                            <td>{{ $row->check_in }}</td>
                            <td>{{ $row->check_out }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        table, th, td {
            border: 1px solid black;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
</html>