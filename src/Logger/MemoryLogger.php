<?php

namespace Tian\Logger;

class MemoryLogger extends \Psr\Log\AbstractLogger {
	private $fp = NULL;
	/**
	 * Logs with an arbitrary level.
	 *
	 * @param mixed $level        	
	 * @param string $message        	
	 * @param array $context        	
	 *
	 * @return void
	 */
	public function log($level, $message, array $context = array()) {
		if (is_null ( $this->fp )) {
			$this->fp = fopen ( "php://memory", 'r+' );
		}
		fputs ( $this->fp, $level . ': ' . strtr ( $message, $context ) . "\n" );
	}
	/**
	 *
	 * @return string
	 */
	public function getLog() {
		if (is_null ( $this->fp )) {
			return '';
		}
		rewind ( $this->fp );
		$str = '';
		while ( ! feof ( $this->fp ) ) {
			$str .= fread ( $this->fp, 1024 );
		}
		return $str;
	}
	public function clear() {
		if (! is_null ( $this->fp )) {
			rewind ( $this->fp );
		}
	}
	public function close() {
		if (! is_null ( $this->fp )) {
			fclose ( $this->fp );
		}
	}
}
