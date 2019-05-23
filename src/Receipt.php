<?php
namespace TDD;

class Receipt
{
    /**
     * Sum up the values and return
     * @param array $items
     * @return float|int
     */
    public function total(array $items = [], $coupon)
    {
        $sum = array_sum($items);
        if(!is_null($coupon)){
            return $sum - ($sum * $coupon);
        }
        return $sum;
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