<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des employees') }}
        </h2>
    </x-slot>
    
    <div class="container mx-auto bg-amber-100 border-2 border-amber-400 rounded-xl mt-4 p-4">
        <div class="flex justify-end mb-4">
            <a href="{{ route('employees.create') }}" class="bg-amber-500 p-2 rounded-3xl text-sm">Ajouter un agent</a>
        </div>
        <div class="relative overflow-x-auto rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-900 uppercase bg-amber-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Matricule
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nom
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Poste
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Region
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $employee->matricule }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $employee->nom_complet }}                           
                        </td>
                        <td class="px-6 py-4">
                            {{ $employee->poste->grade }}                            
                        </td>
                        <td class="px-6 py-4">
                            {{ $employee->region->nom }}                            
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>                           
                            <a href="{{ route('employees.show', $employee) }}" class="font-medium text-amber-600 dark:text-blue-500 hover:underline">Détails</a>                           
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>           
    </div>

</x-app-layout>
