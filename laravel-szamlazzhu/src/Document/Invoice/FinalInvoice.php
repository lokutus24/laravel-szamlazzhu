<?php

namespace Lokutus24\Szamlazzhu\Document\Invoice;

use Lokutus24\Szamlazzhu\Header\FinalInvoiceHeader;
use Lokutus24\Szamlazzhu\SzamlaAgentException;

/**
 * HU: Végszámla
 */
class FinalInvoice extends Invoice
{
    /**
     * @throws SzamlaAgentException
     */
    public function __construct(int $type = self::INVOICE_TYPE_E_INVOICE)
    {
        $this->setHeader(new FinalInvoiceHeader($type));
    }
}
