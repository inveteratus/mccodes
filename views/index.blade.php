@extends('layouts.auth')

@section('content')
    <main class="flex flex-grow flex-col p-3 space-y-3">
        @include('partials.alerts')

        <h2 class="text-3xl border-b border-slate-200 font-light text-slate-500">Home</h2>

        <div>
            <h3 class="font-medium text-slate-600 text-center">Overview</h3>
            <div class="grid grid-cols-4 gap-x-3 gap-y-1">
                <span class="text-right">Name</span>
                <span>{{ $user->username }}</span>
                <span class="text-right">Property</span>
                <span>{{ $user->hNAME }}</span>
                <span class="text-right">Age</span>
                <span>{{ Carbon\Carbon::createFromTimestamp($user->signedup)->diffForHumans(null, \Carbon\CarbonInterface::DIFF_ABSOLUTE, parts:2) }}</span>
                <span class="text-right">Gang</span>
                <span>{{ $user->gangNAME ?? 'Unaffiliated' }}</span>
                <span class="text-right">Location</span>
                <span>{{ $user->cityname }}</span>
                <span class="text-right">Job</span>
                <span>{{ $user->jrNAME ?? 'Unemployed' }}</span>
                <span class="text-right">Bank</span>
                <span>{{ number_format($user->bankmoney) }} Cr</span>
                <span class="text-right">Key</span>
                <span>Value</span>
            </div>
        </div>

        <div>
            <h3 class="font-medium text-slate-600 text-center">Statistics</h3>
            <table class="w-full border border-slate-300">
                <thead class="bg-slate-100">
                    <tr>
                        <th class="p-2 font-medium text-slate-600 text-left">Skill</th>
                        <th class="p-2 font-medium text-slate-600 text-right">Experience</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr class="hover:bg-amber-50">
                        <td class="p-2 text-left">Strength</td>
                        <td class="p-2 text-right">{{ number_format($user->strength, 3) }}</td>
                    </tr>
                    <tr class="hover:bg-amber-50">
                        <td class="px-2 py-1 text-left">Guard</td>
                        <td class="px-2 py-1 text-right">{{ number_format($user->guard, 3) }}</td>
                    </tr>
                    <tr class="hover:bg-amber-50">
                        <td class="px-2 py-1 text-left">Labour</td>
                        <td class="px-2 py-1 text-right">{{ number_format($user->labour, 3) }}</td>
                    </tr>
                    <tr class="hover:bg-amber-50">
                        <td class="px-2 py-1 text-left">Agility</td>
                        <td class="px-2 py-1 text-right">{{ number_format($user->agility, 3) }}</td>
                    </tr>
                    <tr class="hover:bg-amber-50">
                        <td class="px-2 py-1 text-left">Intelligence</td>
                        <td class="px-2 py-1 text-right">{{ number_format($user->IQ, 3) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <h3 class="font-medium text-slate-600 text-center">Notepad</h3>
            <form action="/" method="post">
                <textarea name="notes" class="border border-slate-300 focus:outline-none focus:ring-1 focus:ring-offset-0 focus:border-blue-500 focus:ring-blue-500 p-2 bg-white w-full rounded h-40">{{ $user->user_notepad }}</textarea>
                <button type="submit" class="text-sm px-3 py-2 text-white bg-blue-500 focus:ring-2 focus:ring-offset-1 focus:ring-blue-500 focus:ring-offset-slate-50 focus:outline-none rounded font-medium">Save</button>
            </form>
        </div>
    </main>
@endsection
