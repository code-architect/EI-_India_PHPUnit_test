<?php
namespace TDD\Test;
require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use PHPUnit\Framework\TestCase;     // this imports phpunit core class test case for our use
use TDD\Receipt;                    // import the class we want to test

class ReceiptTest extends TestCase
{
    public function testTotal()
    {
        $recepit = new Receipt();
        $this->assertEquals(10, $recepit->total([0,2,5,3]), 'When summing The total should equal 10');
    }
}