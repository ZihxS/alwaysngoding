<?php defined('BASEPATH') OR exit('No direct script access allowed');

function kompres()
{
  $CI     =& get_instance();
  $buffer = $CI->output->get_output();

	if ($_ENV['KOMPRES'] == 'yes') {
		preg_match_all('#\<textarea.*\>.*\<\/textarea\>#Uis', $buffer, $foundTxt);
		preg_match_all('#\<pre.*\>.*\<\/pre\>#Uis', $buffer, $foundPre);

		$buffer  = str_replace($foundTxt[0], array_map(function($el){ return '<textarea>'.$el.'</textarea>'; }, array_keys($foundTxt[0])), $buffer);
		$buffer  = str_replace($foundPre[0], array_map(function($el){ return '<pre>'.$el.'</pre>'; }, array_keys($foundPre[0])), $buffer);
		$search  = ['/\n/','/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s'];
		$replace = ['','>','<','\\1'];
		$buffer  = preg_replace($search, $replace, $buffer);
		$buffer  = preg_replace('/<!--(.|\s)*?-->/', '', $buffer);
		$buffer  = str_replace(array_map(function($el){ return '<textarea>'.$el.'</textarea>'; }, array_keys($foundTxt[0])), $foundTxt[0], $buffer);
		$buffer  = str_replace(array_map(function($el){ return '<pre>'.$el.'</pre>'; }, array_keys($foundPre[0])), $foundPre[0], $buffer);
	}

	$CI->output->set_output($buffer);
	$CI->output->_display();
}
