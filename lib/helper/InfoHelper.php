<?php

function getInfo($info, $sf_user, $value)
{
  $data = $info->getDataForLang($value, $sf_user->getCulture());
  if ($data)
    return $data->getValue();
  return '';
}
?>
