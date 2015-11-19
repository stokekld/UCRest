<?php
/**
* Archivo que contiene la clase de SystemLog.
*
* @author Humberto de Jesus Flores Acuña <joy_warmgun@hotmail.com>
* @version 0.0.1
* @package Core\log
*/

namespace UCRest\Models\Logs;

date_default_timezone_set('America/Mexico_City');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\WebProcessor;

/**
* Clase para llevar el log del sistema
* Esta clase esta creada bajo el patrón Singleton
*/
class SystemLog
{
	/**
	* @var self $instance Contiene la instacia de esta clase.
	*/
	private static $instance;

	/**
	* @var Logger $log Contiene la instancia del log de Monolog.
	*/
	private $log;
	
	/**
	* Método constructor de la clase.
	*
	* Construye el log de Monolog y lo asigna a la variable de clase log.
	*/
	private function __construct()
	{
		$log = new Logger("Sistema.".$this -> getAppEnv());
		$log -> pushHandler(new StreamHandler(__DIR__."/../../../storage/logs/System.log"));
		$log -> pushProcessor(new WebProcessor());
		$this -> log = $log;
	}

	/**
	* Método que retorna la instancia creada de esta clase.
	* 
	* @return self
	* 
	*/
	public static function getInstance()
	{
		if ( !self::$instance instanceof self )
			self::$instance = new self;

		return self::$instance;
	}

	/**
	* Método que retorna el ambiente de la aplicación.
	*
	* @return string
	*/
	public function getAppEnv()
	{
		return getenv('APP_ENV');
	}

	/**
	* Método que retorna si la aplicación esta en modo debug.
	* 
	* @return boolean
	*/
	public function debugging()
	{
		return (getenv('APP_DEBUG') === 'true') or ($this -> getEnviroment() === 'testing');
	}

	/**
	* Método que retorna el log creado de Monolog.
	* 
	* @return Looger
	*/
	public function getLog()
	{
		return $this -> log;
	}

}