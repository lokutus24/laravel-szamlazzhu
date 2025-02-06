<?php

namespace Lokutus24\Szamlazzhu\CreditNote;

use Lokutus24\Szamlazzhu\FieldsValidationTrait;
use Lokutus24\Szamlazzhu\PaymentMethod;
use Lokutus24\Szamlazzhu\SzamlaAgentException;
use Lokutus24\Szamlazzhu\SzamlaAgentUtil;

class ReceiptCreditNote extends CreditNote
{
    use FieldsValidationTrait;

    public function __construct(PaymentMethod $paymentMethod = PaymentMethod::PAYMENT_METHOD_CASH, float $amount = 0.0, string $description = '')
    {
        parent::__construct($paymentMethod, $amount, $description);
    }

    /**
     * @throws SzamlaAgentException
     */
    public function buildXmlData(): array
    {
        $this->validateFields();

        $data = [];
        $data['fizetoeszkoz'] = $this->getPaymentMethod();

        if (!empty($this->amount)) {
            $data['osszeg'] = $this->amount;
        }
        if (!empty($this->description)) {
            $data['leiras'] = $this->description;
        }

        return $data;
    }
}
