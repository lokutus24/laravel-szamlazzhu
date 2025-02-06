<?php

use Carbon\Carbon;
use \Lokutus24\Szamlazzhu\SzamlaAgent;
use \Lokutus24\Szamlazzhu\Document\Invoice\Invoice;
use Lokutus24\Szamlazzhu\CookieHandler;
use Lokutus24\Szamlazzhu\Currency;
use Lokutus24\Szamlazzhu\PaymentMethod;
use Lokutus24\Szamlazzhu\Language;
use Lokutus24\Szamlazzhu\Header\InvoiceHeader;
use Lokutus24\Szamlazzhu\SzamlaAgentRequest;
use Lokutus24\Szamlazzhu\SzamlaAgentUtil;


it('builds InvoiceHeader xml data', function () {
    $invoiceHeader = new InvoiceHeader(Invoice::INVOICE_TYPE_E_INVOICE);
    $invoiceHeader->setIssueDate(Carbon::create('2023-06-08'));
    $invoiceHeader->setFulfillment(Carbon::create('2023-06-08'));
    $invoiceHeader->setPaymentDue(Carbon::create('2023-06-08')->addDays(SzamlaAgentUtil::DEFAULT_ADDED_DAYS));
    $invoiceHeader->setPaymentMethod(PaymentMethod::PAYMENT_METHOD_BANKCARD);
    $invoiceHeader->setCurrency(Currency::EUR);
    $invoiceHeader->setLanguage(Language::EN);
    $invoiceHeader->setPrefix('TEST');
    $invoiceHeader->setExchangeBank('MNB');
    $invoiceHeader->setPaid(true);

    $agent = SzamlaAgent::createWithAPIkey(config('szamlazzhu.api_key'), false,);
    $request = new SzamlaAgentRequest($agent, new CookieHandler(), 'generateInvoice', new Invoice());
    $xmlData = $invoiceHeader->buildXmlData($request);

    expect($xmlData)
        ->toBeArray()
        ->not()->toBeEmpty()
        ->toBe([
            "keltDatum" => "2023-06-08",
            "teljesitesDatum" => "2023-06-08",
            "fizetesiHataridoDatum" => "2023-06-16",
            "fizmod" => "bankkártya",
            "penznem" => "EUR",
            "szamlaNyelve" => "en",
            "arfolyamBank" => "MNB",
            "szamlaszamElotag" => "TEST",
            "fizetve" => true,
            "eusAfa" => false,
            "szamlaSablon" => "SzlaMost",
        ]);
});