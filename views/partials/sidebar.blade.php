<aside class="flex flex-col flex-none p-3 space-y-3 w-72 bg-slate-100 border-r border-slate-300">
    <div class="grid grid-cols-2 text-sm">
        <span>Name</span>
        <span class="text-right">{{ $user->username }}</span>
        <span>Money</span>
        <span class="text-right">{{ number_format($user->money) }} Cr</span>
        <span>Level</span>
        <span class="text-right">{{ number_format($user->level) }}</span>
        <span>Diamonds</span>
        <span class="text-right">{{ number_format($user->crystals) }}</span>
    </div>

    <hr class="border-slate-300" />

    <div class="flex flex-col space-y-0.5">
        <div class="flex flex-col space-y-0.5">
            <div class="h-3 bg-white relative shadow-sm">
                <span class="bg-red-500 absolute top-0 left-0 bottom-0" style="width:{{ $user->energy * 100 / $user->maxenergy }}%"></span>
            </div>
            <p class="text-sm items-center flex justify-between">
                <span>Energy</span>
                <span>{{ number_format($user->energy * 100 / $user->maxenergy, 2) }} %</span>
            </p>
        </div>

        <div class="flex flex-col space-y-0.5">
            <div class="h-3 bg-white relative shadow-sm">
                <span class="bg-amber-500 absolute top-0 left-0 bottom-0" style="width:{{ $user->brave * 100 / $user->maxbrave }}%"></span>
            </div>
            <p class="text-sm items-center flex justify-between">
                <span>Brave</span>
                <span>{{ number_format($user->brave) }} / {{ number_format($user->maxbrave) }}</span>
            </p>
        </div>

        <div class="flex flex-col space-y-0.5">
            <div class="h-3 bg-white relative shadow-sm">
                <span class="bg-green-500 absolute top-0 left-0 bottom-0" style="width:{{ $user->hp * 100 / $user->maxhp }}%"></span>
            </div>
            <p class="text-sm items-center flex justify-between">
                <span>Health</span>
                <span>{{ number_format($user->hp * 100 / $user->maxhp, 2) }} %</span>
            </p>
        </div>

        <div class="flex flex-col space-y-0.5">
            <div class="h-3 bg-white relative shadow-sm">
                <span class="bg-cyan-500 absolute top-0 left-0 bottom-0" style="width:{{ $user->will * 100 / $user->maxwill }}%"></span>
            </div>
            <p class="text-sm items-center flex justify-between">
                <span>Will</span>
                <span>{{ number_format($user->will) }} / {{ number_format($user->maxwill) }}</span>
            </p>
        </div>
    </div>

    <hr class="border-slate-300" />

    @include('partials.menu')

</aside>
