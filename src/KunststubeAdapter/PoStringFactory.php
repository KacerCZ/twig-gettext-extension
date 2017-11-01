<?php

namespace Kacer\TwigGettext\KunststubeAdapter;

use Kacer\TwigGettext\Extractor\PoStringFactoryInterface;
use Kacer\TwigGettext\Extractor\PoStringInterface;

/**
 * A factory for Twig_Extensions_Extension_Gettext_POString_Kunststube_Adapter objects.
 */
class PoStringFactory implements PoStringFactoryInterface {

    public function construct(string $msgid): PoStringInterface {
        return new PoString($msgid);
    }

}
