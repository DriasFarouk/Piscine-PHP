<?php

class UnholyFactory
{
	public $types = [];
	public $names = [];
	public function absorb($x)
	{
		if (isset($x->fighter))
		{
			if (!in_array($x, $this->types))
			{
				echo "(Factory absorbed a fighter of type ".$x->type.")".PHP_EOL;
				$this->types[] = $x;
				$this->names[] = $x->type;
			}
			else
				echo "(Factory already absorbed a fighter of type ".$x->type.")".PHP_EOL;
		}
		else
			echo "(Factory can't absorb this, it's not a fighter)".PHP_EOL;
	}
	public function fabricate($x)
	{
		if (in_array($x, $this->names))
		{
			echo "(Factory fabricates a fighter of type ".$x.")".PHP_EOL;
			return $this->types[array_search($x, $this->names)];
		}
		else
		{
			echo "(Factory hasn't absorbed any fighter of type ".$x.")".PHP_EOL;
			return NULL;
		}
	}
}

?>