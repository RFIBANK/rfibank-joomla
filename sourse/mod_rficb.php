<?php
/**
@version 1.0 $
@package ЗАО "РФИ БАНК"
@copyright (C) 2014
@license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$rficb_skey = $params->get('rficb_skey', '');
$rficb_key = $params->get('rficb_key', '');
$rficb_order_id = $params->get('rficb_order_id', 0);
$rficb_cost = $params->get('rficb_cost', '');
$rficb_name = $params->get('rficb_name', 'Товар');
$rficb_comment = $params->get('rficb_comment', 'Комментарий');

$user =& JFactory::getUser();
$email = $user->get('email');

$rficb_email = !empty($email) ? $email : '';

JHTML::_('behavior.formvalidation');

?>

<table width="99%" align="center" cellpadding="0" cellspacing="0" border="0">
<tr>
  <td width="100%" align="center">
	<form method="POST" id="form-rficb" class="form-validate" accept-charset="UTF-8" action="https://partner.rficb.ru/a1lite/input">
	  <input type="hidden" name="key" value="<?php echo $rficb_key ?>" />
	  <b>Номер счета:</b><br />
	  <input class="required validate-numeric" type="text" name="order_id" value="<?php echo $rficb_order_id ?>" /><br /><br />
	  <b>Размер платежа:</b><br />
	  <input class="required validate-numeric" type="text" name="cost" value="<?php echo $rficb_cost ?>" /><br /><br />
	  <b>Наименование товара или услуги:</b><br />
	  <input type="text" name="name" value="<?php echo $rficb_name ?>" /><br /><br />
	  <b>E-mail плательщика:</b><br />
	  <input class="required validate-email" type="text" name="default_email" value="<?php echo $rficb_email ?>" /><br /><br />
	  <b>Введите текст комментария к платежу:</b><br />
	  <input type="text" name="comment" value="<?php echo $rficb_comment ?>" /><br /><br />
	  <input class="button validate" type="submit" value="Оплатить" />
	</form>
  </td>
</tr>
</table>
