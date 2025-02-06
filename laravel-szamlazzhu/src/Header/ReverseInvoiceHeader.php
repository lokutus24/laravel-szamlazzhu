<?php

namespace Lokutus24\Szamlazzhu\Header;

use Lokutus24\Szamlazzhu\Document\Document;
use Lokutus24\Szamlazzhu\Document\Invoice\Invoice;
use Lokutus24\Szamlazzhu\SzamlaAgentException;
use Lokutus24\Szamlazzhu\SzamlaAgentRequest;
use Lokutus24\Szamlazzhu\SzamlaAgentUtil;
use Lokutus24\Szamlazzhu\Header\Type;

/**
 * Sztornó számla fejléc
 */
class ReverseInvoiceHeader extends InvoiceHeader
{
    protected array $requiredFields = ['invoiceNumber'];

    /**
     * @throws SzamlaAgentException
     */
    public function __construct(int $type = Invoice::INVOICE_TYPE_P_INVOICE)
    {
        parent::__construct($type);
        $this->setType(Type::REVERSE_INVOICE);
    }

    /**
     * @throws SzamlaAgentException
     */
    public function buildXmlData(SzamlaAgentRequest $request): array
    {
        if (empty($request)) {
            throw new SzamlaAgentException(SzamlaAgentException::XML_DATA_NOT_AVAILABLE);
        }

        $this->validateFields();

        $data['szamlaszam'] = $this->getInvoiceNumber();

        if (!empty($this->issueDate)) {
            $data['keltDatum'] = $this->issueDate;
        }
        if (!empty($this->fulfillment)) {
            $data['teljesitesDatum'] = $this->fulfillment;
        }
        if (!empty($this->comment)) {
            $data['megjegyzes'] = $this->comment;
        }

        $data['tipus'] = Document::DOCUMENT_TYPE_REVERSE_INVOICE_CODE;

        if (!empty($this->invoiceTemplate)) {
            $data['szamlaSablon'] = $this->invoiceTemplate;
        }

        return $data;
    }
}
