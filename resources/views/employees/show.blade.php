<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dossier de ') }} : {{ $employee->nom_complet }}
        </h2>
    </x-slot>
    <div class="container mx-auto bg-amber-100 border-2 border-amber-400 rounded-xl mt-4 p-4">
        <div>
            <h1> <span class="font-extrabold">Matricule : </span>{{ $employee->matricule }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">Adresse : </span>{{ $employee->adresse }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">Téléphone : </span>{{ $employee->telephone }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">Région : </span>{{ $employee->region->nom }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">Grade : </span>{{ $employee->poste->grade }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">Matricule : </span>{{ $employee->matricule }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">Prime : </span>{{ $employee->prime }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">Date d'engagement : </span>{{ $employee->engage_le }} </h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">Taille : </span>{{ $employee->taille }}m</h1>
        </div>
        <div>
            <h1> <span class="font-extrabold">Genre : </span>{{ $employee->sexe }} </h1>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('employees.edit', $employee) }}" class="bg-amber-500 p-2 rounded-3xl text-sm">Modifier le dossier</a>
        </div>      
    </div>
    
</x-app-layout>
