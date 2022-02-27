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
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Active </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 capitalize"> {{ $user->getRoleNames()[0] }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
             
                <form 
                    action="{{ route('users.destroy', $user->id) }}" 
                    method="POST"
                >

                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'>
                        <button  type="button"  class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ">
                            <i class="far fa-edit"></i>
                        </button>
                    </a>
                    <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'>
                        <button type="button" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ">
                            <i class="far fa-eye"></i>
                        </button>
                    </a>
                    <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endif
