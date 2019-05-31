<?php
namespace TDD;
use \BadMethodCallException;

class Receipt
{
    public function __construct($formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * Sum up the values and return
     * @param array $items
     * @return float|int
     */
    public function subTotal(array $items = [], $coupon)
    {
        if($coupon > 1.00){
            throw new BadMethodCallException('Coupon must be less then or equal to 1.00');
        }
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
        return $this->formatter->currencyAmt($amount * $taxPercentage);
    }

    public function postTaxTotal($items, $tax, $coupon)
    {
        $subtotal = $this->total($items, $coupon);
        return $subtotal + $this->tax($subtotal, $tax);
    }

}