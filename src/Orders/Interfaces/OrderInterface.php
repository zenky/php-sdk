<?php

declare(strict_types=1);

namespace Zenky\Orders\Interfaces;

use Zenky\Addresses\Interfaces\AddressInterface;
use Zenky\Cities\Interfaces\CityInterface;
use Zenky\Common\Interfaces\EnumInterface;
use Zenky\Common\Interfaces\PriceInterface;
use Zenky\Customers\Interfaces\CustomerInterface;
use Zenky\Stocks\Interfaces\StockInterface;

interface OrderInterface
{
    public function getId(): string;

    public function getOrderStatusId(): string;

    public function getCurrentStatus(): OrderStatusChangeInterface;

    public function getNumber(): ?string;

    public function getToken(): ?string;

    public function getSource(): ?string;

    public function getApiClient(): ?string;

    public function getConfirmationStatus(): EnumInterface;

    public function getDeliveryMethod(): EnumInterface;

    public function getDeliveryDate(): ?\DateTimeImmutable;

    public function getLocalDeliveryDate(): ?\DateTimeImmutable;

    public function getTotalPrice(): PriceInterface;

    public function getNotes(): ?string;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;

    public function getSubmittedAt(): ?\DateTimeImmutable;

    public function getArchivedAt(): ?\DateTimeImmutable;

    public function getCity(): ?CityInterface;

    public function getStock(): ?StockInterface;

    public function getCustomer(): ?CustomerInterface;

    /** @return array|OrderProductVariantInterface[] */
    public function getVariants(): array;

    public function getDeliveryAddress(): ?AddressInterface;

    /** @return array|OrderStatusChangeInterface[] */
    public function getOrderStatuses(): array;

    /** @return array|OrderStatusProgressInterface[] */
    public function getStatusesProgress(): array;

    /** @return array|\Zenky\OrderPayments\Interfaces\OrderPaymentTransactionInterface[] */
    public function getPaymentTransactions(): array;
}
