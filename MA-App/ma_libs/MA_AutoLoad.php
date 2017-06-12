<?php
namespace MAAlMOSTAQBAL\MA_LIBS;

/*
 * Registering Autoload Function
 */
class MA_Autoload
{
	
	public static function MA_Autoload($MA_Class_Name)
	{	

		$MA_Class_Name = str_replace('MAAlMOSTAQBAL', '', $MA_Class_Name);
		$MA_Class_Name = str_replace('MA_LIBS', 'ma_libs', $MA_Class_Name);
		$MA_Class_Name = str_replace('\\', '/', $MA_Class_Name);
		$MA_Class_Name = $MA_Class_Name . '.php';
		if (file_exists(MA_APP_PATH . $MA_Class_Name)) {
			require MA_APP_PATH . $MA_Class_Name;
		}
		
	}
}
spl_autoload_register(__NAMESPACE__ . '\MA_Autoload::MA_Autoload');