<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use UCRest\Models\Database\Entity\TestEntity;
use UCRest\Models\Database\Manager\ManagerDecorator;

Route::get('/', function () {

	$testEntity = new TestEntity;

		$testEntity = new ManagerDecorator($testEntity);

		$data = [
			"id_test" => "hola",
			"test_col1" => "hola",
			"test_col2" => "hola",
			"test_col3" => "hola",
		];

		$value = $testEntity -> insert($data);

    return view('bienvenida');
});
