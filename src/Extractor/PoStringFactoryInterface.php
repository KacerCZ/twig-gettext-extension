<?php

namespace Kacer\TwigGettext\Extractor;

interface PoStringFactoryInterface {

    /**
     * @param string $msgid The singular extracted string.
     * @return Twig_Extensions_Extension_Gettext_POString_Interface
     */
    public function construct($msgid);
}
