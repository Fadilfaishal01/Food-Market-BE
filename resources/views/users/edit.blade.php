<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           User &raquo; {{ $item->name }} &raquo; Edit
       </h2>
   </x-slot>
   
   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div>
            @if ($errors->any())
               <div class="mb-5" role="alert">
                  <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                     There's something wrong
                  </div>
                  <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                     <p>
                        <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     </p>
                  </div>
               </div>
            @endif

            <form action="{{ route('users.update', $item->id) }}" method="POST" class="w-full" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                     <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Name
                     </label>
                     <input value="{{ old('name') ?? $item->name }}" name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text" placeholder="Masukan Name">
                  </div>
               </div>
               <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                     <label for="email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Email
                     </label>
                     <input value="{{ old('email') ?? $item->email }}" name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email" placeholder="Masukan Email">
                  </div>
               </div>
               <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="file">
                          Image
                      </label>
                      <input name="picturePath" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="file" type="file" placeholder="User Image">
                  </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                          Password
                      </label>
                      <input value="{{ old('password') }}" name="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password" type="password" placeholder="User Password">
                  </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password-confirmation">
                          Password Confirmation
                      </label>
                      <input value="{{ old('password_confirmation') }}" name="password_confirmation" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password-confirmation" type="password" placeholder="User Password Confirmation">
                  </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="address">
                          Address
                      </label>
                      <input value="{{ old('address') ?? $item->address }}" name="address" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="address" type="text" placeholder="User Address">
                  </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="role">
                          Roles
                      </label>
                      <select name="roles" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="role">
                           <option value="0" disabled>- Pilih Role -</option>
                           <option @if($item->roles === 'USER') selected @endif value="USER">User</option>
                           <option @if($item->roles === 'ADMIN') selected @endif value="ADMIN">Admin</option>
                      </select>
                  </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="house-number">
                          House Number
                      </label>
                      <input value="{{ old('houseNumber') ?? $item->houseNumber }}" name="houseNumber" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="house-number" type="text" placeholder="User House Number">
                  </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone-number">
                          Phone Number
                      </label>
                      <input value="{{ old('phoneNumber') ?? $item->phoneNumber }}" name="phoneNumber" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="phone-number" type="text" placeholder="User Phone Number">
                  </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="city">
                          City
                      </label>
                      <input value="{{ old('city') ?? $item->city }}" name="city" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="city" type="text" placeholder="User City">
                  </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3 text-right">
                      <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                          Save User
                      </button>
                  </div>
              </div>
            </form>
         </div>
      </div>
   </div>
</x-app-layout>