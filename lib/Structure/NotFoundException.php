<?php


namespace OUTRAGElib\Structure;

use \Exception;
use \Psr\Container\NotFoundExceptionInterface;

class NotFoundException extends Exception implements NotFoundExceptionInterface
{
}