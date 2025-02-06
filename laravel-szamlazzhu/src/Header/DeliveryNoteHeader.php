<?php

namespace Lokutus24\Szamlazzhu\Header;

use Lokutus24\Szamlazzhu\Header\Type;
use Lokutus24\Szamlazzhu\SzamlaAgentException;

class DeliveryNoteHeader extends InvoiceHeader
{
    /**
     * @throws SzamlaAgentException
     */
    public function __construct()
    {
        parent::__construct();
        $this->setType(Type::DELIVERY_NOTE);
        $this->setPaid(false);
    }
}
