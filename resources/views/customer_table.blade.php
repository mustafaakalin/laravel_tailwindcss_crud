@extends('app')

@section('content')
<div class="flex flex-col">
    <div class="overflow-x-auto">
        <div class="py-2 inline-block min-w-full">
            <div class="overflow-hidden">

                <div class="flex justify-between items-center">
                    <h1 class="text-3xl font-bold">Customer Table</h1>
                    <a href="{{ route('customer_create') }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Add Customer
                    </a>
                </div>
                <table class="table table-fixed w-full">
                    <thead >
                        <tr class="border-yellow-600 border-2 rounded-md p-2">
                            <th class="border-2 light:border-black">Customer ID</th>
                            <th>Customer Photo</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Customer Phone</th>
                            <th>Customer Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $item)
                            
                        <tr class="border-2 border-lime-500 hover:backdrop-blur-sm">
                            <td>{{ $item->id }}</td>
                            <td>
                                <img src="/images/{{ $item->photo }}"
                                    alt="" class="rounded-md w-40">
                            </td>
                            <td>
                                <p>{{ $item->name }}</p>
                            </td>
                            <td>
                                <p>{{ $item->email }}</p>
                            </td>
                            <td>
                                <p>{{ $item->phone }}</p>
                            </td>
                            <td>
                                <p class="truncate ...">{{ $item->address }}...</p>
                            </td>
                            <td class="flex">
                                <a href="/customer/{{ $item->id }}/read">
                                <button type="submit" class="bg-sky-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Read
                                </button>
                            </a>
                                <a href="/customer/{{ $item->id }}/edit">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Edit
                                </button>
                            </a>
                            <form action="/customer/{{ $item->id }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Delete
                                </button>
                            </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $customers->links()  }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection