<?php

namespace Lokutus24\Szamlazzhu\Header;

use Lokutus24\Szamlazzhu\SzamlaAgentException;
use Lokutus24\Szamlazzhu\SzamlaAgentUtil;
use Lokutus24\Szamlazzhu\Header\Type;

class ReverseReceiptHeader extends ReceiptHeader
{
    protected array $requiredFields = ['receiptNumber'];

    public function __construct(string $receiptNumber = '')
    {
        parent::__construct($receiptNumber);
        $this->setType(Type::REVERSE_RECEIPT);
    }
}
