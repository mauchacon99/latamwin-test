<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Roles / form / editar
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
                action="{{ route('roles.update', $role) }}"
            >
                {{ method_field('PUT')}}
                @include('roles._fields')

                <div class="flex justify-end items-center">
                    <x-button 
                        class="ml-3 mt-4" 
                        type="submit"
                    >
                        Editar <i class="fa-solid fa-pencil px-2"></i>
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>