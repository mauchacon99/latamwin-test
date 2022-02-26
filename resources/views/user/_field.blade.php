     <tr>
         <td class="px-6 py-4 whitespace-nowrap">
             <div class="flex items-center">
                 <div class="ml-4">
                     <div class="text-sm font-medium text-gray-900">
                     </div>
                     <div class="text-sm text-gray-500">
                         {{ $user->email }}
                     </div>
                 </div>
             </div>
         </td>
         <td class="px-6 py-4 whitespace-nowrap">
             <div class="text-sm text-gray-900">Regional Paradigm Technician
             </div>
             <div class="text-sm text-gray-500">Optimization</div>
         </td>
         <td class="px-6 py-4 whitespace-nowrap">
             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                 Active </span>
         </td>
         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> {{ $user->getRoleNames() }} ss </td>
         <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
             <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
         </td>
     </tr>
