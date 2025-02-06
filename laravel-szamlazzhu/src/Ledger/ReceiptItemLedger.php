<?php

namespace Lokutus24\Szamlazzhu\Ledger;

use Lokutus24\Szamlazzhu\HasXmlBuildInterface;
use Lokutus24\Szamlazzhu\SzamlaAgentException;
use Lokutus24\Szamlazzhu\SzamlaAgentUtil;

class ReceiptItemLedger extends ItemLedger implements HasXmlBuildInterface
{
    /**
     * @throws SzamlaAgentException
     */
    public function buildXmlData(): array
    {
        $data = [];
        if (!empty($this->revenueLedgerNumber)) {
            $data['arbevetel'] = $this->revenueLedgerNumber;
        }
        if (!empty($this->vatLedgerNumber)) {
            $data['afa'] = $this->vatLedgerNumber;
        }

        return $data;
    }
}
