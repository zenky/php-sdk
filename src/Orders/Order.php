<?php

declare(strict_types=1);

namespace Zenky\Orders;

use Zenky\Addresses\Address;
use Zenky\Addresses\Interfaces\AddressInterface;
use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Cities\City;
use Zenky\Cities\Interfaces\CityInterface;
use Zenky\Common\Enum;
use Zenky\Common\Interfaces\EnumInterface;
use Zenky\Common\Interfaces\PriceInterface;
use Zenky\Common\Price;
use Zenky\Customers\Customer;
use Zenky\Customers\Interfaces\CustomerInterface;
use Zenky\Orders\Interfaces\OrderInterface;
use Zenky\Orders\Interfaces\OrderStatusChangeInterface;
use Zenky\OrderPayments\OrderPaymentTransaction;
use Zenky\Stocks\Interfaces\StockInterface;
use Zenky\Stocks\Stock;

class Order extends AbstractApiEntity implements OrderInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getOrderStatusId(): string
    {
        return $this->data['order_status_id'];
    }

    public function getCurrentStatus(): OrderStatusChangeInterface
    {
        return $this->getAttributeEntity('current_status', fn (array $data) => new OrderStatusChange($data));
    }

    public function getNumber(): ?string
    {
        return $this->data['number'];
    }

    public function getToken(): ?string
    {
        return $this->data['token'];
    }

    public function getSource(): ?string
    {
        return $this->data['source'];
    }

    public function getApiClient(): ?string
    {
        return $this->data['api_client'];
    }

    public function getConfirmationStatus(): EnumInterface
    {
        return $this->getCachedEntity('confirmation_status', fn () => Enum::make($this->data['confirmation_status']));
    }

    public function getDeliveryMethod(): EnumInterface
    {
        return $this->getCachedEntity('delivery_method', fn () => Enum::make($this->data['delivery_method']));
    }

    public function getDeliveryDate(): ?\DateTimeImmutable
    {
        return $this->getDateTimeInstance('deliver_at');
    }

    public function getLocalDeliveryDate(): ?\DateTimeImmutable
    {
        return $this->getDateTimeInstance('deliver_at_local', 'datetime');
    }

    public function getTotalPrice(): PriceInterface
    {
        return $this->getCachedEntity('total_price', fn () => new Price($this->data['total_price']));
    }

    public function getNotes(): ?string
    {
        return $this->data['notes'];
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }

    public function getSubmittedAt(): ?\DateTimeImmutable
    {
        return $this->getDateTimeInstance('submitted_at');
    }

    public function getArchivedAt(): ?\DateTimeImmutable
    {
        return $this->getDateTimeInstance('archived_at');
    }

    public function getCity(): ?CityInterface
    {
        return $this->getAttributeEntity('city', fn (array $data) => new City($data));
    }

    public function getStock(): ?StockInterface
    {
        return $this->getAttributeEntity('stock', fn (array $data) => new Stock($data));
    }

    public function getCustomer(): ?CustomerInterface
    {
        return $this->getAttributeEntity('customer', fn (array $data) => new Customer($data));
    }

    public function getVariants(): array
    {
        return $this->getAttributeCollection('variants', fn (array $data) => new OrderProductVariant($data));
    }

    public function getDeliveryAddress(): ?AddressInterface
    {
        return $this->getAttributeEntity('delivery_address', fn (array $data) => new Address($data));
    }

    public function getOrderStatuses(): array
    {
        return $this->getAttributeCollection('statuses', fn (array $data) => new OrderStatusChange($data));
    }

    public function getStatusesProgress(): array
    {
        return $this->getAttributeCollection('statuses_progress', fn (array $data) => new OrderStatusProgress($data));
    }

    public function getPaymentTransactions(): array
    {
        return $this->getAttributeCollection('payments', fn (array $data) => new OrderPaymentTransaction($data));
    }
}
