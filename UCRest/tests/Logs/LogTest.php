<?php
/**
* Archivo que contiene la clase de LogTest.
*
* @author Humberto de Jesus Flores Acuña <joy_warmgun@hotmail.com>
* @version 0.0.1
* @package Tests\Logs
*/

namespace Tests\Logs;

use UCRest\Models\Logs\SystemLog;

/**
* Clase que lleva acabo los test de clase UCRest\Models\Logs\SystemLog.
*/
class LogTest extends TestCase
{
	

	/**
	* Test para obtener la instancia correcta de UCRest\Models\Logs\SystemLog.
	*/
	public function testGetInstance()
	{
		$SysLog = SystemLog::getInstance();

		$this->assertInstanceOf('UCRest\Models\Logs\SystemLog', $SysLog);
	}

	/**
	* Test para obtener la instancia correcta de Monolog\Logger.
	*/
	public function testGetLog()
	{
		$log = SystemLog::getInstance() -> getLog();

		$this->assertInstanceOf('Monolog\Logger', $log);
	}

	/**
	* Test para agregar una entrada al log.
	*/
	public function testAddInfo()
	{
		$log = SystemLog::getInstance() -> getLog();
		$log -> addError('Test', ['message' =>  "Este es un test" ]);

	}
}