<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add any required styling for the PDF here */
    </style>
</head>
<body>
    <h1>Attendance Record</h1>

    <table>
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
            @foreach($data as $row)
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
</body>
</html>
