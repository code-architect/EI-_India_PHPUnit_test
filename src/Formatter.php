<?php
namespace TDD;


class Formatter
{
    /**
     * @param $input
     * @return float
     */
    public function currencyAmt($input)
    {
        return round($input, 2);
    }
}
