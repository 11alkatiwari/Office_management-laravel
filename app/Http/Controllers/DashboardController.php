<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;

class DashboardController extends Controller
{
    /**
     * Display the main dashboard with summary stats.
     */
    public function index()
    {
        // Count of all companies
        $totalCompanies = Company::count();

        // Count of all employees
        $totalEmployees = Employee::count();

        // Count of unique managers (non-null manager_id)
        $totalManagers = Employee::whereNotNull('manager_id')->distinct('manager_id')->count();

        // Unique list of departments from employees table
        $departments = Employee::select('department')->whereNotNull('department')->distinct()->pluck('department');

        // Pass the variables to the dashboard view
        return view('dashboard.index', compact(
            'totalCompanies',
            'totalEmployees',
            'totalManagers',
            'departments'
        ));
    }
}
