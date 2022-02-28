
    {{ csrf_field() }}
    {{-- Input for name --}}
    <x-label for="name" value="Name" />
    <x-input 
        id="name" 
        class="block mt-1 w-full" 
        type="text" 
        value="{{ old('name', $user->name) }}" 
        name="name" 
    />
    {{-- Input for email --}}
    <x-label for="email" :value="__('Email')" />
    <x-input 
        id="password" 
        class="block mt-1 w-full" 
        type="text" 
        value="{{ old('email', $user->email) }}" 
        name="email"
    />
    {{-- Input for password --}}
    <x-label for="password" :value="__('Password')" />
    <x-input 
        id="password" 
        class="block mt-1 w-full" 
        type="password"  
        name="password" 
    />
    {{-- List Roles--}}
    @can('user.update-role')
        <x-label for="roles" value="Roles" />
        <select
            class="form-select 
                    appearance-none
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white 
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 
                    focus:bg-white 
                    focus:border-blue-600 
                    focus:outline-none"
            name="role" 
            id="role"
            >
            
            @foreach ($roles as $rol)
                <option 
                    value="{{ $rol->id }}" 
                    {{ old('role', $user->roles->all() ? $user->roles->first()->id : null ) == $rol->id ? ' selected' : '' }}
                    class="capitalize"
                > 
                    {{ $rol->name }}  
                </option>
            @endforeach
        </select>
    @endcan

       
     
