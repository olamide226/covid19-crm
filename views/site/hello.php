<br>
<br>
<br>
<br>
<br>
<h1>Webvimark</h1>
<?php
use webvimark\modules\UserManagement\components\GhostNav;
use webvimark\modules\UserManagement\UserManagementModule;
echo date('Y-m-d H:i:s') . "<br>";
echo true  | false;
echo GhostNav::widget([
	'encodeLabels'=>false,
	'activateParents'=>true,
	'items' => [
		[
			'label' => 'Backend routes',
			'items'=>UserManagementModule::menuItems()
		],
		[
			'label' => 'Frontend routes',
			'items'=>[
				['label'=>'Login', 'url'=>['/user-management/auth/login']],
				['label'=>'Logout', 'url'=>['/user-management/auth/logout']],
				['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
				['label'=>'Change own password', 'url'=>['/user-management/auth/change-own-password']],
				['label'=>'Password recovery', 'url'=>['/user-management/auth/password-recovery']],
				['label'=>'E-mail confirmation', 'url'=>['/user-management/auth/confirm-email']],
			],
		],
	],
]);
?>
