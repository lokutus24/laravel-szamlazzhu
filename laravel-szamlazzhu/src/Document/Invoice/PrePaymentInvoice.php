<?php

namespace Lokutus24\Szamlazzhu\Document\Invoice;

use Lokutus24\Szamlazzhu\Header\PrePaymentInvoiceHeader;
use Lokutus24\Szamlazzhu\SzamlaAgentException;

/**
 * HU: Előlegszámla
 */
class PrePaymentInvoice extends Invoice
{
    /**
     * @throws SzamlaAgentException
     */
    public function __construct(int $type = self::INVOICE_TYPE_E_INVOICE)
    {
        $this->setHeader(new PrePaymentInvoiceHeader($type));
    }
}
