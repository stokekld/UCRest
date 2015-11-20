<?php

namespace UCRest\Models\Database\Entity;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
abstract class BaseEntity extends Model
{
	abstract public function getDictionary();

	public $timestamps = false;
}