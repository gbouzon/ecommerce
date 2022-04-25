	<h1><?= _('Client details') ?></h1>
	<form method='post' action=''>
		<label class='form-label'><?= _('First name') ?>:<input type='text' name='first_name' class='form-control' value='<?= $data->first_name?>' /></label>
		<label class='form-label'><?= _('Last name') ?>:<input type='text' name='last_name' class='form-control' value='<?= $data->last_name?>' /></label>
		<label class='form-label'><?= _('Email') ?>:<input type='text' name='email' class='form-control' value='<?= $data->email?>' /></label><br>
		<label class='form-label'><?= _('Notes') ?>:<textarea name='notes' class='form-control'><?= $data->notes?></textarea></label><br>
		<label class='form-label'><?= _('City') ?>:<input type='text' name='city' class='form-control' value='<?= $data->city?>' /></label>
		<label class='form-label'><?= _('Province') ?>:<input type='text' name='province' class='form-control' value='<?= $data->province?>' /></label>
		<label class='form-label'><?= _('Country') ?>:<input type='text' name='country' class='form-control' value='<?= $data->country?>' /></label>
		<label class='form-label'><?= _('Postal') ?>:<input type='text' name='postal' class='form-control' value='<?= $data->postal?>' /></label><br>
	</form>
<a href='/Animal/index/<?= $data->client_id ?>'><?= _('List my animals') ?></a>