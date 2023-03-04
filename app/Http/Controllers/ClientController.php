<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients  = Client::all()->sortByDesc('id');
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        $this->authorize('create', Client::class);
        return view('clients.create');
    }

    public function store(Request $request)
    {

        // dd($request);

        $validated = $request->validate(['num_contrat' => 'required', 'nom_complet' => 'required', 'adresse' => 'required', 'description' => '', 'date_debut_contrat' => '', 'nom_contact' => '', 'tel_contact' => '', 'dernier_mois_paye' => '']);

        Client::create($validated);

        return to_route('clients.index');
    }

    public function edit(Client $client)
    {
        $this->authorize('update', $client, Client::class);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate(['num_contrat' => 'required', 'nom_complet' => 'required', 'adresse' => 'required', 'description' => '', 'date_debut_contrat' => 'date', 'nom_contact' => '', 'tel_contact' => '', 'dernier_mois_paye' => '']);

        $client->update($validated);
        return to_route('clients.index')->with('message', 'client modifié');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return to_route('clients.index')->with('message', 'client supprimé');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }
}
