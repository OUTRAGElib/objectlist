<?php


namespace OUTRAGElib\Validate\Tests;

require __DIR__."/../vendor/autoload.php";

use \OUTRAGElib\Structure\ObjectList;
use \OUTRAGElib\Structure\ObjectListPopulationTrait;
use \OUTRAGElib\Structure\ObjectListRetrievalTrait;


class DummyObjectList extends ObjectList
{
	use ObjectListPopulationTrait;
	use ObjectListRetrievalTrait;
}