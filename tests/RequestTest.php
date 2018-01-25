<?php


class LogTest extends PHPUnit_Framework_TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLog()
    {
        $dir = __DIR__.'/logs';
        if (!is_dir($dir))
        {
            mkdir(__DIR__.'/logs');
        }
        $test = new Aw\Log($dir);
        $test->info('info msg');

        $test->setLogName('errors_{}.log');
        $test->error('fatal error has occured.');
    }

}




