<?php
class xI18NFilter extends sfFilter
{
  public function execute($filterChain)
  {
    $filterChain->execute();
    $i18n = $this->getContext()->getI18N();
    if ($i18n) $i18n->save();
  }
}
?>