@if ($user->jail)
    <div class="bg-red-500 text-white font-medium text-center py-2 rounded">You are in jail</div>
@elseif ($user->hospital)
    <p class="bg-red-500 text-white font-medium text-center py-2 rounded">You are in hospital</p>
@else
    {{-- Donate & Vote links --}}
@endif
