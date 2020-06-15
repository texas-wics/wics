<?php
$days = date("t");
$month = date("m");
$year = date("y");

echo "<div class=\"calmonth\">";

for($i = 1; $i <= $days; $i++){
	$timestamp = mktime(0,0,0,$month,$i,$year);
	$day_of_week = date("D", $timestamp);
	$head = $i == 1 ? ' first' : '';
	$tail = $i == $days ? ' last' : '';
	echo "<div class=\"calday $day_of_week$head$tail\">$i</div>";
	
}
echo "</div>"
?>
<h2>Upcoming Events</h2>
<h3>Some news update here</h3>
<h4>August 11th, 2011</h4>
<p>Short description here...</p>
<h3>Some news update here</h3>
<h4>August 11th, 2011</h4>
<p>Short description here...</p>
<h3>Some news update here</h3>
<h4>August 11th, 2011</h4>
<p>Short description here...</p>
<h3>Some news update here</h3>
<h4>August 11th, 2011</h4>
<p>Short description here...</p>