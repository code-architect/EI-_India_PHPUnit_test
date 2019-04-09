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
}