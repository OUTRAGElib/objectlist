<?php


namespace OUTRAGElib\Validate\Tests;

require __DIR__."/../vendor/autoload.php";
require __DIR__."/DummyObjectList.php";

use \OUTRAGElib\Structure\ObjectList;
use \PHPUnit\Framework\TestCase;


class ObjectListTest extends TestCase
{
	/**
	 *	Test a basic object list
	 */
	public function testObjectList()
	{
		$input = [
			1,
			2,
			3,
			4,
			5,
		];
		
		$list = new DummyObjectList();
		$list->populateObjectList($input);
		
		$output = [
			1,
			2,
			3,
			4,
			5,
		];
		
		$this->assertEquals($output, iterator_to_array($list));
	}
	
	
	/**
	 *	Test a nested object list
	 */
	public function testNestedObjectList()
	{
		$input = [
			1,
			2,
			3,
			4,
			5,
			
			[
				1,
				2,
				3,
				4,
				5,
			],
		];
		
		$list = new DummyObjectList();
		$list->populateObjectList($input, true);
		
		$this->assertEquals($input[5][1], $list[5][1]);
	}
	
	
	/**
	 *	Test a nested object list, but going back to an array afterwards
	 */
	public function testNestedObjectListToArrat()
	{
		$input = [
			1,
			2,
			3,
			4,
			5,
			
			[
				1,
				2,
				3,
				4,
				5,
			],
		];
		
		$list = new DummyObjectList();
		$list->populateObjectList($input, true);
		
		$output = [
			1,
			2,
			3,
			4,
			5,
			
			[
				1,
				2,
				3,
				4,
				5,
			],
		];
		
		$this->assertEquals($output, $list->toArray());
	}
}