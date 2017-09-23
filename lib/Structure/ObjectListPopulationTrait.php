<?php


namespace OUTRAGElib\Structure;

use \ArrayAccess;
use \Exception;
use \Traversable;

trait ObjectListPopulationTrait
{
	/**
	 *	Populate an object list from, well, anything really
	 */
	public final function populateObjectList($input, $deep = true)
	{
		if($this instanceof ArrayAccess == false)
			throw new Exception("Cannot set properties on objects that are not children of 'ArrayAccess'");
		
		if(!is_array($input))
		{
			if($input instanceof Traversable && method_exists($input, "toArray"))
				$input = $input->toArray();
			elseif($input instanceof Traversable)
				$input = iterator_to_array($input);
			else
				$input = [];
		}
		
		if($deep)
		{
			foreach($input as $key => $value)
			{
				if(is_null($value) || is_scalar($value))
					$this[$key] = $value;
				else
					$this[$key] = (new static())->populateObjectList($value, $deep);
			}
		}
		else
		{
			foreach($input as $key => $value)
			{
				# if we're not in deep mode then all we're doing is going through
				# each of the items and tacking them onto the stack, or something
				$this[$key] = $value;
			}
		}
		
		return $this;
	}
}