<?php

namespace Lokutus24\Szamlazzhu\Document\Invoice;

use Lokutus24\Szamlazzhu\Header\CorrectiveInvoiceHeader;
use Lokutus24\Szamlazzhu\SzamlaAgentException;

/**
 * HU: Helyesbítő számla
 */
class CorrectiveInvoice extends Invoice
{
    /**
     * @throws SzamlaAgentException
     */
    public function __construct(int $type = self::INVOICE_TYPE_E_INVOICE)
    {
        $this->setHeader(new CorrectiveInvoiceHeader($type));
    }
}
