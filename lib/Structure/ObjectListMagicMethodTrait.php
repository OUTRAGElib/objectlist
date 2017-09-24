<?php


namespace OUTRAGElib\Structure;


trait ObjectListMagicMethodTrait
{
	/**
	 *	Handler method for accessing virtual properties.
	 */
	public function &__get($property)
	{
		return $this[$property];
	}
	
	
	/**
	 *	Handler method for setting virtual properties.
	 */
	public function __set($property, $value)
	{
		$this[$property] = $value;
	}
	
	
	/**
	 *	Handler method for checking if virtual property is set.
	 */
	public function __isset($property)
	{
		return isset($this[$property]);
	}
	
	
	/**
	 *	Handler method for removing virtual properties.
	 */
	public function __unset($property)
	{
		unset($this[$property]);
	}
}