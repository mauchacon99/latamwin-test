<tr>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">
                </div>
                <div class="text-sm text-gray-500">{{ $user->email }}
                </div>
            </div>
        </div>
    </td>

    <td class="px-6 py-4 whitespace-nowrap">
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
            Active </span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 capitalize"> {{  $user->getRoleNames()[0]  }} </td>
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
        <div class='btn-group'>

            <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'>
                <x-button class="ml-3  ">
                    <i class="far fa-edit"></i>
                </x-button>
            </a>
            <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'>
                <x-button class="ml-3  ">
                    <i class="far fa-eye"></i>
                </x-button>
            </a>
            <x-button class="ml-3" type="submit">
                <i class="far fa-trash-alt"></i>
            </x-button>
        </div>
        {!! Form::close() !!}

    </td>
</tr>
