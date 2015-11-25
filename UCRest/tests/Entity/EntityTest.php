<?php

use UCRest\Models\Database\Entity\TestEntity;
use UCRest\Models\Database\Manager\ManagerDecorator;

/**
* 
*/
class EntityTest extends TestCase
{
	
	public function testInsert()
	{
		$testEntity = new TestEntity;

		$data = [
			"test_col1" => "hola",
			"test_col2" => "hola",
			"test_col3" => "hola"
		];

		$testEntity -> myInsert($data);

	}

	public function testUpdate()
	{
		$testEntity = new TestEntity;


		$data = [
			"test_col3" => "hola22",
			"test_col2" => "hola22"
		];


		$testEntity -> where("idtest", 2) -> get() -> each( function($item) use ($data){

			$item -> myUpdate($data);

		} );
	}
}