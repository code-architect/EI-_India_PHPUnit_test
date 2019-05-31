<?php
/**
 * Created by PhpStorm.
 * User: EI
 * Date: 5/31/2019
 * Time: 12:03 PM
 */

namespace TDD\Test;
require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use TDD\Formatter;
use PHPUnit\Framework\TestCase;

class FormatterTest extends TestCase
{
    private $formatter;
    /**
     * Creating a new instance of the Receipt
     */
    public function setUp()
    {
        $this->formatter = new Formatter();
    }


    /**
     * Un-setting the instance to ensure php does't carry anything over
     * from one test run to the next
     */
    public function tearDown()
    {
        unset($this->formatter);
    }


    /**
     * @dataProvider provideCurrencyAmt
     * @param $input
     * @param $expected
     * @param $message
     */
    public function testCurrencyAmount($input, $expected, $message)
    {
        $this->assertSame($expected, $this->formatter->currencyAmt($input), $message);
    }

    public function provideCurrencyAmt()
    {
        return [
            [1, 1.00, '1 should be transformed into 1.00'],
            [1.1, 1.10, '1.1 should be transformed into 1.10'],
            [1.11, 1.11, '1.11 should be transformed into 1.11'],
            [1.111, 1.11, '1.111 should be transformed into 1.11']
        ];
    }
}
