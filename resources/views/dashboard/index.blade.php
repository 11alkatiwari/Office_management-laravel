@extends('layout')

@section('content')
<div class="container mt-4 text-white">
    <h2>Company Dashboard</h2>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card bg-success text-white mb-3">
                <div class="card-body">
                    <h5>Total Companies</h5>
                    <h3>{{ $totalCompanies }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white mb-3">
                <div class="card-body">
                    <h5>Total Employees</h5>
                    <h3>{{ $totalEmployees }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white mb-3">
                <div class="card-body">
                    <h5>Managers</h5>
                    <h3>{{ $totalManagers }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-dark text-white mb-3">
                <div class="card-body">
                    <h5>Departments</h5>
                    <p>{{ implode(', ', $departments->toArray()) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
