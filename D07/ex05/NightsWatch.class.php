<?php

class NightsWatch implements IFighter
{
	public $var = [];
	public function recruit($x)
	{
		$this->var[] = $x;
	}
	function fight()
	{
		foreach ($this->var as $el)
		{
			if (method_exists(get_class($el), 'fight'))
				$el->fight();
		}
	}
}

?>