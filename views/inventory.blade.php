@extends('layouts.auth')

@section('content')
    <main class="flex flex-grow flex-col p-3 space-y-3">
        @include('partials.alerts')

        <h2 class="text-3xl text-slate-500 border-b border-slate-200 font-light flex items-end justify-between space-x-3">Inventory</h2>

        <h3 class="font-medium text-slate-600 text-center">Equipment</h3>
        <div class="grid grid-cols-3">
            @foreach ($equipment as $key => $item)
                <div class="border border-slate-300 @if (!$loop->first) border-l-0 @endif">
                    <h4 class="bg-slate-100 py-1 text-center border-b border-slate-300">{{ ucfirst($key) }}</h4>
                    <div class="py-2 text-center bg-white">
                        @if ($item)
                            <form action="/inventory/remove/{{ $key }}" method="post">
                                <button type="submit" class="text-blue-500 hover:underline focus:underline focus:outline-none cursor-pointer" title="Remove">{{ $item->name }}</button>
                            </form>
                        @else
                            <span>None</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <h3 class="font-medium text-slate-600 text-center">Inventory</h3>
        <table class="w-full border border-slate-300">
            <thead class="bg-slate-100">
            <tr>
                <th class="p-2 font-medium text-slate-600 text-left">Item</th>
                <th class="p-2 font-medium text-slate-600 text-right">Quantity</th>
                <th class="p-2 font-medium text-slate-600 text-right">Value</th>
                <th class="p-2 font-medium text-slate-600 text-right">Total</th>
                <th class="p-2 font-medium text-slate-600 text-left">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white text-sm">
                @foreach ($inventory as $item)
                    <tr class="hover:bg-amber-50">
                        <td class="px-2 py-1 text-left">{{ $item->name }}</td>
                        <td class="px-2 py-1 text-right">{{ number_format($item->quantity) }}</td>
                        <td class="px-2 py-1 text-right">{{ number_format($item->value) }} Cr</td>
                        <td class="px-2 py-1 text-right">{{ number_format($item->quantity * $item->value) }} Cr</td>
                        <td class="px-2 py-1 text-left">
                            <span class="inline-flex space-x-3">
                                <a href="/inventory/describe/{{ $item->slug }}" class="text-blue-500 hover:underline focus:underline focus:outline-none">Info</a>
                                <a href="/itemsend.php?ID={{ $item->inventory_id }}" class="text-blue-500 hover:underline focus:underline focus:outline-none">Send</a>
                                <a href="/itemsell.php?ID={{ $item->inventory_id }}" class="text-blue-500 hover:underline focus:underline focus:outline-none">Sell</a>
                                <a href="/imadd.php?ID={{ $item->inventory_id }}" class="text-blue-500 hover:underline focus:underline focus:outline-none">Add to Market</a>
                                @if ($item->armor)
                                    <form action="/inventory/wear/{{ $item->slug }}" method="post">
                                        <button type="submit" class="text-blue-500 hover:underline focus:underline focus:outline-none cursor-pointer">Wear</button>
                                    </form>
                                @elseif ($item->weapon)
                                    <form action="/inventory/wield/{{ $item->slug }}" method="post">
                                        <button type="submit" class="text-blue-500 hover:underline focus:underline focus:outline-none cursor-pointer">Wield</button>
                                    </form>
                                @endif
                                @if ($item->has_effect)
                                    <a href="/itemuse.php?ID={{ $item->inventory_id }}" class="text-blue-500 hover:underline focus:underline focus:outline-none">Use</a>
                               @endif
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </main>
@endsection

