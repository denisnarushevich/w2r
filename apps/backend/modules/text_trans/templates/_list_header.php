<script type="text/javascript">
$(document).ready(function() {
  $('span.unit_trans_set').find('input[type=text]').change(
    function(e) {
      doTranslate(this);
    }
  );
  $('span.unit_trans_set').find('input[type=text]').keydown(
    function(e) {
      if (e.keyCode == '13') {
        doTranslate(this);
        return false;
      }
    }
  );
});

function doTranslate(elem)
{
  target_string = $(elem).val();
  id_number = $(elem).siblings('input[type=hidden]').val();

  $.post( '<?php echo url_for('text_trans/ajaxTarget') ?>',
    {
      target: target_string,
      id: id_number
    }
  ).error(
    function() {
      $($($(elem).parents('.sf_admin_list_td_ajax_target').get(0)).parent().children('.sf_admin_list_td_translated').get(0)).html('<img alt="Error" title="Error" src="/sfDoctrinePlugin/images/delete.png">');
    }
  ).complete(
    function() {
      $($($(elem).parents('.sf_admin_list_td_ajax_target').get(0)).parent().children('.sf_admin_list_td_translated').get(0)).html('<img alt="Checked" title="Checked" src="/sfDoctrinePlugin/images/tick.png">');
    }
  );
}
</script>