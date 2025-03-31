<div class="menu">
    @if ($user->hospital > 0)
        <a href="/hospital.php">Hospital (...)</a><br />
        <a href="/inventory">Inventory</a><br />
    @elseif ($user->jail > 0)
        <a href="jail.php">Jail (...)</a><br />
    @else
        <a href="/home">Home</a><br />
        <a href="/inventory">Inventory</a><br />
    @endif

    <a href="/events.php">Events (...)</a><br />
    <a href="/mailbox.php">Mailbox (...)</a><br />

    @if ($user->jail)
        <a href="/gym.php">Jail Gym</a><br />
        <a href="/hospital.php">Hospital (...)</a><br />
    @elseif (!$user->hospital)
        <a href="/explore">Explore</a><br />
        <a href="/gym.php">Gym</a><br />
        <a href="/criminal.php">Crimes</a><br />
        <a href="/job.php">Your Job</a><br />
        <a href="/education.php">Local School</a><br />
        <a href="/hospital.php">Hospital (...)</a><br />
        <a href="/jail.php">Jail (...)</a><br />
    @else
        <a href="/jail.php">Jail (...)</a><br />
    @endif

    <a href="/forums.php">Forums</a><br />
    <a href="/announcements.php">Announcements (...)</a><br />
    <a href="/newspaper.php">Newspaper</a><br />
    <a href="/search.php">Search</a><br />

    @if (!$user->jail && $user->gang)
        echo "<a href="/yourgang.php">Your Gang</a><br />
    @endif

    @if ($user->user_level > 1)
        <hr />
        <a href="/staff.php">Staff Console</a><br />
    @endif

    <hr />

    <a href="/friendslist.php">Friends List</a><br />
    <a href="/blacklist.php">Black List</a><br />

    <hr />

    <a href="/preferences.php">Preferences</a><br />
    <a href="/preport.php">Player Report</a><br />
    <a href="/helptutorial.php">Help Tutorial</a><br />
    <a href="/gamerules.php">Game Rules</a><br />
    <a href="/viewuser.php?u={{ $user->userid }}">My Profile</a><br />

    <hr />

    <form action="/logout" method="post">
        <button type="submit">Logout</button>
    </form>

</div>
