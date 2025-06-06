<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Show all employees with optional filters
    public function index(Request $request)
    {
        $companies = Company::all();
        $positions = Employee::select('position')->distinct()->pluck('position');
        $query = Employee::with(['company', 'manager']);

        // Apply filters if available
        if ($request->filled('company_id')) {
            $query->where('company_id', $request->company_id);
        }

        if ($request->filled('position')) {
            $query->where('position', $request->position);
        }
        if ($request->filled('manager_id')) {
            $query->where('manager_id', $request->manager_id);
        }
        $employees = $query->latest()->paginate(10);
        $managers = Employee::all();

        return view('employees.index', compact('employees', 'companies', 'positions', 'managers'));
    }

    // Show form to create new employee
    public function create()
    {
        $companies = Company::all();
        $managers = Employee::all(); // For selecting manager
        return view('employees.create', compact('companies', 'managers'));
    }
    public function hierarchy()
{
    $employees = Employee::with('manager')->get();
    return view('employees.hierarchy', compact('employees'));
}

    // Store a new employee record
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'position' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'manager_id' => 'nullable|exists:employees,id',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    // Show form to edit existing employee
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        $managers = Employee::where('id', '!=', $employee->id)->get(); // Exclude self as manager
        return view('employees.edit', compact('employee', 'companies', 'managers'));
    }

    // Update employee record
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:employees,email,{$employee->id}",
            'position' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'manager_id' => 'nullable|exists:employees,id',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    // Delete employee record
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
    