<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Information du site  ') }} : {{ $site->code }}
        </h2>
    </x-slot>
    <div class="container mx-auto bg-amber-100 border-2 border-amber-400 rounded-xl mt-4 p-4">
        <div>
            <h1> <span class="font-extrabold">Client : </span>{{ $site->client->nom_complet }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">Region : </span>{{ $site->region->nom }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">Superviseur : </span>{{ $site->employee->nom_complet }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">Catégorie : </span>{{ $site->tag->nom }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">ouvert le : </span>{{ $site->ouvert_le }}</h1>
        </div>        
        <div>
            <h1> <span class="font-extrabold">dernière visite : </span>{{ $site->derniere_visite }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">Fermé le : </span>{{ $site->ferme_le }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">nombre d'agent facturé : </span>{{ $site->nb_agent_factures }}</h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">nombre d'agents déployés : </span>{{ $site->nb_agent_deployes }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">nombre d'alarme : </span>{{ $site->nb_alarme }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">nombre de chiens : </span>{{ $site->nb_chien }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">Prix alarme : </span>{{ $site->prix_alarme }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">Prix chien : </span>{{ $site->prix_chien }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">Note sur le site : </span>{{ $site->description }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">nombre d'agents déployés : </span>{{ $site->nb_agent_deployes }} </h1>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('sites.edit', $site) }}" class="bg-amber-500 p-2 rounded-3xl text-sm">Modifier le dossier</a>
        </div>      
    </div>
    
</x-app-layout>
