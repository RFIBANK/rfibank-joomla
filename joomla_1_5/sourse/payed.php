<?php
/**
@version 1.0 $
@package rficb@copyright (C) 2014
@license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

require_once ('parse.inc.php');

defined('_JEXEC') or die('Direct Access to this location is not allowed.');

$q = $_GET;

$params = _yusoft_parse($q);

if ($params['check']) {

  $sum = $params['partner_income'];

  $message = 'Оплата прошла успешно, ' . $sum . ' рублей зачислено на ваш счет!';

}
else {

  $message  = 'Платеж не принят!';

}

echo $message;

?>