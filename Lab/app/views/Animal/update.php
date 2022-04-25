<html dir='<?= _('ltr') ?>' lang='<?= $lang ?>'>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title><?= _('Animal Update') ?></title>
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

	<h1><?= _('Update the animal') ?></h1>
		<img style="<?= _('float:left') ?>;max-width:300px;max-height:300px;margin:10px" src='/pictures/<?= $data->picture ?>' />

	<form method='post' action='' enctype='multipart/form-data'>
		<label class='form-label'><?= _('Animal name') ?>:<input type='text' name='name' value='<?=$data->name ?>' class='form-control' /></label><br>
		<label class='form-label'><?= _('Birth date') ?>:<input type='date' name='dob' value= '<?= $data->dob ?>' class='form-control' /></label><br>
		<label class='form-label'><?= _('Picture of the animal (if you want to change it...):') ?><input type='file' name='picture' class='form-control' /></label><br />
		<label><input type="submit" name='action' value='<?= _('Update!') ?>' class='form-control' /></label>
	</form>
	</div>
</body>
</html>