<?php
$fmt = new IntlDateFormatter(	$lang, 
								IntlDateFormatter::LONG, //date format
								IntlDateFormatter::LONG, //time format
								'UTC', //timezone
								IntlDateFormatter::GREGORIAN); //calendar type
$clock = new \DateTime();
//day of the week, Month day, year
//%A, %B %e, %G
?>
<p><?= _("The current date is ") ?><?= $fmt->format($clock) ?></p>