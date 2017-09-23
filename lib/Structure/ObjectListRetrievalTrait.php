<?php


namespace OUTRAGElib\Structure;


trait ObjectListRetrievalTrait
{
	/**
	 *	toArray will return turn itself into arrays
	 */
	public function toArray()
	{
		$output = iterator_to_array($this);
		
		foreach($output as $index => $value)
		{
			# it's safe to presume this will be a thing
			if($value instanceof self)
				$output[$index] = $value->toArray();
		}
		
		return $output;
	}
}