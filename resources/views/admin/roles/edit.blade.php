<x-admin-layout>
  
    <div class="mt-12 max-w-6xl mx-auto bg-slate-300 p-4 rounded">
        <div class="flex m-2 p-2">
            <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-900 rounded">Revenir en arrière</a>
        </div> 
        
        <div class="max-w-md mx-auto bg-gray-100 p-6 mt-12 rounded">
            <form class="space-y-5" method="POST" action="{{ route('admin.roles.update', $role) }}">
                @csrf
                @method('PUT')
                <div>
                    <label for="nom" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Modifier un role</label>
                    <input type="text" id="nom" name="nom" value="{{ $role->nom }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('nom')
                        <span class="text-sm text-red-600 ">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Modifier un role</button>
            </form>
        </div>       

    </div>

    <div class="mt-12 max-w-6xl mx-auto bg-slate-300 p-4 rounded">
        <h2>Permissions</h2>
        <div class="max-w-md mx-auto">
            @foreach ($role->permissions as $rp)
                <span class="m-2 p-2 bg-indigo-300 rounded-md">{{ $rp->nom }}</span>
            @endforeach
        </div>
        <div class="max-w-md mx-auto bg-gray-100 p-6 mt-12 rounded">
            <form class="space-y-5" method="POST" action="{{ route('admin.roles.permissions', $role) }}">
                @csrf
                <div>
                    <label for="" class="text-xl" style="max-width: 300px">
                        <span class="text-gray-700">choisissez les permissions pour ce role</span>
                        <select name="permissions[]" id="" class="form-multiselect mt-1 block w-full" multiple>
                            @foreach ( $permissions as $permission)
                                <option value="{{ $permission->id }}" @selected($role->hasPermission($permission->nom)) >{{ $permission->nom }}</option>
                            @endforeach
                        </select>
                    </label>
                 </div>

                <button type="submit" class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Ajouter des permissions</button>
            </form>
        </div>       

    </div>
    
</x-admin-layout>