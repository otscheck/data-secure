<x-admin-layout>  
    <div class="mt-12 max-w-6xl mx-auto">        
        <div class="flex justify-end m-2 p-2">
            <a href="{{ route('admin.roles.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-900 rounded">créer un nouveau role</a>
        </div>
        <div class="relative overflow-x-auto bg-red-300 rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-red-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>               
                        <th scope="col" class="px-6 py-3">
                            Nom
                        </th>               
                        <th scope="col" class="px-6 py-3">
                            Permissions
                        </th>               
                        <th scope="col" class="px-6 py-3">
                        Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $role->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $role->nom }}                        
                        </td>                
                        <td class="px-6 py-4">
                            @forelse ($role->permissions as $rp)
                                <span class="m-1 p-1 bg-indigo-300 rounded text-slate-900"> {{ $rp->nom }}</span>
                            @empty
                                <span class="m-1 p-1 text-red-500"> Aucune permissions</span>                                
                            @endforelse         
                        </td>                
                        <td class="px-6 py-4 text-right">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.roles.edit', $role->id) }}"
                                    class="font-medium text-blue-600 hover:underline">Modifier</a> 
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" onsubmit="return confirm('Etes vous sur ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 hover:underline">
                                        supprimer
                                    </button>
                                </form>
                            </div>
                        </td>                   
                    </tr>  
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    
</x-admin-layout>