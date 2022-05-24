<?php

class Cart
{
    private $items = [];
    private $totalValue = 0;
    private $shipping_cost = 15;

    public function addItem($item)
    {
        if (!empty($this->items[$item['product_id']])){
            //produsul deja exista, actualizam cantitatea
            $this->items[$item['product_id']]['qty'] += $item['qty'];
        }else $this->items[$item['product_id']] = $item;


         $this->totalValue = 0;
        foreach ($this->items as $item){
            $this->totalValue += $item['price'] * $item['qty'];
        }

        if ($this->totalValue>200)      {
            $this->shipping_cost = 0;
        }

        $this->totalValue +=$this->shipping_cost;

    }

    public function get_total_value()
    {
        return $this->totalValue;
    }

    public function getShippingCost()
    {
        $this->shipping_cost = 15;

        if ($this->totalValue > 200)
        {
            $this->shipping_cost = 0;
        }

        return $this->shipping_cost;
    }
}