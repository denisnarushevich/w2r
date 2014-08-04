<?php
// auto-generated by sfFactoryConfigHandler
// date: 2011/12/08 16:05:39

  $class = sfConfig::get('sf_factory_logger', 'sfNoLogger');
  $this->factories['logger'] = new $class($this->dispatcher, array_merge(array('auto_shutdown' => false), sfConfig::get('sf_factory_logger_parameters', array (
  'level' => 'err',
  'loggers' => NULL,
))));
  

  if (sfConfig::get('sf_i18n'))
  {
    $class = sfConfig::get('sf_factory_i18n', 'xI18N');
    $cache = new sfFileCache(array (
  'automatic_cleaning_factor' => 0,
  'cache_dir' => 'C:\\dev\\sfprojects\\unversioned\\w2r\\cache\\frontend\\prod\\i18n',
  'lifetime' => 31556926,
  'prefix' => 'C:\\dev\\sfprojects\\unversioned\\w2r\\apps\\frontend/i18n',
));
    $this->factories['i18n'] = new $class($this->configuration, $cache, array (
  'source' => 'MySQL',
  'debug' => false,
  'untranslated_prefix' => '[T]',
  'untranslated_suffix' => '[/T]',
));
    sfWidgetFormSchemaFormatter::setTranslationCallable(array($this->factories['i18n'], '__'));
  }

  $class = sfConfig::get('sf_factory_controller', 'sfFrontWebController');
   $this->factories['controller'] = new $class($this);
  $class = sfConfig::get('sf_factory_request', 'sfWebRequest');
   $this->factories['request'] = new $class($this->dispatcher, array(), array(), sfConfig::get('sf_factory_request_parameters', array (
  'logging' => '',
  'path_info_array' => 'SERVER',
  'path_info_key' => 'PATH_INFO',
  'relative_url_root' => NULL,
  'formats' => 
  array (
    'txt' => 'text/plain',
    'js' => 
    array (
      0 => 'application/javascript',
      1 => 'application/x-javascript',
      2 => 'text/javascript',
    ),
    'css' => 'text/css',
    'json' => 
    array (
      0 => 'application/json',
      1 => 'application/x-json',
    ),
    'xml' => 
    array (
      0 => 'text/xml',
      1 => 'application/xml',
      2 => 'application/x-xml',
    ),
    'rdf' => 'application/rdf+xml',
    'atom' => 'application/atom+xml',
  ),
  'no_script_name' => true,
)), sfConfig::get('sf_factory_request_attributes', array()));
  $class = sfConfig::get('sf_factory_response', 'sfWebResponse');
  $this->factories['response'] = new $class($this->dispatcher, sfConfig::get('sf_factory_response_parameters', array_merge(array('http_protocol' => isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : null), array (
  'logging' => '',
  'charset' => 'utf-8',
  'send_http_headers' => true,
))));
  if ($this->factories['request'] instanceof sfWebRequest 
      && $this->factories['response'] instanceof sfWebResponse 
      && 'HEAD' == $this->factories['request']->getMethod())
  {  
    $this->factories['response']->setHeaderOnly(true);
  }

  $class = sfConfig::get('sf_factory_routing', 'sfPatternRouting');
      $cache = null;

$this->factories['routing'] = new $class($this->dispatcher, $cache, array_merge(array('auto_shutdown' => false, 'context' => $this->factories['request']->getRequestContext()), sfConfig::get('sf_factory_routing_parameters', array (
  'load_configuration' => true,
  'suffix' => '',
  'default_module' => 'default',
  'default_action' => 'index',
  'debug' => '',
  'logging' => '',
  'generate_shortest_url' => false,
  'extra_parameters_as_query_string' => true,
  'cache' => NULL,
))));
if ($parameters = $this->factories['routing']->parse($this->factories['request']->getPathInfo()))
{
  $this->factories['request']->addRequestParameters($parameters);
}

  $class = sfConfig::get('sf_factory_storage', 'sfSessionStorage');
  $this->factories['storage'] = new $class(array_merge(array(
'auto_shutdown' => false, 'session_id' => $this->getRequest()->getParameter('stagsite'),
), sfConfig::get('sf_factory_storage_parameters', array (
  'session_name' => 'stagsite',
  'session_path' => 'C:\\dev\\sfprojects\\unversioned\\w2r\\cache/sessions',
))));
  $class = sfConfig::get('sf_factory_user', 'myUser');
  $this->factories['user'] = new $class($this->dispatcher, $this->factories['storage'], array_merge(array('auto_shutdown' => false, 'culture' => $this->factories['request']->getParameter('sf_culture')), sfConfig::get('sf_factory_user_parameters', array (
  'timeout' => 1800,
  'logging' => '',
  'use_flash' => true,
  'default_culture' => 'en',
))));

  if (sfConfig::get('sf_cache'))
  {
    $class = sfConfig::get('sf_factory_view_cache', 'sfFileCache');
    $cache = new $class(sfConfig::get('sf_factory_view_cache_parameters', array (
  'automatic_cleaning_factor' => 0,
  'cache_dir' => 'C:\\dev\\sfprojects\\unversioned\\w2r\\cache\\frontend\\prod\\template',
  'lifetime' => 86400,
  'prefix' => 'C:\\dev\\sfprojects\\unversioned\\w2r\\apps\\frontend/template',
)));
    $this->factories['viewCacheManager'] = new sfViewCacheManager($this, $cache, array (
  'cache_key_use_vary_headers' => true,
  'cache_key_use_host_name' => true,
));
  }
  else
  {
    $this->factories['viewCacheManager'] = null;
  }

require_once sfConfig::get('sf_symfony_lib_dir').'/vendor/swiftmailer/classes/Swift.php';
Swift::registerAutoload();
sfMailer::initialize();
$this->setMailerConfiguration(array_merge(array('class' => sfConfig::get('sf_factory_mailer', 'sfMailer')), sfConfig::get('sf_factory_mailer_parameters', array (
  'logging' => '',
  'charset' => 'utf-8',
  'delivery_strategy' => 'realtime',
  'transport' => 
  array (
    'class' => 'Swift_MailTransport',
    'param' => 
    array (
      'host' => 'localhost',
      'port' => 25,
      'encryption' => NULL,
      'username' => NULL,
      'password' => NULL,
    ),
  ),
))));

