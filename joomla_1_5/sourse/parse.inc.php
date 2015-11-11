<?php

function _yusoft_plain($text) {

 return htmlspecialchars($text, ENT_QUOTES);
}

function _yusoft_parse($q) {

  jimport('joomla.html.parameter');

  $database =& JFactory::getDBO();
  $params = $database->GetOne("SELECT params FROM #__modules WHERE module='mod_rficb'");

  preg_match('/rficb_skey=(\S+)/i', $params, $match);
  $skey = $match[1];

  $params = array(
    'tid' => _yusoft_plain($q['tid']),			// ID ����������
    'name' => _yusoft_plain($q['name']), 		// �������� ������ ��� ������
    'comment' => _yusoft_plain($q['comment']),		// ����������� �������
    'partner_id' => _yusoft_plain($q['partner_id']),	// ��� ID
    'service_id' => _yusoft_plain($q['service_id']),	// ID �������
    'order_id' => _yusoft_plain($q['order_id']),	// ID ������
    'type' => _yusoft_plain($q['type']),		// ��� ������� (�sms�, �wm�, �terminal�)
    'partner_income' => _yusoft_plain($q['partner_income']), // ����� � ������ ������ ������ �� ������� �������
    'system_income' => _yusoft_plain($q['system_income'])    // ����� � ������, ����������� ���������
  );

  $check = md5(join('', array_values($params)) . $skey);
  $params['check'] = ($q['check'] === $check);

  $params['email'] = _yusoft_plain($q['email']);		// E-mail �����������
  $params['phone_number'] = _yusoft_plain($q['phone_number']); // ������� �����������

  return $params;
}

global $mosConfig_absolute_path, $mosConfig_live_site, $mosConfig_lang, $database,
$mosConfig_mailfrom, $mosConfig_fromname;

if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/configuration.php")) {
  require_once( $_SERVER['DOCUMENT_ROOT'] . "/configuration.php" );
}
else {
  die ("Joomla Configuration File not found!");
}

if( class_exists( 'jconfig' ) ) {

  define( '_JEXEC', 1 );
  define('JPATH_BASE', $_SERVER['DOCUMENT_ROOT']);
  define( 'DS', DIRECTORY_SEPARATOR );

  require_once (JPATH_BASE . DS . 'includes' . DS . 'defines.php');
  require_once (JPATH_BASE . DS . 'includes' . DS . 'framework.php');

  $mainframe = & JFactory::getApplication( 'site' );
  $mainframe->initialise();
	
  JPluginHelper::importPlugin('system');

  $mainframe->triggerEvent('onBeforeStart');
}

?>