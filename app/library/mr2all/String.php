<?php

class String {

	/**
	 * generate clear URL 
	 * @param  string $str
	 * @return string
	 */
	public static function slug($str)
	{
		// Make sure string is in UTF-8 and strip invalid UTF-8 characters
		$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

		// Replace non-alphanumeric characters with our delimiter
		$str = preg_replace('/[^\p{L}\p{Nd}]+/u','-', $str);

		// Remove duplicate delimiters
		$str = preg_replace('/(' . preg_quote('-', '/') . '){2,}/', '$1', $str);

		// Remove delimiter from ends
		$str = trim($str,'-');

		return $str;
	}

}