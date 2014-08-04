<?php

class xI18NMessageSource_MySQL extends sfMessageSource_MySQL
{
  
  function __construct($source)
  {
    $this->source = (string) $source;
    
    
    $database = sfContext::getInstance()->getDatabaseManager()->getDatabase('stag');
    $dsn = $database->getParameter('dsn');
    $parts = $this->parsePdoDsn($dsn);
    
    $this->dsn['socket'] = $parts['host'];
    $this->dsn['hostspec'] = $parts['host'];
    $this->dsn['port'] = $parts['port'];
    $this->dsn['username'] = $database->getParameter('username');
    $this->dsn['password'] = $database->getParameter('password');
    $this->dsn['database'] = $parts['dbname'];
    $this->db = $this->connect();
    
    $charset = sfConfig::get('sf_charset');
    
    if($charset == "utf-8")
    {
      mysql_query("SET CHARACTER SET utf8", $this->db);
      mysql_query("SET NAMES utf8", $this->db);
    }
  }
  
  public function save($catalogue = Null)
  {
    if(!is_null($catalogue)) return $this->save($catalogue);
    
    $total_inserted = 0;
    $catalogues = $this->catalogues();
    
    foreach($catalogues as $catalogue)
    {
      $inserted = $this->saveCatalogue($catalogue[0]);
      $total_inserted += $inserted;
    }
    
    return $total_inserted;
  }
  
  public function saveCatalogue($catalogue = 'messages')
  {
    if(!isset($this->untranslated[$catalogue])) return false;
    
    $messages = $this->untranslated[$catalogue];

    if (count($messages) <= 0)
    {
      return false;
    }

    $details = $this->getCatalogueDetails($catalogue);
    if ($details)
    {
      list($cat_id, $variant, $count) = $details;
    }
    else
    {
      return false;
    }
    if ($cat_id <= 0)
    {
      return false;
    }
    $inserted = 0;

    $time = time();

    foreach ($messages as $message)
    {
      $count++;
      $inserted++;
      $message = mysql_real_escape_string($message, $this->db);
      $statement = "INSERT INTO trans_unit
        (cat_id,id,source,date_added) VALUES
        ({$cat_id}, {$count},'{$message}',$time)";
      mysql_query($statement, $this->db);
    }
    if ($inserted > 0)
    {
      $this->updateCatalogueTime($cat_id, $variant);
    }

    return $inserted > 0;
  }
  
  function append($message, $catalogue = 'messages')
  {
    
    if(!isset( $this->untranslated[$catalogue])) $this->untranslated[$catalogue] = array();
    
    if (!in_array($message, $this->untranslated[$catalogue]))
    {
      $this->untranslated[$catalogue][] = $message;
    }
  }
  
  public function parsePdoDsn($dsn)
  {
      $parts = array();

      $names = array('dsn', 'scheme', 'host', 'port', 'user', 'pass', 'path', 'query', 'fragment', 'unix_socket');

      foreach ($names as $name) {
          if ( ! isset($parts[$name])) {
              $parts[$name] = null;
          }
      }

      $e = explode(':', $dsn);
      $parts['scheme'] = $e[0];
      $parts['dsn'] = $dsn;

      $e = explode(';', $e[1]);
      foreach ($e as $string) {
          if ($string) {
              $e2 = explode('=', $string);

              if (isset($e2[0]) && isset($e2[1])) {
                  list($key, $value) = $e2;
                  $parts[$key] = $value;
              }
          }
      }

      return $parts;
  }
}

?>