<?php
//lib/filter/CultureFilter.class.php                                                                                                                                                                                                                                           
class CultureFilter extends sfFilter
{
    public function execute(sfFilterChain $filterChain)
    {
        $context = $this->getContext();
        $request = $context->getRequest();
        
        $langues = Doctrine_Core::getTable('Langues')->getAll();
        $cultures = array();
        
        foreach($langues as $l)
        {
            $cultures[] = $l->getIso();
        }
        if (!(in_array($context->getUser()->getCulture(), $cultures)))
        {
            $lang = $request->getPreferredCulture($cultures);
            $context->getUser()->setCulture($lang);
        }
        if (file_exists(basename(sfConfig::get('sf_web_dir')) . 'js/dp-languages/jquery.ui.datepicker-'. $context->getUser()->getCulture() . '.js'))
          $context->getResponse()->addJavascript('dp-languages/jquery.ui.datepicker-'. $context->getUser()->getCulture() . '.js', 'last');
        $filterChain->execute();
    }
}