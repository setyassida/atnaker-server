<?php
require_once 'active/ActiveRecord.php';

class Joborder extends ActiveRecord\Model
{
	static $table_name = 'joborder';
	static $primary_key = 'joid';
}

class Majikan extends ActiveRecord\Model
{
	static $table_name = 'majikan';
	static $primary_key = 'mjid';
}

class Tki extends ActiveRecord\Model
{
	static $table_name = 'tki';
	static $primary_key = 'tkid';
}

class Entitas extends ActiveRecord\Model
{
	static $table_name = 'entitas';
	static $primary_key = 'enid';
}

ActiveRecord\Config::initialize(function($cfg)
	{
		$cfg->set_model_directory('.');
		$cfg->set_connections(array('development' => 'mysql://endorsement:kdei@localhost/endorsement3?charset=big5'));
	});
?>