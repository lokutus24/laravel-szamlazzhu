<?php

namespace Lokutus24\Szamlazzhu\Document\Invoice;

use Lokutus24\Szamlazzhu\Header\ReverseInvoiceHeader;
use Lokutus24\Szamlazzhu\SzamlaAgentException;

/**
 * HU: Sztornó számla
 */
class ReverseInvoice extends Invoice
{
    /**
     * @throws SzamlaAgentException
     */
    public function __construct(int $type = self::INVOICE_TYPE_E_INVOICE)
    {
        $this->setHeader(new ReverseInvoiceHeader($type));
    }
}
