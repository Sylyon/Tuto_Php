<?php
	include_once('Member.class.php');
	include_once('Admin.class.php');
	$member = new Member('Sylyon','bastien.drouot@immo-facile.com','Feeding is so good');
	if(($member -> getActive()))
	{
		echo 'member not bane';
	}
	echo $member -> getName();
	echo '<br/>';
	echo $member -> getEmail();
	$member->bane();
	echo '<br/>';
	if(!($member -> getActive()))
	{
		echo 'member bane';
	}
	unset($member);

	$admin = new Admin('Admin','Admin.drouot@immo-facile.com','Feeding is so admin','blue');
	echo '<br/>';
	echo $admin -> getName();
	echo '<br/>';
	echo $admin -> getColor();
?>