<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Roles  
        </h2>
    </x-slot>
    <div class="py-8">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('roles.insert-permissions', $role) }}">
            {{ method_field('PUT')}}
            @csrf 
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="verflow-hidden">
                    <div class=" grid grid-cols-8 gap-2">
                    @foreach($permissions as $permission)
                        <div class="form-check form-check-inline">
                        <input 
                            name  ="permissions[{{ $permission->id }}]"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type  ="checkbox" 
                            id    ="permission{{ $permission->id }}" 
                            value="{{ $permission->id }}" 
                            {{  $role->permissions->contains($permission) ? 'checked'   : '' }}
                        >
                        <label  class="form-check-label inline-block text-gray-800"  for="permission_{{ $permission->id }}"> {{ $permission->name }}</label>
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="flex justify-end">
                    <x-button class="ml-3 mt-4">
                        Guardar <i class="fa-solid fa-floppy-disk px-2"></i>
                    </x-button>
                </div>
            </div>
           
        </form>
    </div>
</x-app-layout>
