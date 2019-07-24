<?php

abstract class Fighter
{
	public $fighter = True;
	public $type = "";
	abstract protected function fight($target);
	public function __construct($name)
	{
		$this->type = $name;
	}
}

?>