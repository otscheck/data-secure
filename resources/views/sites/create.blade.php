<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un nouveau site pour') }} {{ $client->nom_contact }}
        </h2>
    </x-slot>
    <div class="container mx-auto bg-amber-100 border-2 border-amber-400 rounded-xl mt-4 p-4">           
        <form method="POST" action="{{ route('employees.store') }}">
            @csrf
            <div class="grid grid-cols-2 gap-8 mb-4">
                <div class="">
                    <label for="matricule" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Matricule</label>
                    <input type="text" id="matricule" name="matricule" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="matricule de l'élément" value="{{ old('matricule') }}">
                    @error('matricule')
                        <span class="text-sm text-red-600 ">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <label for="nom_complet" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Nom complet</label>
                    <input type="text" id="nom_complet" name="nom_complet" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="écrire le nom" value="{{ old('nom_complet') }}">
                    @error('nom_complet')
                        <span class="text-sm text-red-600 ">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <label for="adresse" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Adresse</label>
                    <input type="text" id="adresse" name="adresse" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Adresse civil" value="{{ old('adresse') }}">
                </div>
                <div class="">
                    <label for="telephone" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Téléphone</label>
                    <input type="text" id="telephone" name="telephone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="numéro de téléphone" value="{{ old('nom_complet') }}">
                </div>
                <div class="">
                    <label for="region" class="block mb-2 text-sm font-medium text-gray-900">Région</label>
                    <select id="region" name="region_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " value="{{ old('region') }}">
                        @foreach ($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->nom }}</option>                            
                        @endforeach                        
                    </select>
                </div>                
                <div class="">
                    <label for="poste" class="block mb-2 text-sm font-medium text-gray-900">Postes</label>
                    <select id="poste" name="poste_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('poste') }}">
                        @foreach ($postes as $poste)
                            <option value="{{ $poste->id }}">{{ $poste->grade }}</option>                            
                        @endforeach                        
                    </select>
                </div>
                <div class="mb-2">
                    <label for="prime" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Prime</label>
                    <input type="number" id="prime" name="prime" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="prime sur salaire" value="{{ old('prime') }}">
                </div>
                <div class="mb-2">
                    <label for="engage_le" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Date de commencement</label>
                    <input type="date" id="engage_le" name="engage_le" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('engage_le') }}">
                </div>
                <div class="mb-2">
                    <label for="taille" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Taille</label>
                    <input type="text" id="taille" name="taille" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="(en mètre)" value="{{ old('taille') }}">
                </div>
                <div class=""></div>
                <div class="">      
                    <label for="genre" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Genre</label>              
                    <fieldset>
                        <legend class="sr-only">Genre</legend>
                        <div class="flex items-center mb-4">
                            <input id="country-option-1" type="radio" name="sexe" value="M" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300" checked>
                            <label for="sexe-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Homme
                            </label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="sexe-option-2" type="radio" name="sexe" value="F" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300">
                            <label for="country-option-2" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Femme
                            </label>
                        </div>                    
                    </fieldset>
                </div>                   
                <div class="mb-2 col-start-1 col-end-3">                    
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Note sur l'agent</label>
                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="note spécial sur l'agent">{{ old('description') }}</textarea>
                </div>             
            </div>
                
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Valider</button>
        </form>        
    </div>

</x-app-layout>