<?php

use App\Product;
use App\Order;


class OrderTest extends TestCase
{
    function test_an_order_consists_of_products()
    {
        $order = $this->create_order_with_products();

        //$this->assertEquals(2,count($order->products()));
        $this->assertCount(2,$order->products());
    }

    public function test_an_order_can_determine_the_total_cost_of_all_its_products()
    {
        $order = $this->create_order_with_products();

        $this->assertEquals(66,$order->total());

    }

    protected function create_order_with_products()
    {
        $order = new Order;

        $product = new Product('Fallout 4',59);

        $product2 = new Product('Pillowcase',7);


        $order->add($product);

        $order->add($product2);

        return $order;
    }
}