<?php

class xI18NMessageSource extends sfMessageSource
{
  static function factory($type, $source = '.', $filename = '')
  {
    if ($filename)
    {
      if (!is_file($filename))
      {
        throw new sfException(sprintf("File %s not found.", $filename));
      }

      include_once($filename);
    }

    $class = 'xI18NMessageSource_'.$type;
    if (!class_exists($class))
    {
      throw new sfException(sprintf('Unable to find type "%s".', $type));
    }

    return new $class($source);
  }
  
  function load($catalogue = 'messages')
  {
    parent::load($catalogue);
  }

  function read()
  {
    parent::read();
  }

  function save($catalogue = 'messages')
  {
    parent::save($catalogue);
  }

  function append($message, $catalogue = 'messages')
  {
    if (!in_array($message, $this->untranslated[$catalogue]))
    {
      $this->untranslated[$catalogue][] = $message;
    }
  }

  function delete($message, $catalogue = 'messages')
  {
    parent::delete($message, $catalogue);
  }

  function update($text, $target, $comments, $catalogue = 'messages')
  {
    parent::update($text, $target, $comments, $catalogue);
  }

  function catalogues()
  {
    parent::catalogues();
  }
  
  function setCulture($culture)
  {
    parent::setCulture($culture);
  }

  function getCulture()
  {
    parent::getCulture();
  }

  function getId()
  {
    parent::getId();
  }
}

?>