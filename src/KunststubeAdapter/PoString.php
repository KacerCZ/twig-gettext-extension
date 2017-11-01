<?php

namespace Kacer\TwigGettext\KunststubeAdapter;

use Kacer\TwigGettext\Extractor\PoStringInterface;

/**
 * An adapter to use the Kunststube\POTools\POString object as
 * POString object for Twig_Extensions_Extension_Gettext_Extractor.
 * See https://github.com/deceze/Kunststube-POTools.
 */
class PoString extends \Kunststube\POTools\POString implements PoStringInterface {

    public function __construct($msgid) {
        parent::__construct($msgid);
    }

}
