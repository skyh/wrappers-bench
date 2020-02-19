<?php

class DomDocumentWrapper {
	public static function wrap($str) {
        libxml_use_internal_errors (TRUE);
	    $doc = new DOMDocument('1.0', 'UTF-8');
	    $doc->loadHTML($str, LIBXML_NOWARNING | LIBXML_HTML_NODEFDTD | LIBXML_HTML_NOIMPLIED);
	    $xpath = new DOMXPath($doc);
	    $links = $xpath->query("//a");
	    foreach ($links as $link) {
	        DomDocumentWrapper::wrapLink($link);
        }
	    return $doc->saveHTML();
	}

    /**
     * @param $link DOMElement
     */
	private static function wrapLink($link) {
	    $noindex = $link->ownerDocument->createElement("noindex");
	    $link->parentNode->replaceChild($noindex, $link);
	    $noindex->appendChild($link);
    }
}
