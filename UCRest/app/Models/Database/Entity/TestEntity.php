<?php

namespace UCRest\Models\Database\Entity;

/**
* 
*/
class TestEntity extends BaseEntity
{
	
	protected $table = 'test';

	protected $primaryKey = 'idtest';

	protected $dictionary = [

		"id_test" => ['attribute' => "idtest", 'rules' => "numeric"],
		"test_col1" => ['attribute' => "testcol1", 'rules' => "required", 'stripTags' => true],
		"test_col2" => ['attribute' => "testcol2", 'rules' => "required", 'stripTags' => true],
		"test_col3" => ['attribute' => "testcol3", 'rules' => "required", 'stripTags' => true],

	];

}