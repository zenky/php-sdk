<?php

declare(strict_types=1);

namespace Zenky\Contacts\Traits;

use Zenky\Contacts\Contact;
use Zenky\Contacts\ContactType;
use Zenky\Contacts\PhoneContact;

trait IncludesContacts
{
    public function getContacts(): array
    {
        return $this->getAttributeCollection('contacts', function (array $data) {
            switch ($data['type']['id']) {
                case ContactType::PHONE:
                    return new PhoneContact($data);
                default:
                    return new Contact($data);
            }
        });
    }
}
