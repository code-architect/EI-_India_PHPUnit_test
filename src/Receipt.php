<?php
namespace TDD;

class Receipt
{
    /**
     * Sum up the values and return
     * @param array $items
     * @return float|int
     */
    public function total(array $items = [])
    {
        return array_sum($items);
    }

    /**
     * Calculate the tax amount
     * @param $amount
     * @param $taxPercentage
     * @return mixed
     */
    public function tax($amount, $taxPercentage)
    {
        return ($amount * $taxPercentage);
    }
}