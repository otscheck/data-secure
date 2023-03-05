<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\poste;
use App\Models\Region;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function create()
    {
        $postes = Poste::all();
        $regions = Region::all();
        return view('employees.create', compact('regions', 'postes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['matricule' => 'required', 'nom_complet' => 'required', 'region_id' => '', 'poste_id' => '']);
        Employee::create($validated);
        return to_route('employees.index');
    }
}
