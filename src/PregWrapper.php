<?php

class PregWrapper {
	public static function wrap($str) {
		return preg_replace_callback('/<a\s+([^>]*?)\s*href\s*=\s*(["\'])([^>"\']*)\\2\s*([^>]*?)(.*?)<\/a>/i', function ($matches) {
			return "<noindex>(here)</noindex>";
		}, $str);
	}
}
