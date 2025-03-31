<aside>
    <div class="info">
        <span>Name</span>
        <span>{{ $user->username }}</span>
        <span>Money</span>
        <span>{{ number_format($user->money) }} Cr</span>
        <span>Level</span>
        <span>{{ number_format($user->level) }}</span>
        <span>Diamonds</span>
        <span>{{ number_format($user->crystals) }}</span>
    </div>

    <hr />

    <div class="bars">
        <div class="red">
            <div>
                <span style="width:{{ $user->energy * 100 / $user->maxenergy }}%"></span>
            </div>
            <p>
                <span>Energy</span>
                <span>{{ number_format($user->energy * 100 / $user->maxenergy, 2) }} %</span>
            </p>
        </div>

        <div class="amber">
            <div>
                <span style="width:{{ $user->brave * 100 / $user->maxbrave }}%"></span>
            </div>
            <p>
                <span>Brave</span>
                <span>{{ number_format($user->brave) }} / {{ number_format($user->maxbrave) }}</span>
            </p>
        </div>

        <div class="green">
            <div>
                <span style="width:{{ $user->hp * 100 / $user->maxhp }}%"></span>
            </div>
            <p>
                <span>Health</span>
                <span>{{ number_format($user->hp * 100 / $user->maxhp, 2) }} %</span>
            </p>
        </div>

        <div class="cyan">
            <div>
                <span style="width:{{ $user->will * 100 / $user->maxwill }}%"></span>
            </div>
            <p>
                <span>Will</span>
                <span>{{ number_format($user->will) }} / {{ number_format($user->maxwill) }}</span>
            </p>
        </div>
    </div>

    <hr />

    @include('partials.menu')

</aside>
