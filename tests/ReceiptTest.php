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

    /**
     * Checking the basic functionality of the method
     */
    public function testTotal()
    {
        $input = [0,2,5,3];
        $coupon = null;
        $output = $this->receipt->total($input, $coupon);
        $this->assertEquals(10, $output, 'When summing The total should equal 10');
    }


    /**
     * Checking the basic functionality of the method
     */
    public function testTotalWithCoupon()
    {
        $input = [0,2,5,8];
        $coupon = 0.20;
        $output = $this->receipt->total($input, $coupon);
        $this->assertEquals(12, $output, 'When summing The total should equal 12');
    }


    public function testTax()
    {
        $input = 10.00;
        $taxInput = 0.10;
        $output = $this->receipt->tax($input, $taxInput);
        $this->assertEquals(1.00, $output, 'The tax calculation equal 1.0');
    }
}