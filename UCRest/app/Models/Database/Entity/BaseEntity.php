<?php
/**
* Archivo que contiene la clase de BaseEntity.
*
* @author Humberto de Jesus Flores Acuña <joy_warmgun@hotmail.com>
* @version 0.0.1
* @package UCRest\Models\Database\Entity
*/

namespace UCRest\Models\Database\Entity;

use Illuminate\Database\Eloquent\Model;

/**
* Clase que contiene los métodos necesarios para modificar la tabla.
*/
class BaseEntity extends Model
{

	/**
	* @var boolean $timestamps Si es true inserta los timestamps en la tabla.
	*/
	public $timestamps = false;

	/**
	* Método para validar los datos a insertar en la base de datos
	*
	* @param string $name Contiene el nombre del atributo a validar.
	* @param string $rules Contiene las reglas de validación.
	* @param mixed $value Contiene el valor del atributo.
	* @param boolean $stripTags Contiene el valor booleano para decidir si se hace striptag a el valor del atributo.
	*
	* @throws InvalidArgumentException Si el tipo de valores de los parametros son incorrectos.
	* @throws UnexpectedValueException Si el valor del atributo no pasa la validación.
	*
	* @return mixed Retorna el valor valuado.
	*/
	protected function validation($name, $rules, $value, $stripTags)
	{
		if ( !is_string($name) or !is_string($rules) or !is_bool($stripTags) )
			throw new \InvalidArgumentException("ManagerDecorator::validation() Error de tipo en los parametros recibidos.");
			
		if ($stripTags)
			$value = strip_tags($value);

		$validation = \Validator::make([ $name => $value ], [ $name => $rules ]);

		if ( $validation ->  passes() )
			return $value;

		$message = $validation->messages()->first($name);

		throw new \UnexpectedValueException($message);
		
	}

	/**
	* Método para hacer el insert a la base.
	*
	* @param array $data Contiene los datos a insertar en la tabla.
	*/
	public function myInsert(array $data)
	{
		$dic = $this -> dictionary;

		foreach ($dic as $name => $prop)
		{
			$rules = isset($prop["rules"]) ? $prop["rules"] : "";
			$value = isset($data[$name]) ? $data[$name] : null;
			$stripTags = isset($prop["stripTags"]) ? $prop["stripTags"] : true;

			$this -> $prop['attribute'] = $this -> validation($name, $rules, $value, $stripTags);
		}

		$this -> save();
	}

	/**
	* Método para hacer el update a la base.
	*
	* @param array $data Contiene los datos a actualizar en la tabla.
	*
	*/
	public function myUpdate(array $data)
	{
		$dic = $this -> dictionary;

		foreach ($data as $name => $value)
		{
			if ( isset( $dic[$name]['attribute'] ) )
				$attr = $dic[$name]['attribute'];
			else
				throw new \UnexpectedValueException("No existe la regla $name");

			$rules = isset($dic[$name]["rules"]) ? $dic[$name]["rules"] : "";
			$stripTags = isset($dic[$name]["stripTags"]) ? $dic[$name]["stripTags"] : true;
			
			$this -> $attr = $this -> validation($name, $rules, $value, $stripTags);
		}

		$this -> save();
	}
}