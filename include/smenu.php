<?php

global $db, $c, $ir, $set;

echo "&gt; <a href='/home'>Back To Game</a><hr />
<b>General</b><br />
&gt; <a href='staff.php'>Index</a><br />";
echo "
&gt; <a href='staff.php?action=basicset'>Basic Settings</a><br />
&gt; <a href='staff.php?action=announce'>Add Announcement</a><br />
&gt; <a href='staff.php?action=fire-cron'>Fire Cron</a><br />";
echo ' <hr />
<b>Users</b><br />';
echo "&gt; <a href='staff_users.php?action=newuser'>Create New User</a><br />
&gt; <a href='staff_users.php?action=edituser'>Edit User</a><br />
&gt; <a href='staff_users.php?action=deluser'>Delete User</a><br />";
echo "&gt; <a href='staff_users.php?action=invbeg'>View User Inventory</a><br />";
echo "&gt; <a href='staff_users.php?action=creditform'>Credit User</a><br />";
echo "&gt; <a href='staff_users.php?action=masscredit'>Mass Payment</a><br />";
echo "&gt; <a href='staff_users.php?action=forcelogout'>Force User Logout</a><br />";
echo "
&gt; <a href='staff_users.php?action=reportsview'>Player Reports</a><br />";
echo '<hr />
<b>Items</b><br />';
echo "
&gt; <a href='staff_items.php?action=newitem'>Create New Item</a><br />
&gt; <a href='staff_items.php?action=edititem'>Edit Item</a><br />
&gt; <a href='staff_items.php?action=killitem'>Delete An Item</a><br />
&gt; <a href='staff_items.php?action=newitemtype'>Add Item Type</a><br />";
echo "&gt; <a href='staff_items.php?action=giveitem'>Give Item To User</a><br />";
echo "<hr /><b>Logs</b><br />
&gt; <a href='staff_logs.php?action=atklogs'>Attack Logs</a><br />
&gt; <a href='staff_logs.php?action=cashlogs'>Cash Xfer Logs</a><br />
&gt; <a href='staff_logs.php?action=cryslogs'>Crystal Xfer Logs</a><br />
&gt; <a href='staff_logs.php?action=banklogs'>Bank Xfer Logs</a><br />
&gt; <a href='staff_logs.php?action=itmlogs'>Item Xfer Logs</a><br />
&gt; <a href='staff_logs.php?action=maillogs'>Mail Logs</a><br />
&gt; <a href='staff_logs.php?action=cron-fails'>Cron Fail Logs</a><br />
";
echo " <hr />
<b>Gangs</b><br />
&gt; <a href='staff_gangs.php?action=grecord'>Gang Record</a><br />
&gt; <a href='staff_gangs.php?action=gcredit'>Credit Gang</a><br />
&gt; <a href='staff_gangs.php?action=gwar'>Manage Gang Wars</a><br />
&gt; <a href='staff_gangs.php?action=gedit'>Edit Gang</a><br />";
echo " <hr />
<b>Shops</b><br />
&gt; <a href='staff_shops.php?action=newshop'>Create New Shop</a><br />
&gt; <a href='staff_shops.php?action=newstock'>Add Item To Shop</a><br />
&gt; <a href='staff_shops.php?action=delshop'>Delete Shop</a><br />";
echo "<hr /><b>Polls</b><br />
&gt; <a href='staff_polls.php?action=spoll'>Start Poll</a><br />
&gt; <a href='staff_polls.php?action=endpoll'>End A Poll</a><br />";
echo "<hr /><b>Jobs</b><br />
&gt; <a href='staff_jobs.php?action=newjob'>Make a new Job</a><br />
&gt; <a href='staff_jobs.php?action=jobedit'>Edit a Job</a><br />
&gt; <a href='staff_jobs.php?action=jobdele'>Delete a Job</a><br />
&gt; <a href='staff_jobs.php?action=newjobrank'>Make a new Job Rank</a><br />
&gt; <a href='staff_jobs.php?action=jobrankedit'>Edit a Job Rank</a><br />
&gt; <a href='staff_jobs.php?action=jobrankdele'>Delete a Job Rank</a><br />";
echo "<hr /><b>Houses</b><br />
&gt; <a href='staff_houses.php?action=addhouse'>Add House</a><br />
&gt; <a href='staff_houses.php?action=edithouse'>Edit House</a><br />
&gt; <a href='staff_houses.php?action=delhouse'>Delete House</a><br />";
echo "<hr /><b>Cities</b><br />
&gt; <a href='staff_cities.php?action=addcity'>Add City</a><br />
&gt; <a href='staff_cities.php?action=editcity'>Edit City</a><br />
&gt; <a href='staff_cities.php?action=delcity'>Delete City</a><br />";
echo "<hr /><b>Forums</b><br />
&gt; <a href='staff_forums.php?action=addforum'>Add Forum</a><br />
&gt; <a href='staff_forums.php?action=editforum'>Edit Forum</a><br />
&gt; <a href='staff_forums.php?action=delforum'>Delete Forum</a><br />";
echo "<hr /><b>Courses</b><br />
&gt; <a href='staff_courses.php?action=addcourse'>Add Course</a><br />
&gt; <a href='staff_courses.php?action=editcourse'>Edit Course</a><br />
&gt; <a href='staff_courses.php?action=delcourse'>Delete Course</a><br />";
echo "<hr /><b>Crimes</b><br />
&gt; <a href='staff_crimes.php?action=newcrime'>Create New Crime</a><br />
&gt; <a href='staff_crimes.php?action=editcrime'>Edit Crime</a><br />
&gt; <a href='staff_crimes.php?action=delcrime'>Delete Crime</a><br />
&gt; <a href='staff_crimes.php?action=newcrimegroup'>Create New Crime Group</a><br />
&gt; <a href='staff_crimes.php?action=editcrimegroup'>Edit Crime Group</a><br />
&gt; <a href='staff_crimes.php?action=delcrimegroup'>Delete Crime Group</a><br />
&gt; <a href='staff_crimes.php?action=reorder'>Reorder Crime Groups</a><br />";
echo "<hr /><b>Battle Tent</b><br />
&gt; <a href='staff_battletent.php?action=addbot'>Add Challenge Bot</a><br />
&gt; <a href='staff_battletent.php?action=editbot'>Edit Challenge Bot</a><br />
&gt; <a href='staff_battletent.php?action=delbot'>Remove Challenge Bot</a><br />";
echo "<hr />
<b>Punishments</b><br />
&gt; <a href='staff_punit.php?action=mailform'>Mail Ban User</a><br />
&gt; <a href='staff_punit.php?action=unmailform'>Un-Mailban User</a><br />
&gt; <a href='staff_punit.php?action=forumform'>Forum Ban User</a><br />
&gt; <a href='staff_punit.php?action=unforumform'>Un-Forumban User</a><br />
&gt; <a href='staff_punit.php?action=fedform'>Jail User</a><br />
&gt; <a href='staff_punit.php?action=fedeform'>Edit Fedjail Sentence</a><br />
&gt; <a href='staff_punit.php?action=unfedform'>Unjail User</a><br />
&gt; <a href='staff_punit.php?action=ipform'>Ip Search</a><br />";
echo '<hr /><b>Special</b><br />';
echo "&gt; <a href='staff_special.php?action=editnews'>Edit Newspaper</a><br />";
echo "&gt; <a href='staff_special.php?action=massmailer'>Mass mailer</a><br />";
echo "&gt; <a href='staff_special.php?action=givedpform'>Give User Donator Pack</a><br />";
echo '<hr /><b>Staff Online:</b><br />';
$online_staff = get_online_staff();
foreach ($online_staff as $r)
{
    echo '<a href="viewuser.php?u=' . $r['userid'] . '">' . $r['username'] . '</a> (' . datetime_parse($r['laston']) . ')<br />';
}
echo "<hr />
&gt; <a href='logout.php'>Logout</a><br /><br />
Time is now<br />
";
echo date('F j, Y') . '<br />' . date('g:i:s a');
