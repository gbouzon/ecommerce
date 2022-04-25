<?php

$clock = new \DateTime();
//day of the week, Month day, year
echo _("The current date is "), strftime(_("%A, %B %e, %G"), $clock->getTimestamp());