@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Payroll Malaysia</h3>
                </div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="employee_id">Employee</label>
                            <select name="employee_id" class="form-control" id="employee_id">
                                <option value="">Select Employee</option>
                                <!-- Add options for employees -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary (MYR)</label>
                            <input type="number" name="salary" class="form-control" id="salary" placeholder="Enter salary amount">
                        </div>
                        <div class="form-group">
                            <label for="bonus">Bonus (MYR)</label>
                            <input type="number" name="bonus" class="form-control" id="bonus" placeholder="Enter bonus amount">
                        </div>
                        <div class="form-group">
                            <label for="allowance">Allowance (MYR)</label>
                            <input type="number" name="allowance" class="form-control" id="allowance" placeholder="Enter allowance amount">
                        </div>
                        <div class="form-group">
                            <label for="deduction">Deduction (MYR)</label>
                            <input type="number" name="deduction" class="form-control" id="deduction" placeholder="Enter deduction amount">
                        </div>
                        <!-- Add more payroll fields as needed -->

                        <button type="submit" class="btn btn-primary">Save Payroll</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
