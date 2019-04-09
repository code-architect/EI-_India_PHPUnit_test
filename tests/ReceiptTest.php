<?php
namespace TDD\Test;
require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use PHPUnit\Framework\TestCase;     // this imports phpunit core class test case for our use
use TDD\Receipt;                    // import the class we want to test

class ReceiptTest extends TestCase
{
    /**
     * Creating a new instance of the Receipt
     */
    public function setUp()
    {
        $this->receipt = new Receipt();
    }

    /**
     * Un-setting the instance to ensure php does't carry anything over
     * from one test run to the next
     */
    public function tearDown()
    {
        unset($this->receipt);
    }

    public function testTotal()
    {
        $input = [0,2,5,3];
        $output = $this->receipt->total($input);
        $this->assertEquals(10, $output, 'When summing The total should equal 10');
    }
}