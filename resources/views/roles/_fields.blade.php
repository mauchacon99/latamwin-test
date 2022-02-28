{{ csrf_field() }}
{{-- Input for name --}}
<x-label for="name" value="Name" />
<x-input 
    id="name" 
    class="block mt-1 w-full" 
    type="text" 
    value="{{ old('name', $role->name) }}" 
    name="name" 
/>
 
 
