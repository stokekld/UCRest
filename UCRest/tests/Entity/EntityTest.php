<?php

use UCRest\Models\Database\Entity\TestEntity;
use UCRest\Models\Database\Manager\ManagerDecorator;

/**
* 
*/
class EntityTest extends TestCase
{
	
	public function testGetInstance()
	{
		$testEntity = new TestEntity;

		$testEntity = new ManagerDecorator($testEntity);

		$data = [
			"id_test" => "hola",
			"test_col1" => "hola",
			"test_col2" => "hola",
			"test_col3" => "hola",
		];

		$value = $testEntity -> insert($data);

		var_dump($value -> toArray());

	}
}