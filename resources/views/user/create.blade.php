<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Usuarios/Form
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-label 
                for="password" 
                :value="__('Password')" 
            />
            <x-input 
                id="password" 
                class="block mt-1 w-full" 
                type="password" 
                name="password" 
                required
                autocomplete="current-password" 
            />
        </div>
    </div>


</x-app-layout>
