<?php
/**
@version 1.0 $
@package MainPay
@author Yuri Lysenkov aka YUSoft
@copyright (C) 2010
@license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

require_once ('parse.inc.php');

$q = $_POST;

$params = _yusoft_parse($q);

if ($params['check']) {

  // Действия по зачислению платежа. A1Lite - Ключи совпали.

  $message  = 'Платеж ' . $params['order_id'] . ' зачислен!';

}
else {

  // Действия по ошибке. A1Lite - Ключи не совпали.

  $message  = 'Платеж не принят!';


}

jimport('joomla.error.log');
$log =& JLog::getInstance();
$log->addEntry(array('comment' => $message, 'status' => 0));

?>