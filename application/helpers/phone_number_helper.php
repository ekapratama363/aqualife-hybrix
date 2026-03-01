<?php

function format_phone_number($phoneNumber)
{
	/**
	 * Regexs parameter
	 * @var array
	 */
	$format = [
		'/[\D]+/', // characters, non digit
		'/[\s]+/', // whitespace
		'/^8/', // replace leading eight
		'/^08/', // replace leading zero
		
	];
	/**
	 * String replacements
	 * @var array
	 */
	$replace = [
		'',
		'',
		'628',
		'628'
	];
	/**
	 * String replacement's result
	 * @var string
	 */
	return preg_replace($format, $replace, $phoneNumber);
}