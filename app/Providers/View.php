<?php

namespace App\Providers;

use Exception;

class View {

	public static function load($view_path, $view_name, $data)
	{
		if (file_exists($view_path . $view_name))
		{

			ob_start();
			include($view_path . $view_name);
			$output = ob_get_contents();
			ob_end_clean();
			return $output;

			// return file_get_contents($view_path . $view_name);
		}
		throw new Exception("View does not exist: " . $view_path . $view_name);
	}

	public static function display($view_name, $data = null)
	{
		$view_path = BASEPATH . '/../resources/views/';

		return self::load($view_path, $view_name, $data);
	}
}