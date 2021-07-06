<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\Orders;

use Zenky\Orders\Order;
use Zenky\Tests\TestCase;

class OrderDeliveryDateTest extends TestCase
{
    public function testItShouldCreateCorrectLocalDeliveryDate()
    {
        $data = array_merge($this->createEntity('orders/order.json'), [
            'deliver_at_local' => [
                'timezone' => 'Asia/Irkutsk',
                'datetime_utc' => '2021-07-07 12:00:00',
                'datetime' => '2021-07-07 20:00:00',
                'datetime_at' => '07.07.2021 в 20:00',
                'diff' => '',
                'timestamp' => 1625659200,
            ],
        ]);

        $order = new Order($data);
        $this->assertNotNull($order->getLocalDeliveryDate());
        $this->assertSame('2021-07-07 20:00:00', $order->getLocalDeliveryDate()->format('Y-m-d H:i:s'));
    }
}
