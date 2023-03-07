<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des sites') }}
        </h2>
    </x-slot>
    <div class="container mx-auto bg-amber-100 border-2 border-amber-400 rounded-xl mt-4 p-4">
        <div class="flex justify-end mb-4">
            <a href="{{ route('clients.index') }}" class="bg-amber-500 p-2 rounded-3xl text-sm">Voir tous les clients</a>
        </div>
        <div class="relative overflow-x-auto rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-900 uppercase bg-amber-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Client
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Region
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tags
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sites as $site)
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $site->code }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $site->client->nom_complet }}                           
                        </td>
                        <td class="px-6 py-4">
                            {{ $site->region->nom }}                            
                        </td>
                        <td class="px-6 py-4">
                            {{ $site->tag->nom }}                            
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('sites.edit', $site) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>                           
                            <a href="{{ route('sites.show', $site) }}" class="font-medium text-amber-600 dark:text-blue-500 hover:underline">Détails</a>                           
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>           
    </div>
</x-app-layout>