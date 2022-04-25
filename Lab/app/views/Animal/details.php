<html dir='<?= _('ltr') ?>'>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title><?= _('Animal Details') ?></title>
</head>
<body>
	<div class='container'>
		<?php
			$this->view('shared/navigation');
		?>
		<?php
			$this->view('shared/clock');
		?>

		<?php
			$this->view('Client/details_subview', $data->getOwner());
		?>

	<h1><?= _('Animal details') ?>: <?=$data->name ?></h1>

	<img style="<?= _('float:left') ?>;max-width:300px;max-height:300px;margin:10px" src='/pictures/<?= $data->picture ?>' />
<dl>
	<dt><?= _('Birth date') ?></dt>
	<dd><?php
		$fmt = new \IntlDateFormatter(	$lang, 
										IntlDateFormatter::LONG, //date format
										IntlDateFormatter::NONE, //time format
										null, //timezone
										IntlDateFormatter::GREGORIAN); //calendar type
	echo $fmt->format(new \DateTime($data->dob));
	?></dd>
</dl>
</div>
</body>
</html>