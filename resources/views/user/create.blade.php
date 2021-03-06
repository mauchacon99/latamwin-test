<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Usuarios / form
        </h2>
    </x-slot>
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl space-y-3 mx-auto sm:px-6 lg:px-8">
            <x-auth-validation-errors 
                class="mb-4" 
                :errors="$errors" 
            />
            <form 
                method="POST" 
                action="{{ route('users.store') }}"
            >
                @include('user._fields')

                <div class="flex justify-end items-center">
                    <x-button 
                        class="ml-3 mt-4" 
                        type="submit"
                    >
                        Guardar <i class="fa-solid fa-floppy-disk px-2"></i>
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
