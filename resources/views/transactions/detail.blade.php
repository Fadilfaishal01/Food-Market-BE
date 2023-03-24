<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transaction &raquo; {{ $item->food->name }} by {{ $item->user->name }}
        </h2>
    </x-slot>
 
    <div class="py-3">
       <div class="max-w-9xl mx-auto bg-white p-3">
            <div class="w-full md:w-2/6 px-4 mb-4 md:mb-0">
                <img width="260" height="300" src="{{ $item->food->picturePath }}" alt="{{ $item->food->name }}" class="rounded">
            </div>
            <div class="w-full md:w-6/6 px-4 mb-4 md:mb-0">
                <div class="flex flex-wrap mb-3">
                    <div class="w-2/6">
                        <div class="text-sm">Product Name</div>
                        <div class="text-xl font-bold">{{ $item->food->name }}</div>
                    </div>
                    <div class="w-1/6">
                        <div class="text-sm">Quantity</div>
                        <div class="text-xl font-bold">{{ number_format($item->quantity, 0) }}</div>
                    </div>
                    <div class="w-1/6">
                        <div class="text-sm">Total</div>
                        <div class="text-xl font-bold">{{ number_format($item->total, 0) }}</div>
                    </div>
                    <div class="w-1/6">
                        <div class="text-sm">Status</div>
                        <div class="text-xl font-bold">{{ $item->status }}</div>
                    </div>
                </div>
                <div class="flex flex-wrap mb-3">
                    <div class="w-2/6">
                        <div class="text-sm">User Name</div>
                        <div class="text-xl font-bold">{{ $item->user->name }}</div>
                    </div>
                    <div class="w-3/6">
                        <div class="text-sm">Email</div>
                        <div class="text-xl font-bold">{{ $item->user->email }}</div>
                    </div>
                    <div class="w-1/6">
                        <div class="text-sm">City</div>
                        <div class="text-xl font-bold">{{ $item->user->city }}</div>
                    </div>
                </div>
                <div class="flex flex-wrap mb-3">
                    <div class="w-4/6">
                        <div class="text-sm">Address</div>
                        <div class="text-xl font-bold">{{ $item->user->address }}</div>
                    </div>
                    <div class="w-1/6">
                        <div class="text-sm">Number</div>
                        <div class="text-xl font-bold">{{ $item->user->houseNumber }}</div>
                    </div>
                    <div class="w-1/6">
                        <div class="text-sm">Phone Number</div>
                        <div class="text-xl font-bold">{{ $item->user->phoneNumber }}</div>
                    </div>
                </div>
                <div class="flex flex-wrap mb-3">
                    <div class="w-5/6">
                        <div class="text-sm">Payment URL</div>
                        <div class="text-xl font-bold">
                            <a href="{{ $item->payment_url }}">Klik Disini Untuk Pembayaran</a>
                        </div>
                    </div>
                    <div class="w-1/6">
                        <div class="text-sm mb-3">Change Status</div>
                        <a href="{{ route('transaction.changeStatus', ['id' => $item->id, 'status' => 'ON_DELIVERED']) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white rounded block text-center w-full mb-1"
                            >
                        On Delivered</a>
                        <a href="{{ route('transaction.changeStatus', ['id' => $item->id, 'status' => 'DELIVERED']) }}"
                            class="bg-green-500 hover:bg-green-700 text-white rounded block text-center w-full mb-1"
                            >
                        Delivered</a>
                        <a href="{{ route('transaction.changeStatus', ['id' => $item->id, 'status' => 'CANCELLED']) }}"
                            class="bg-red-500 hover:bg-red-700 text-white rounded block text-center w-full mb-1"
                            >
                        Cancelled</a>
                    </div>
                </div>
            </div>
       </div>
    </div>
 </x-app-layout>
 