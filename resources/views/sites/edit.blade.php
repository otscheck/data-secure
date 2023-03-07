<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le  site') }} : {{ $site->code }}
        </h2>
    </x-slot>
    <div class="container mx-auto bg-amber-100 border-2 border-amber-400 rounded-xl mt-4 p-4">
        <div class="flex justify-end">
            <form action="{{ route('sites.destroy', $site) }}" method="POST" onsubmit="return confirm('Etes vous sur ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class=" font-medium text-white bg-red-500 hover:underline  hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    Supprimer ce site définitivement de la base de donnée
                </button>
            </form>
        </div>           
        <form method="POST" action="{{ route('sites.store') }}">
            @csrf
            <div class="grid grid-cols-2 gap-8 mb-4">
                <input type="hidden" name="client_id" value="{{ $site->client->id }}">
                <div class="">
                    <label for="code" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Code du site</label>
                    <input type="text" id="code" name="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="code unique du site" value="{{ $site->code }}">
                    @error('code')
                        <span class="text-sm text-red-600 ">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <label for="adresse" class="block mb-2 pl-2 text-sm font-medium text-gray-900">adresse du site</label>
                    <input type="text" id="adresse" name="adresse" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="adresse du site" value="{{ $site->adresse }}">                    
                </div>
                <div class="">
                    <label for="quartier" class="block mb-2 pl-2 text-sm font-medium text-gray-900">quartier du site</label>
                    <input type="text" id="quartier" name="quartier" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="quartier du site" value="{{ $site->quartier }}">                    
                </div>
                <div class="">
                    <label for="region" class="block mb-2 text-sm font-medium text-gray-900">Région</label>
                    <select id="region" name="region_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @foreach ($regions as $region)
                            <option value="{{ $region->id }}" {{ $region->id===$site->region->id ? 'selected' : ''  }}>{{ $region->nom }}</option>                            
                        @endforeach                        
                    </select>
                </div>
                <div class="">
                    <label for="tag" class="block mb-2 text-sm font-medium text-gray-900">Catégories</label>
                    <select id="tag" name="tag_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ $tag->id===$site->tag->id? 'selected' : '' }}>{{ $tag->nom }}</option>                            
                        @endforeach                        
                    </select>
                </div>
                <div class="">
                    <label for="superviseur" class="block mb-2 text-sm font-medium text-gray-900">Superviseur</label>
                    <select id="employee" name="employee_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " value="">
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}" {{ $employee->id=== $site->employee->id ? 'selected':'' }} >{{ $employee->nom_complet }}</option>                            
                        @endforeach                        
                    </select>
                </div>
                <div class="mb-2">
                    <label for="ouvert_le" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Date d'ouverture du site</label>
                    <input type="date" id="ouvert_le" name="ouvert_le" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ \Carbon\Carbon::parse($site->ouvert_le)->format('Y-m-d')}}">
                </div>
                <div class="mb-2">
                    <label for="derniere_visite" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Dernière visite</label>
                    <input type="date" id="derniere_visite" name="derniere_visite" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ \Carbon\Carbon::parse($site->derniere_visite)->format('Y-m-d')}}">
                </div>
                <div class="mb-2">
                    <label for="ferme_le" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Date de fermeture</label>
                    <input type="date" id="ferme_le" name="ferme_le" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ \Carbon\Carbon::parse($site->ferme_le)->format('Y-m-d')}}">
                </div>
                <div class="">
                    <label for="nb_agent_factures" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Nombre d'agents facturés</label>
                    <input type="number" min="0" id="nb_agent_factures" name="nb_agent_factures" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" value="{{ $site->nb_agent_factures }}">
                    @error('nb_agent_factures')
                        <span class="text-sm text-red-600 ">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <label for="nb_agent_deployes" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Nombre d'agents déployés</label>
                    <input type="number" min="0" id="nb_agent_deployes" name="nb_agent_deployes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" value="{{ $site->nb_agent_deployes  }}">
                    @error('nb_agent_deployes')
                        <span class="text-sm text-red-600 ">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <label for="nb_alarme" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Nombre d'alarmes</label>
                    <input type="number" min="0" id="nb_alarme" name="nb_alarme" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" value="{{ $site->nb_alarme }}">
                    @error('nb_alarme')
                        <span class="text-sm text-red-600 ">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <label for="nb_chien" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Nombre de chien</label>
                    <input type="number" min="0" id="nb_chien" name="nb_chien" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" value="{{$site->nb_chien}}">
                    @error('nb_chien')
                        <span class="text-sm text-red-600 ">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <label for="prix_agent" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Prix par agent</label>
                    <input type="number" min="0" id="prix_agent" name="prix_agent" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" value="{{ $site->prix_agent }}">
                    @error('prix_agent')
                        <span class="text-sm text-red-600 ">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <label for="prix_chien" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Prix par chien</label>
                    <input type="number" min="0" id="prix_chien" name="prix_chien" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" value="{{ $site->prix_chien }}">
                    @error('prix_chien')
                        <span class="text-sm text-red-600 ">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <label for="prix_alarme" min="0" class="block mb-2 pl-2 text-sm font-medium text-gray-900">Prix par alarme</label>
                    <input type="number" id="prix_alarme" name="prix_alarme" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" value="{{ $site->prix_alarme }}">
                    @error('prix_alarme')
                        <span class="text-sm text-red-600 ">{{ $message }}</span>
                    @enderror
                </div>
                                   
                <div class="mb-2 col-start-1 col-end-3">                    
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Note sur le site</label>
                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="note spécial sur l'agent">{{ $site->description }}</textarea>
                </div>             
            </div>
                
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Modifier le site</button>
        </form>        
    </div>

</x-app-layout>