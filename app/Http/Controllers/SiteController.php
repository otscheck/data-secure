<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Region;
use App\Models\Site;
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
        // dd($client);
        $regions = Region::All();
        return view('sites.create', compact('client', 'regions'));
    }

    public function show(Site $site)
    {
        return view('sites.show', compact('site'));
    }
}
