<div style="<?= _('float:left') ?>;height:100%;margin:10px">
	<dl>
		<dt><?= _('Navigation') ?></dt>
		<dd>
			<ul>
				<li><a href='/ServiceAPI/getAPIData'><?= _('View APIs (assignment)') ?></a></li>
				<li><a href='/Client/index'><?= _('Client index') ?></a></li>
				<li><a href='/Client/create'><?= _('Client create') ?></a></li>
			<?php if(!isset($_SESSION['user_id'])){ ?>
				<li><a href='/User/login'><?= _('Log in') ?></a></li>
			<?php }else{ ?>
				<li><a href='/User/logout'><?= _('Log out') ?></a></li>
			<?php } ?>
			</ul>
		</dd>
		<dt><?= _('Languages') ?></dt>
		<dd>
			<ul>
			<?php
			global $localizations;
			foreach ($localizations as $locale) {
				echo "<li><a href='?lang=$locale'>".\Locale::getDisplayName($locale, $locale).'</a></li>';
			}
			?>
			</ul>
		</dd>
</div>