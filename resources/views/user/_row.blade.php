    @if (auth()->user()->id !== $user->id)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            {{ $user->name }}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ $user->email }}
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span 
                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800"
                >
                    {{  $user->roles->last()->name  }} 
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <form 
                    action="{{ route('users.destroy', $user->id) }}" 
                    method="POST"
                >

                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    @can('user.edit')
                        <a href="{{ route('users.edit', [ $user->id ]) }}" class='btn btn-default btn-xs'>
                            <button  
                                type="button"  
                                class="ml-3 inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 "
                            >
                                <i class="far fa-edit"></i>
                            </button>
                        </a>
                    @endcan
                    @can('user.delete')
                    <button 
                        type="submit" 
                        class="ml-3 inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 "
                    >
                        <i class="far fa-trash-alt"></i>
                    </button>
                    @endcan
                </form>
            </td>
        </tr>
    @endif
