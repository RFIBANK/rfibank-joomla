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

  // �������� �� ���������� �������. A1Lite - ����� �������.

  $message  = '������ ' . $params['order_id'] . ' ��������!';

}
else {

  // �������� �� ������. A1Lite - ����� �� �������.

  $message  = '������ �� ������!';


}

jimport('joomla.error.log');
$log =& JLog::getInstance();
$log->addEntry(array('comment' => $message, 'status' => 0));

?>