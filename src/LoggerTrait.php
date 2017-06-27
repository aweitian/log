<?php

namespace Tian;

trait LoggerTrait {
	/**
	 *
	 * @var \Psr\Log\AbstractLogger
	 */
	public $logger = null;
	
	/**
	 *
	 * @param \Psr\Log\AbstractLogger $logger        	
	 */
	public function setLogger(\Psr\Log\AbstractLogger $logger) {
		$this->logger = $logger;
		return $this;
	}
}