<?php

namespace Tian\Logger;

class MemoryLogger extends \Psr\Log\AbstractLogger {
	private static $fp = NULL;
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
		if (is_null ( self::$fp )) {
			self::$fp = fopen ( "php://memory", 'r+' );
		}
		fputs ( self::$fp, $level . ': ' . strtr ( $message, $context ) . "\n" );
	}
	/**
	 *
	 * @return string
	 */
	public function getLog() {
		if (is_null ( self::$fp )) {
			return '';
		}
		rewind ( self::$fp );
		$str = '';
		while ( ! feof ( self::$fp ) ) {
			$str .= fread ( self::$fp, 1024 );
		}
		fclose ( self::$fp );
		return $str;
	}
}
