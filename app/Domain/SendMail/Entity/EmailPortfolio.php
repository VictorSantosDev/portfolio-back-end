<?php

namespace App\Domain\SendMail\Entity;

class EmailPortfolio
{
    public function __construct(
        private string $fullName,
        private string $addressEmail,
        private string $phoneContact,
        private string $subjectEmail,
        private string $message
    ) {
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }
    
    public function getAddressEmail(): string
    {
        return $this->addressEmail;
    }

    public function getPhoneContact(): string
    {
        return $this->phoneContact;
    }

    public function getSubjectEmail(): string
    {
        return $this->subjectEmail;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
