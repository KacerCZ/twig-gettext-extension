<?php

namespace Kacer\TwigGettext;

class Extension extends \Twig_Extension {

    private $useShortnames = true;

    public function __construct(bool $useShortnames = true) {
        $this->useShortnames = $useShortnames;
    }

    public function getName() {
        return 'gettext';
    }

    public function getFunctions() {
        $gettext = 'gettext';
        $pgettext = [$this, 'pgettext'];
        $ngettext = 'ngettext';
        $npgettext = [$this, 'npgettext'];
        $dgettext = 'dgettext';
        $dpgettext = [$this, 'dpgettext'];
        $dngettext = 'dngettext';
        $dnpgettext = [$this, 'dnpgettext'];
        $dcgettext = [$this, 'dcgettext'];
        $dcpgettext = [$this, 'dcpgettext'];
        $dcngettext = [$this, 'dcngettext'];
        $dcnpgettext = [$this, 'dcnpgettext'];

        $functions = [
            new \Twig_SimpleFunction('gettext', $gettext),
            new \Twig_SimpleFunction('pgettext', $pgettext),
            new \Twig_SimpleFunction('ngettext', $ngettext),
            new \Twig_SimpleFunction('npgettext', $npgettext),
            new \Twig_SimpleFunction('dgettext', $dgettext),
            new \Twig_SimpleFunction('dpgettext', $dpgettext),
            new \Twig_SimpleFunction('dngettext', $dngettext),
            new \Twig_SimpleFunction('dnpgettext', $dnpgettext),
            new \Twig_SimpleFunction('dcgettext', $dcgettext),
            new \Twig_SimpleFunction('dcpgettext', $dcpgettext),
            new \Twig_SimpleFunction('dcngettext', $dcngettext),
            new \Twig_SimpleFunction('dcnpgettext', $dcnpgettext),
        ];

        if ($this->useShortnames) {
            $functions[] = new \Twig_SimpleFunction('_', $gettext);
            $functions[] = new \Twig_SimpleFunction('_p', $pgettext);
            $functions[] = new \Twig_SimpleFunction('_n', $ngettext);
            $functions[] = new \Twig_SimpleFunction('_np', $npgettext);
            $functions[] = new \Twig_SimpleFunction('_d', $dgettext);
            $functions[] = new \Twig_SimpleFunction('_dp', $dpgettext);
            $functions[] = new \Twig_SimpleFunction('_dn', $dngettext);
            $functions[] = new \Twig_SimpleFunction('_dnp', $dnpgettext);
            $functions[] = new \Twig_SimpleFunction('_dc', $dcgettext);
            $functions[] = new \Twig_SimpleFunction('_dcp', $dcpgettext);
            $functions[] = new \Twig_SimpleFunction('_dcn', $dcngettext);
            $functions[] = new \Twig_SimpleFunction('_dcnp', $dcnpgettext);
        }

        return $functions;
    }

    public function getFilters() {
        $gettext = 'gettext';
        $pgettext = [$this, 'pgettextFilter'];
        $ngettext = 'ngettext';
        $npgettext = [$this, 'npgettextFilter'];
        $dgettext = [$this, 'dgettextFilter'];
        $dpgettext = [$this, 'dpgettextFilter'];
        $dngettext = [$this, 'dngettextFilter'];
        $dnpgettext = [$this, 'dnpgettextFilter'];
        $dcgettext = [$this, 'dcgettextFilter'];
        $dcpgettext = [$this, 'dcpgettextFilter'];
        $dcngettext = [$this, 'dcngettextFilter'];
        $dcnpgettext = [$this, 'dcnpgettextFilter'];

        $filters = array(
            new \Twig_SimpleFilter('gettext', $gettext),
            new \Twig_SimpleFilter('pgettext', $pgettext),
            new \Twig_SimpleFilter('ngettext', $ngettext),
            new \Twig_SimpleFilter('npgettext', $npgettext),
            new \Twig_SimpleFilter('dgettext', $dgettext),
            new \Twig_SimpleFilter('dpgettext', $dpgettext),
            new \Twig_SimpleFilter('dngettext', $dngettext),
            new \Twig_SimpleFilter('dnpgettext', $dnpgettext),
            new \Twig_SimpleFilter('dcgettext', $dcgettext),
            new \Twig_SimpleFilter('dcpgettext', $dcpgettext),
            new \Twig_SimpleFilter('dcngettext', $dcngettext),
            new \Twig_SimpleFilter('dcnpgettext', $dcnpgettext),
        );

        if ($this->useShortnames) {
            $filters[] = new \Twig_SimpleFilter('_', $gettext);
            $filters[] = new \Twig_SimpleFilter('_p', $pgettext);
            $filters[] = new \Twig_SimpleFilter('_n', $ngettext);
            $filters[] = new \Twig_SimpleFilter('_np', $npgettext);
            $filters[] = new \Twig_SimpleFilter('_d', $dgettext);
            $filters[] = new \Twig_SimpleFilter('_dp', $dpgettext);
            $filters[] = new \Twig_SimpleFilter('_dn', $dngettext);
            $filters[] = new \Twig_SimpleFilter('_dnp', $dnpgettext);
            $filters[] = new \Twig_SimpleFilter('_dc', $dcgettext);
            $filters[] = new \Twig_SimpleFilter('_dcp', $dcpgettext);
            $filters[] = new \Twig_SimpleFilter('_dcn', $dcngettext);
            $filters[] = new \Twig_SimpleFilter('_dcnp', $dcnpgettext);
        }

        return $filters;
    }

    public function pgettext($context, $message) {
        return gettext($context . "\04" . $message);
    }

    public function npgettext($context, $msgid1, $msgid2, $n) {
        return ngettext($context . "\04" . $msgid1, $context . "\04" . $msgid2, $n);
    }

    public function dpgettext($context, $domain, $message) {
        return dgettext($domain, $context . "\04" . $message);
    }

    public function dnpgettext($context, $domain, $msgid1, $msgid2, $n) {
        return dngettext($domain, $context . "\04" . $msgid1, $context . "\04" . $msgid2, $n);
    }

    public function dcgettext($domain, $message, $category) {
        return dcgettext($domain, $message, constant($category));
    }

    public function dcpgettext($context, $domain, $message, $category) {
        return dcgettext($domain, $context . "\04" . $message, constant($category));
    }

    public function dcngettext($domain, $msgid1, $msgid2, $n, $category) {
        return dcngettext($domain, $msgid1, $msgid2, $n, constant($category));
    }

    public function dcnpgettext($context, $domain, $msgid1, $msgid2, $n, $category) {
        return dcngettext($domain, $context . "\04" . $msgid1, $context . "\04" . $msgid2, $n, constant($category));
    }

    public function pgettextFilter($message, $context) {
        return $this->pgettext($context, $message);
    }

    public function npgettextFilter($msgid1, $msgid2, $n, $context) {
        return $this->npgettext($context, $msgid1, $msgid2, $n);
    }

    public function dgettextFilter($message, $domain) {
        return dgettext($domain, $message);
    }

    public function dpgettextFilter($message, $domain, $context) {
        return $this->dpgettext($context, $domain, $message);
    }

    public function dngettextFilter($msgid1, $msgid2, $n, $domain) {
        return dngettext($domain, $msgid1, $msgid2, $n);
    }

    public function dnpgettextFilter($msgid1, $msgid2, $n, $domain, $context) {
        return $this->dnpgettext($context, $domain, $msgid1, $msgid2, $n);
    }

    public function dcgettextFilter($message, $domain, $category) {
        return $this->dcgettext($domain, $message, $category);
    }

    public function dcpgettextFilter($message, $domain, $category, $context) {
        return $this->dcpgettext($context, $domain, $message, $category);
    }

    public function dcngettextFilter($msgid1, $msgid2, $n, $domain, $category) {
        return $this->dcngettext($domain, $msgid1, $msgid2, $n, $category);
    }

    public function dcnpgettextFilter($msgid1, $msgid2, $n, $domain, $category, $context) {
        return $this->dcngettext($context, $domain, $msgid1, $msgid2, $n, $category);
    }

}
