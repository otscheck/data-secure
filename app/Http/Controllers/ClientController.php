<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Storage;

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

    public function store(ClientRequest $request)
    {
        // dd($request);

        // $image = $request->file('image')->store('public/clients');       
        // $validated = $request->except(['image']);

        Client::create([
            'num_contrat' =>$request->num_contrat, 
            'nom_complet' =>$request->nom_complet, 
            'adresse' =>$request->adresse,
            'image'=>$request->file('image')->store('public/clients'),
            'description' =>$request->description,
            'date_debut_contrat' =>$request->date_debut_contrat,
            'nom_contact' => $request->nom_contact, 
            'tel_contact' => $request->tel_contact, 
            'dernier_mois_paye' => $request->dernier_mois_paye
        ]);

        return to_route('clients.index');

    }

    public function edit(Client $client)
    {
        $this->authorize('update', $client, Client::class);
        return view('clients.edit', compact('client'));
    }

    public function update(ClientRequest $request, Client $client)
    {
        // $request->validate([
        //     'num_contrat' => ['required'], 
        //     'nom_complet' => ['required'], 
        //     'adresse' => ['required'],
        //     'image'=>['image'],
        //     'description' => ['string'],
        //     'date_debut_contrat' => ['date'],
        //     'nom_contact' => ['string'], 
        //     'tel_contact' => ['string'], 
        //     'dernier_mois_paye' => ['string']
        // ]);

        $image = $client->image;
        if ($request->hasFile('image')) {
            Storage::delete($client->image);
            $image = $request->file('image')->store('public/clients');
        }

        $client->update([
            'num_contrat' =>$request->num_contrat, 
            'nom_complet' =>$request->nom_complet, 
            'adresse' =>$request->adresse,
            'image'=>$image,
            'description' =>$request->description,
            'date_debut_contrat' =>$request->date_debut_contrat,
            'nom_contact' => $request->nom_contact, 
            'tel_contact' => $request->tel_contact, 
            'dernier_mois_paye' => $request->dernier_mois_paye
        ]);
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
