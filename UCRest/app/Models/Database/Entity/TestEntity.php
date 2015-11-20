<?php

namespace UCRest\Models\Database\Entity;

/**
* 
*/
class TestEntity extends BaseEntity
{
	
	protected $table = 'test';

	protected $primaryKey = 'idtest';

	// | idtest   | int(11)     | NO   | PRI | NULL    | auto_increment |
	// | testcol1 | varchar(45) | NO   |     | NULL    |                |
	// | testcol2 | varchar(45) | NO   |     | NULL    |                |
	// | testcol3 | varchar(45) | NO   |   

	function getDictionary()
	{
		$dictionary = new \stdClass();

		$dictionary -> id_test = ['attribute' => "idtest", 'rules' => ""];
		$dictionary -> test_col1 = ['attribute' => "testcol1", 'rules' => "required|numeric", 'stripTags' => true];
		$dictionary -> test_col2 = ['attribute' => "testcol2", 'rules' => "required", 'stripTags' => true];
		$dictionary -> test_col3 = ['attribute' => "testcol3", 'rules' => "required", 'stripTags' => true];

		return $dictionary;
	}

}