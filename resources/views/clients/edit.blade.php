<x-app-layout>
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le dossier de') }} {{ $client->nom_complet }}
        </h2>
    </x-slot>

    <div class="mt-12 max-w-6xl mx-auto bg-slate-300 p-4 rounded">
        <div class="flex m-2 p-2">
            <a href="{{ route('clients.index') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-900 rounded">Revenir en arrière</a>
        </div> 
        
        <div class="max-w-3xl mx-auto bg-gray-100 p-6 mt-6 rounded">
            <form class="space-y-5" method="POST" action="{{ route('clients.update', $client) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-3">
                        <label for="num_contrat" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Numéro contrat</label>
                        <input type="text" id="num_contrat" name="num_contrat" value="{{ $client->num_contrat }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('num_contrat')
                            <span class="text-sm text-red-600 ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-3">
                        <label for="date_debut_contrat" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">début du commencement du contrat</label>
                        <input type="date" id="date_debut_contrat" value="{{ \Carbon\Carbon::parse($client->date_debut_contrat)->format('Y-m-d')}}" name="date_debut_contrat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        
                    </div>
                    <div class="col-span-3">
                        <label for="nom_complet" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nom Complet du client</label>
                        <input type="text" id="nom_complet" name="nom_complet" value="{{ $client->nom_complet }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('nom_complet')
                            <span class="text-sm text-red-600 ">{{ $message }}</span>
                        @enderror
                    </div>                    
                    <div class="col-span-3">
                        <label for="nom_contact" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nom du contact</label>
                        <input type="text" id="nom_contact" name="nom_contact" value="{{ $client->nom_contact }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        
                    </div>             
                    <div class="col-span-3">
                        <label for="tel_contact" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Numéro téléphone contact</label>
                        <input type="tel" id="tel_contact" name="tel_contact" value="{{ $client->tel_contact }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">                    
                    </div>             
                    <div class="col-span-3">
                        @if(Auth::user()->hasRole('finance'))
                        <label for="dernier_mois_paye" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">dernier mois payé</label>
                        <input type="month" id="dernier_mois_paye" name="dernier_mois_paye" value="{{ $client->dernier_mois_paye }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">  
                        @endif
                    </div>
                    <div class="col-span-6">
                        <div>
                            <label for="adresse" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse complète</label>
                            <textarea id="message" name="adresse" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Adresse complète du client">{{  $client->adresse  }}</textarea>
                        </div>
                    </div>
                    <div class="col-span-6">
                        <label for="image" class="mb-2 block text-sm font-medium text-gray-900 ">Images</label>
                        <img src="{{ Storage::url($client->image) }}" alt="Image" class="w-32"/>
                        <input type="file" id="image" name="image" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('image')
                            <span class="text-sm text-red-600 ">{{ $message }}</span>
                        @enderror
                    </div>                             
                    <div class="col-span-6">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarques et description</label>
                        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bon à savoir sur ce client ">{{  $client->description  }}</textarea>
                    </div>                                       
                </div>

                <button type="submit" class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Modifier le client</button>
            </form>
        </div>       

    </div>
    
</x-app-layout>