<?php

namespace Lokutus24\Szamlazzhu\Document;

use Lokutus24\Szamlazzhu\Document\Invoice\Invoice;
use Lokutus24\Szamlazzhu\Header\DeliveryNoteHeader;

/**
 * HU: Szállítólevél
 */
class DeliveryNote extends Invoice
{
    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->setHeader(new DeliveryNoteHeader());
    }
}
