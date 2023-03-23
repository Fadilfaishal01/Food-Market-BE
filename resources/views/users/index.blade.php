<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('User') }}
       </h2>
   </x-slot>

   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         @if(Session::has('success'))
         <div
            id="alert"
            class="mb-3 inline-flex w-full items-center rounded-lg bg-green-400 py-3 px-6 text-base text-white"
            role="alert">
            <span class="mr-2">
               <svg
                 xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 24 24"
                 fill="currentColor"
                 class="h-5 w-5">
                 <path
                   fill-rule="evenodd"
                   d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                   clip-rule="evenodd" />
               </svg>
             </span>
            <p class="font-bold ">{{ Session::get('success') }}</p>
         </div>
         @endif

         @if(Session::has('error'))
         <div
            id="alert"
            class="mb-3 inline-flex w-full items-center rounded-lg bg-red-400 py-3 px-6 text-base text-white alert"
            role="alert">
            <span class="mr-2">
               <svg
                 xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 24 24"
                 fill="currentColor"
                 class="h-5 w-5">
                 <path
                   fill-rule="evenodd"
                   d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                   clip-rule="evenodd" />
               </svg>
             </span>
             <p class="font-bold ">{{ Session::get('error') }}</p>
         </div>
         @endif

         <div class="mb-4">
            <a href="{{ route('users.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            + Create User</a>
         </div>

         <div class="bg-white">
            <table class="table-auto w-full">
               <thead>
                  <tr>
                     <th class="border px-4 py-4">ID</th>
                     <th class="border px-4 py-4">Name</th>
                     <th class="border px-4 py-4">Email</th>
                     <th class="border px-4 py-4">Roles</th>
                     <th class="border px-4 py-4">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @forelse ($user as $item)
                     <tr>
                        <td class="border px-4 py-4 text-center">{{ $item->id }}</td>
                        <td class="border px-4 py-4">{{ $item->name }}</td>
                        <td class="border px-4 py-4">{{ $item->email }}</td>
                        <td class="border px-4 py-4">{{ $item->roles }}</td>
                        <td class="border px-4 py-4 text-center">
                           <a href="{{ route('users.edit', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                              Edit</a>
                           <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="inline-block">
                              {!! method_field('delete') . csrf_field() !!}
                              <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                           </form>
                        </td>
                     </tr>
                  @empty
                     <tr>
                        <td colspan="5" class="border text-center p-5">
                           Data Tidak Ditemukan
                        </td>
                     </tr>
                  @endforelse
               </tbody>
            </table>
         </div>

         <div class="text-center mt-5">
            {{ $user->links() }}
         </div>
      </div>
   </div>
</x-app-layout>
