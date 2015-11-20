<?php

namespace UCRest\Models\Database\Manager;



/**
* 
*/
class ManagerDecorator
{
	protected $entity;
	protected $typeClass;
	
	function __construct($entity)
	{
		$this -> entity = $entity;
		$this -> typeClass = get_class($entity);
	}

	protected function validation($name, $rules, $value, $stripTags)
	{
		if ( !is_string($name) or !is_string($value) or !is_bool($stripTags) )
			throw new \InvalidArgumentException("ManagerDecorator::validation() Error de tipo en los parametros recibidos.");
			
		if ($stripTags)
			$value = strip_tags($value);

		$validation = \Validator::make([ $name => $value ], [ $name => $rules ]);

		if ( !$validation -> fails() )
			return $value;

		$message = $validation->messages()->first($name);

		throw new \UnexpectedValueException($message);
		
	}

	public function insert(array $data)
	{
		$pk = $this -> getKeyName();
		$dic = $this -> getDictionary();

		$insert = new $this -> typeClass();
		
		foreach ($dic as $name => $prop)
		{
			$rules = isset($prop["rules"]) ? $prop["rules"] : "";
			$value = isset($data[$name]) ? $data[$name] : null;
			$stripTags = isset($prop["stripTags"]) ? $prop["stripTags"] : true;

			if ( $prop['attribute'] !== $pk )
				$insert -> $prop['attribute'] = $this -> validation($name, $rules, $value, $stripTags);
		}

		$insert -> save();

		return $insert;
	}

	public function __call($method, $args)
	{
		return call_user_func_array(array($this->entity, $method), $args);
	}
}