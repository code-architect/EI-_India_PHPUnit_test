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
     * @dataProvider provideTotal
     */
    public function testTotal($items, $expected)
    {
        $coupon = null;
        $output = $this->receipt->total($items, $coupon);
        $this->assertEquals($expected, $output, "When summing The total should equal $expected");
    }

    // data provider for testTotal
    public function provideTotal()
    {
        return [
            [[1, 2, 5, 8], 16],
            [[-1, 2, 5, 8], 14],
            [[1, 2, 8], 11],
        ];
    }


    /**
     * Checking the basic functionality of the method with coupon
     */
    public function testTotalWithCoupon()
    {
        $input = [0,2,5,8];
        $coupon = 0.20;
        $output = $this->receipt->total($input, $coupon);
        $this->assertEquals(12, $output, 'When summing The total should equal 12');
    }


    /**
     * Testing exception
     */
    public function testTotalException()
    {
        $input = [0,2,5,8];
        $coupon = 1.20;
        $this->expectException('BadMethodCallException');
        $this->receipt->total($input, $coupon);
    }


    /**
     * testing using stub
     */
    public function testPostTaxTotal()
    {
        $items = [1, 2, 5, 8];
        $tax = 0.20;
        $coupon = null;

        $Receipt = $this->getMockBuilder('TDD\Receipt') //only builder phpunit provides is a mock, but we can ignore some specific features of a mock test class and instead use it a stub
             ->setMethods(['tax', 'total'])                      // it takes an array of methods for the test double to respond to
             ->getMock();                                    // return the instance of the mock

        $Receipt->expects($this->once())            // this means we only call our "total" method once
            ->method('total')               // passing as a string the name of the method, that we want to define what epically our stub will perform
            ->with($items, $coupon)
            ->will($this->returnValue(10.00));     // this method "will" tells what exactly will that stub method do
        $Receipt->expects($this->once())
            ->with(10.00, $tax)
            ->method('tax')
            ->will($this->returnValue(1.00));

        // Now we will perform the test
        $result = $Receipt->postTaxTotal([1, 2, 5, 8], 0.20, null);
        $this->assertEquals(11.00, $result);
    }


    public function testTax()
    {
        $input = 10.00;
        $taxInput = 0.10;
        $output = $this->receipt->tax($input, $taxInput);
        $this->assertEquals(1.00, $output, 'The tax calculation equal 1.0');
    }
}