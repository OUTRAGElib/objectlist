<?php


namespace OUTRAGElib\Structure;

use \ArrayAccess;
use \Exception;


trait ObjectListDelegatorTrait
{
	/**
	 *	Handler method for accessing virtual properties.
	 */
	public function &__get($property)
	{
		if(!$this instanceof ArrayAccess)
			throw new Exception("Unable to perform this action on objects that are not children of ArrayAccess");
		
		return $this->offsetGet($property);
	}
	
	
	/**
	 *	Handler method for setting virtual properties.
	 */
	public function __set($property, $value)
	{
		if(!$this instanceof ArrayAccess)
			throw new Exception("Unable to perform this action on objects that are not children of ArrayAccess");
		
		return $this->offsetSet($property, $value);
	}
	
	
	/**
	 *	Handler method for checking if virtual property is set.
	 */
	public function __isset($property)
	{
		if(!$this instanceof ArrayAccess)
			throw new Exception("Unable to perform this action on objects that are not children of ArrayAccess");
		
		return $this->offsetExists($property) && $this->offsetGet($property) !== null;
	}
	
	
	/**
	 *	Handler method for removing virtual properties.
	 */
	public function __unset($property)
	{
		if(!$this instanceof ArrayAccess)
			throw new Exception("Unable to perform this action on objects that are not children of ArrayAccess");
		
		return $this->offsetUnset($property);
	}
}