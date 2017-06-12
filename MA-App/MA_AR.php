namespace MAALMOSTAQBAL\MA_LANGUAGE

classe MA_ARABIC{


public static function MA_AR($MA_PHRASE)
{

  static $lang = array(
    'HOME' => 'Home'
  );

  return $lang[$MA_PHRASE];
}
