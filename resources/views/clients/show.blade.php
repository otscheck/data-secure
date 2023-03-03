<x-app-layout>
    <div class="mt-12 max-w-6xl mx-auto">
        <h1 class="text-3xl underline">Information sur {{ $client->nom_complet }}</h1>

        <div class="border border-amber-600 p-5 mt-4 rounded-lg bg-amber-100">

            <h2 class="text-2xl flex justify-center italic">Numéro de contrat : {{ $client->num_contrat }}</h2>            
            
            <p class="my-4"> <span class="font-bold text-xl"> Adresse :</span>  {{ $client->adresse }}</p>
            <p class="my-4"> <span class="font-bold text-xl"> Date du début de contrat :</span>  {{ $client->date_debut_contrat }}</p>
            <p class="my-4"> <span class="font-bold text-xl">Personne à contacter :</span>  {{ $client->nom_contact }}</p>
            <p class="my-4"> <span class="font-bold text-xl"> numéro de téléphone :</span>  {{ $client->tel_contact }}</p>
            <p class="my-4"> <span class="font-bold text-xl"> Dernier mois payé :</span>  {{ $client->dernier_mois_paye }}</p>
            <p class="my-4"> <span class="font-bold text-xl"> Note :</span>  {{ $client->description }}</p>

            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('clients.edit', $client) }}" class="p-4 text-2xl bg-indigo-400 hover:bg-indigo-900 rounded">Modifier</a> 
            </div>
                               
        </div>

        
    </div>
    
</x-app-layout>