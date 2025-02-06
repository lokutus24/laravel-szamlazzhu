<?php

namespace Lokutus24\Szamlazzhu\Header;

use Lokutus24\Szamlazzhu\Document\Invoice\Invoice;
use Lokutus24\Szamlazzhu\Header\Type;
use Lokutus24\Szamlazzhu\SzamlaAgentException;

class FinalInvoiceHeader extends InvoiceHeader
{
    /**
     * @throws SzamlaAgentException
     */
    public function __construct(int $type = Invoice::INVOICE_TYPE_P_INVOICE)
    {
        parent::__construct($type);
        $this->setType(Type::FINAL_INVOICE);
    }
}
