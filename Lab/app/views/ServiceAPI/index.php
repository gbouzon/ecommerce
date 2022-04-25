<html dir='<?= _('ltr') ?>'>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title><?= _('View API') ?></title>
</head>
<body>
	<div class='container'>
		<?php
			$this->view('shared/navigation');
		?>
		<?php
			$this->view('shared/clock');
		?>

		<h1><?= _('All APIs') ?></h1>
		<table>
			<tr>
                <th><?= _('API') ?></th>
                <th><?= _('Description') ?></th>
                <th><?= _('Auth') ?></th>
                <th><?= _('HTTPS') ?></th>
                <th><?= _('Cors') ?></th>
                <th><?= _('Link') ?></th>
                <th><?= _('Category') ?></th></tr>
		<?php 
            foreach ($data->entries as $key => $value) {
                echo "<tr><td>$value->API</td>
                        <td>$value->Description</td>
                        <td>$value->Auth</td>
                        <td>$value->HTTPS</td>
                        <td>$value->Cors</td>
                        <td>$value->Link</td>
                        <td>$value->Category</td></tr>";
            }

		?>
		</table>
	</div>
</body>
</html>