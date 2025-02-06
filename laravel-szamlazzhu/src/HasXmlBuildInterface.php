<?php

namespace Lokutus24\Szamlazzhu;

interface HasXmlBuildInterface
{
    /**
     * @throws SzamlaAgentException
     */
    public function buildXmlData(): array;
}