<?php

namespace Lokutus24\Szamlazzhu\Item;

use Lokutus24\Szamlazzhu\HasXmlBuildInterface;
use Lokutus24\Szamlazzhu\Ledger\ReceiptItemLedger;
use Lokutus24\Szamlazzhu\SzamlaAgentException;

class ReceiptItem extends Item implements HasXmlBuildInterface
{
    protected ReceiptItemLedger $ledgerData;

    /**
     * @throws SzamlaAgentException
     */
    public function buildXmlData(): array
    {
        $this->validateFields();

        $data = [];
        $data['megnevezes'] = $this->name;

        if (!empty($this->id)) {
            $data['azonosito'] = $this->id;
        }

        $data['mennyiseg'] = number_format($this->quantity, 2);
        $data['mennyisegiEgyseg'] = $this->quantityUnit;
        $data['nettoEgysegar'] = $this->netUnitPrice;
        $data['afakulcs'] = $this->vat;
        $data['netto'] = number_format($this->netPrice, 2);
        $data['afa'] = number_format($this->vatAmount, 2);
        $data['brutto'] = number_format($this->grossAmount, 2);

        if (!empty($this->comment)) {
            $data['megjegyzes'] = $this->comment;
        }

        if (!empty($this->ledgerData)) {
            $data['fokonyv'] = $this->ledgerData->buildXmlData();
        }

        return $data;
    }

    public function setLedgerData(ReceiptItemLedger $ledgerData): self
    {
        $this->ledgerData = $ledgerData;

        return $this;
    }
}
