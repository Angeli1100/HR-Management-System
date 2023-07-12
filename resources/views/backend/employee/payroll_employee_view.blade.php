@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Employee Payslip</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="mb-4">ARKOD SMART LOGITECH SDN. BHD.</h5>
                                <p>GF Lot 1451 Section 66, KTLD, Jalan Keluli,
                                Bintawa Industrial Estate, 93450 Kuching, Sarawak</p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="mb-4">Employee Details</h5>
                                <p><strong>Employee Name:</strong> Ailee</p>
                                <p><strong>Employee ID:</strong> 21 </p>
                                <p><strong>Date:</strong> 12/7/2023 </p>
                            </div>
                        </div>
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Basic Salary</td>
                                    <td>RM 3,000.00</td>
                                </tr>
                                <tr>
                                    <td>Overtime Pay</td>
                                    <td>RM 500.00</td>
                                </tr>
                                <tr>
                                    <td>Bonus</td>
                                    <td>RM 1,000.00</td>
                                </tr>
                                <tr>
                                    <td>Tax Deduction</td>
                                    <td>RM 500.00</td>
                                </tr>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td><strong>RM 4,000.00</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ URL::to('/payroll_employee/') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
