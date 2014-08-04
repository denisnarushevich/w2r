<?php

class xI18NMessageFormat extends sfMessageFormat
{
  public function format($string, $args = array(), $catalogue = null, $charset = null)
  {
    if (empty($charset))
    {
      $charset = $this->getCharset();
    }

    $s = $this->formatString(sfToolkit::I18N_toUTF8($string, $charset), $args, $catalogue);
    return sfToolkit::I18N_toEncoding($s, $charset);
  }
  
  protected function formatString($string, $args = array(), $catalogue = null)
  {
    if (empty($args))
    {
      $args = array();
    }

    if (empty($catalogue))
    {
      $catalogue = empty($this->Catalogue) ? 'messages' : $this->Catalogue;
    }

    $this->loadCatalogue($catalogue);
    
    foreach ($this->messages[$catalogue] as $variant)
    {
      // we found it, so return the target translation
      
      if (isset($variant[$string]))
      {
        $target = $variant[$string];

        // check if it contains only strings.
        if (is_array($target))
        {
          $target = array_shift($target);
        }

        // found, but untranslated
        if (empty($target))
        {
          return $this->postscript[0].$this->replaceArgs($string, $args).$this->postscript[1];
        }
        return $this->replaceArgs($target, $args);
      }
    }

    // well we did not find the translation string.
    //echo '<font color="#FF0000">String: '.$catalogue.'</font>';
    //if($string == 'Save') { echo '<font color="#FF0000">String: '.$catalogue.'</font>';}
    $this->source->append($string, $catalogue);

    return $this->postscript[0].$this->replaceArgs($string, $args).$this->postscript[1];
  }
}

?>