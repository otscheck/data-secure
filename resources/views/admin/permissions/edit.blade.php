<x-admin-layout>
  
    <div class="mt-12 max-w-6xl mx-auto">
        <div class="flex m-2 p-2">
            <a href="{{ route('admin.permissions.index') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-900 rounded">Revenir en arrière</a>
        </div> 
        
        <div class="max-w-md mx-auto bg-gray-100 p-6 mt-12 rounded">
            <form class="space-y-5" method="POST" action="{{ route('admin.permissions.update', $permission) }}">
                @csrf
                @method('PUT')
                <div>
                    <label for="nom" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Modifier la permission</label>
                    <input type="text" id="nom" name="nom" value="{{ $permission->nom }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('nom')
                        <span class="text-sm text-red-600 ">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Modifier la permission</button>
            </form>
        </div>       

       

    </div>
    
</x-admin-layout>