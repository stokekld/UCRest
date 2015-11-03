<?php

namespace UCRest\Models\Layers;

/**
* 
*/
class EntityFactory
{
	
	public static function build(string $entity)
	{
		$class = "UCRest\\Models\\Layers\\Entities\\".$entity;

		return new $class();
	}
}