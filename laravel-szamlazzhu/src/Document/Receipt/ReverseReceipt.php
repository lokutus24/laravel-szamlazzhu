<?php

namespace Lokutus24\Szamlazzhu\Document\Receipt;

use Lokutus24\Szamlazzhu\Header\ReverseReceiptHeader;

/**
 * HU: Sztornó nyugta
 */
class ReverseReceipt extends Receipt
{
    public function __construct(string $receiptNumber = '')
    {
        $this->setHeader(new ReverseReceiptHeader($receiptNumber));
    }
}
