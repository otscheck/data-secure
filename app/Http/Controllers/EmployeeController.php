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
        $employees = Employee::all()->sortByDesc('id');

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
        $validated = $request->validate([
            'matricule' => 'required',
            'nom_complet' => 'required',
            'region_id' => '',
            'poste_id' => '',
            'telephone' => '',
            'adresse' => '',
            'prime' => '',
            'engage_le' => '',
            'depart_le' => '',
            'taille' => '',
            'sexe' => '',
            'description' => ''
        ]);

        Employee::create($validated);
        return to_route('employees.index');
    }

    public function edit(Employee $employee)
    {
        $postes = Poste::all();
        $regions = Region::all();
        return view('employees.edit', compact('employee', 'postes', 'regions'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'matricule' => 'required',
            'nom_complet' => 'required',
            'region_id' => '',
            'poste_id' => '',
            'telephone' => '',
            'adresse' => '',
            'prime' => '',
            'engage_le' => '',
            'depart_le' => '',
            'taille' => '',
            'sexe' => '',
            'description' => ''
        ]);

        $employee->update($validated);
        return to_route('employees.index')->with('message', 'dossier de l\'agent modifié');
    }

    public function destroy(Employee $employee)
    {
        // dd('wait');
        $employee->delete();
        return to_route('employees.index')->with('message', 'agent supprimé');
    }
}
