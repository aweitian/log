<?php
class MemTest extends PHPUnit_Framework_TestCase {
	public function testPre() {
		$log = new balabala();
		$this->assertEquals("debug: gg fu gg,lol\ndebug: g1g fu g1g,lal\n", $log->logger->getLog()) ;
	}
}

class balabala 
{
	use \Tian\LoggerTrait;
	public function __construct() {
		$this->setLogger(new \Tian\Logger\MemoryLogger()) ;
		$this->logger->debug('gg fu gg,{name}',['{name}' => 'lol']);
		$this->logger->debug('g1g fu g1g,{name}',['{name}' => 'lal']);
	}
}