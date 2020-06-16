<?php

declare(strict_types=1);

namespace Zenky\Feedback;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\Interfaces\PhoneInterface;
use Zenky\Common\Phone;
use Zenky\Feedback\Interfaces\FeedbackInterface;

class Feedback extends AbstractApiEntity implements FeedbackInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
    }

    public function getEmail(): ?string
    {
        return $this->data['email'];
    }

    public function getPhone(): ?PhoneInterface
    {
        return $this->getAttributeEntity('phone', fn (array $data) => new Phone($data));
    }

    public function getComment(): ?string
    {
        return $this->data['comment'];
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }
}
