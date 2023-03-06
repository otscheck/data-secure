<x-app-layout>
    <div class="mt-12 max-w-6xl mx-auto">
        <h2 class="underline decoration-amber-300 mb-3">Liste de tous les clients</h2>
        @can('create', App\Models\Client::class)
        <div class="flex justify-end m-2 p-2">
            <a href="{{ route('clients.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-900 rounded">ajouter un nouveau client</a>
        </div>
        @endcan
        <div class="relative overflow-x-auto rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-amber-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>               
                        <th scope="col" class="px-6 py-3">
                            contrat
                        </th>               
                        <th scope="col" class="px-6 py-3">
                            Nom
                        </th>               
                        <th scope="col" class="px-6 py-3">
                            Adresse
                        </th>               
                        <th scope="col" class="px-6 py-3">
                        Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)                        
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $client->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $client->num_contrat }}                        
                        </td>                
                        <td class="px-6 py-4">
                            {{ $client->nom_complet }}                        
                        </td>                
                        <td class="px-6 py-4">
                            {{ $client->adresse }}                        
                        </td>                
                                   
                        <td class="px-2 py-4 text-right">
                            <div class="flex space-x-2">

                                @can('update', $client)
                                <a href="{{ route('clients.edit', $client) }}"
                                    class="font-medium text-amber-600 hover:underline">Modifier</a> 
                                @endcan 
                                
                                <a href="{{ route('clients.show', $client) }}"
                                    class="font-medium text-blue-600 hover:underline">Détails</a>

                                <a href="{{ route('sites.createAvecParametre', $client) }}"
                                    class="font-medium text-green-600 hover:underline">Ajouter site</a>

                                @can('delete', $client)
                                <form action="{{ route('clients.destroy', $client) }}" method="POST" onsubmit="return confirm('Etes vous sur ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 hover:underline">
                                        Supprimer
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </td>                   
                    </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</x-app-layout>