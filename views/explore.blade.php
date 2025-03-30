@extends('layouts.auth')

@section('content')
    <main class="flex flex-grow flex-col p-3 space-y-3">
        @include('partials.alerts')

        <h2 class="border-b border-slate-200 font-light flex items-end justify-between space-x-3">
            <span class="text-3xl text-slate-500">Explore</span>
            <span class="text-2xl text-slate-600">{{ $city->name }}</span>
        </h2>

        <div class="grid grid-cols-3 gap-3">
            <div class="text-center bg-white border border-slate-300 rounded pb-1">
                <h3 class="mb-1.5 font-medium text-slate-600 bg-slate-200 border-b border-slate-300">West End</h3>
                <a href="/shops.php">Shopping Mall</a><br />
                <a href="/itemmarket.php">Market Stalls</a><br />
                <a href="/cmarket.php">Diamond Market</a>
            </div>
            <div class="text-center bg-white border border-slate-300 rounded pb-1">
                <h3 class="mb-1.5 font-medium text-slate-600 bg-slate-200 border-b border-slate-300">City Center</h3>
                <a href="/monorail.php">Travel Agency</a><br />
                <a href="/estate.php">Realtor</a><br />
                <a href="/bank.php">National Bank</a>
            </div>
            <div class="text-center bg-white border border-slate-300 rounded pb-1">
                <h3 class="mb-1.5 font-medium text-slate-600 bg-slate-200 border-b border-slate-300">North Side</h3>
                <a href="/gangwars.php">Gang Wars</a><br />
                <a href="/gangcentral.php">Gangs</a><br />
                <a href="/fedjail.php">Federal Jail</a>
            </div>
            <div class="text-center bg-white border border-slate-300 rounded pb-1">
                <h3 class="mb-1.5 font-medium text-slate-600 bg-slate-200 border-b border-slate-300">South Side</h3>
                <a href="/crystaltemple.php">Diamond Temple</a><br />
                <a href="/battletent.php">Battle Tent</a><br />
                <a href="/polling.php">Polling Booth</a>
            </div>
            <div class="text-center bg-white border border-slate-300 rounded pb-1">
                <h3 class="mb-1.5 font-medium text-slate-600 bg-slate-200 border-b border-slate-300">Tourist Information</h3>
                <a href="/userlist.php">User List</a><br />
                <a href="/stafflist.php">MCCodes Staff</a><br />
                <a href="/halloffame.php">Hall of Fame</a>
            </div>
            <div class="text-center bg-white border border-slate-300 rounded pb-1">
                <h3 class="mb-1.5 font-medium text-slate-600 bg-slate-200 border-b border-slate-300">East End</h3>
                <a href="/slotsmachine.php?tresde={{ random_int(10000, 99999) }}">Slots Machine</a><br />
                <a href="/roulette.php?tresde={{ random_int(10000, 99999) }}">Roulette</a><br />
                <a href="/lucky.php">Lucky Boxes</a>
            </div>
        </div>
    </main>
@endsection

{{--

<a href='stats.php'>Game Stats</a><br />
<a href='usersonline.php'>Users Online</a>

--}}