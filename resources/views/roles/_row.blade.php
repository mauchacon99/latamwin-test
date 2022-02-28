 <tr>
     <td class="px-6 py-4 whitespace-nowrap">
         <div class="flex items-center">
             <div class="ml-4">
                 <span class="text-sm font-medium text-gray-900">
                     {{ $rol->name }}
                 </span>
             </div>
         </div>
     </td>
     <td class="px-6 py-4 whitespace-nowrap">
         <div class="flex items-center">
             <div class="ml-4">
                 <div class=" grid grid-cols-8 gap-2">
                     @foreach ($rol->permissions as $permission)
                         <span
                             class="px-2  text-center text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                             {{ $permission->name }}
                         </span>
                     @endforeach
                 </div>
             </div>
         </div>
     </td>
     <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
         <form 
            action="{{ route('roles.destroy', $rol->id) }}" 
            method="POST"
         >
             {{ csrf_field() }}
             {{ method_field('DELETE') }}

             @can('roles.permissions')
                <a href="{{ route('roles.permissions', [ $rol->id ]) }}">
                    <button 
                        type="button"
                        class="ml-3 inline-flex items-center px-4 py-2 bg-purple-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 "
                    >
                        <i class="fas fa-key"></i>
                    </button>
                </a>
             @endcan

             @can('roles.edit')
                <a href="{{ route('roles.edit', [$rol->id]) }}" class='btn btn-default btn-xs'>
                    <button 
                        type="button"
                        class="ml-3 inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-green-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 "
                    >
                        <i class="far fa-edit"></i>
                    </button>
                </a>
             @endcan

             @can('roles.delete')
                @empty($rol->users->count())
                    <button 
                        type="submit"
                        class="ml-3 inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 "
                    >
                        <i class="far fa-trash-alt"></i>
                    </button>
                @endempty
             @endcan
         </form>
     </td>
 </tr>
