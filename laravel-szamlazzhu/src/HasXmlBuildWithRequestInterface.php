<?php

namespace Lokutus24\Szamlazzhu;

use Lokutus24\Szamlazzhu\SzamlaAgentRequest;

interface HasXmlBuildWithRequestInterface
{
    /**
     * @throws SzamlaAgentException
     */
    public function buildXmlData(SzamlaAgentRequest $request): array;
}