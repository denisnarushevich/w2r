<?php

class xI18N extends sfI18N
{
  public function __($string, $args = array(), $catalogue = 'messages')
  {
    return $this->getMessageFormat()->format($string, $args, $catalogue);
  }
  
  public function save()
  {
    if($this->messageSource) $this->messageSource->save();
  }
  
  public function createMessageSource($dir = null)
  {
    return xI18NMessageSource::factory($this->options['source'], self::isMessageSourceFileBased($this->options['source']) ? $dir : $this->options['database']);
  }
  
  public function getMessageFormat()
  {

    if (!isset($this->messageFormat))
    {
      $this->messageFormat = new xI18NMessageFormat($this->getMessageSource(), sfConfig::get('sf_charset'));

      if ($this->options['debug'])
      {
        $this->messageFormat->setUntranslatedPS(array($this->options['untranslated_prefix'], $this->options['untranslated_suffix']));
      }
    }

    return $this->messageFormat;
  }
}

?>