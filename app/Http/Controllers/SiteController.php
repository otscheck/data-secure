<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Region;
use App\Models\Site;
use App\Models\Tag;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $sites = Site::All();
        return view('sites.index', compact('sites'));
    }

    public function create(Client $client)
    {
        $regions = Region::All();
        $employees = Employee::whereHas('poste', function ($q) {
            $q->whereIn('grade', ['inspecteur', 'commandant']);
        })->get();
        $tags = Tag::All();
        // dd($employees);
        return view('sites.create', compact('client', 'regions', 'employees', 'tags'));
    }

    public function show(Site $site)
    {
        return view('sites.show', compact('site'));
    }

    public function store(Request $request)
    {
        Site::create($request->all());
        return to_route('sites.index');
    }

    public function edit(Site $site)
    {
        $regions = Region::All();
        $employees = Employee::whereHas('poste', function ($q) {
            $q->whereIn('grade', ['inspecteur', 'commandant']);
        })->get();
        $tags = Tag::All();

        return view('sites.edit', compact('site', 'regions', 'employees', 'tags'));
    }

    public function update(Request $request, $site)
    {
        $site->update($request->all());
        return to_route('sites.index');
    }

    public function destroy(Site $site)
    {
        $site->delete();
        return to_route('sites.index')->with('message', 'site supprimé');
    }
}
