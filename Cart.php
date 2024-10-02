<?php

class Cart
{
    private $items = [];
    private $totalValue = 0;
    private $shipping_cost = 15;

    public function addItem($item)
    {
        if (isset($item['voucher_code'])){
            $item['product_id'] = $item['voucher_code'];
            $item['price'] = -$item['discount'];
            if ($item['is_percentage']){
                $item['price'] = -$item['discount'] * ($this->totalValue - $this->shipping_cost) / 100;
            }
            $item['qty'] = 1;
        }

        if (isset($item['product_id']) && ($item['qty'] > 0) && isset($item['price'])){
            if (!empty($this->items[$item['product_id']])){
                //produsul deja exista, actualizam cantitatea
                $this->items[$item['product_id']]['qty'] += $item['qty'];
            }else $this->items[$item['product_id']] = $item;


             $this->totalValue = 0;
            foreach ($this->items as $item){
                $this->totalValue += $item['price'] * $item['qty'];
            }

            if ($this->totalValue>200)      {
                $this->shipping_cost =0;
            }

            $this->totalValue +=$this->shipping_cost;
        }
        else  {
            echo 'Eroare la adaugarea produsului in cos!';
        }

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