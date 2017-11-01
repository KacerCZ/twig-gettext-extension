<?php

namespace Kacer\TwigGettext\Extractor;

interface PoStringFactoryInterface {

    /**
     * @param string $msgid The singular extracted string.
     */
    public function construct(string $msgid): PoStringInterface;
}
