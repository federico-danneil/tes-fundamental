<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $positions = Position::all();
        $departments = Department::all();

        $employees = Employee::with(['department', 'position'])
            ->when($request->filled('position_id'), function ($query) use ($request) {
                $query->where('position_id', $request->position_id);
            })
            ->when($request->filled('department_id'), function ($query) use ($request) {
                $query->where('department_id', $request->department_id);
            })
            ->when($request->filled('gender'), function ($query) use ($request) {
                $query->where('gender', $request->gender);
            })
            ->get();

        return view('employees.index', compact('employees', 'positions', 'departments'));
    }

    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.create', compact('departments', 'positions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|string|max:20',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee created.');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.edit', compact('employee', 'departments', 'positions'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:employees,email,{$employee->id}",
            'phone' => 'required|string|max:20',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee moved to trash.');
    }

    public function deleted()
    {
        $employees = Employee::onlyTrashed()->with(['department', 'position'])->get();
        return view('employees.deleted', compact('employees'));
    }

    public function restore($id)
    {
        $employee = Employee::onlyTrashed()->findOrFail($id);
        $employee->restore();

        return redirect()->route('employees.index')->with('success', 'Employee restored.');
    }

    public function forceDelete($id)
    {
        $employee = Employee::onlyTrashed()->findOrFail($id);
        $employee->forceDelete();

        return redirect()->route('employees.deleted')->with('success', 'Employee permanently deleted.');
    }
}
