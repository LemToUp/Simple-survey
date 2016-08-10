<?php defined('_JEXEC') or die;

/**
 * File       mod_fastnews.php
 * Created    1/06/16
 * Author     Dmitry Rumiantsev | lemtoup@gmail.com
 * License    GNU General Public License version 2, or later.
 */

// Include the helper.
require_once __DIR__ . '/helper.php';

// Instantiate global document object
$doc = JFactory::getDocument();

$message = $params->get('text_message', '');
$template = $params->get('template', 0);
$url_type = $params->get('url_type', '_blank');
$include_js = $params->get('include_js', '');

$fields_raw = json_decode( $params->get('fields_list'),true);
$fields = array();

foreach ($fields_raw as $key => $value) {
	for ($j = 0; $j < count($value); $j++ ) {
		$fields[$j][$key] = $value[$j];
	}
}

$css = '
.simplesurvey a {
	text-decoration: none;
}
.simplesurvey .btn-group {
	margin-top: 5px;
    margin-bottom: 5px;
    position: relative;
    display: inline-block;
    vertical-align: middle;
}
.simplesurvey .btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.simplesurvey .btn-group>.btn:first-child {
    margin-left: 0;
}
.simplesurvey .btn-group .btn+.btn, .btn-group .btn+.btn-group, .btn-group .btn-group+.btn, .btn-group .btn-group+.btn-group {
    margin-left: -1px;
}
.simplesurvey .btn-group>.btn:hover {
    z-index: 2;
}
.simplesurvey .btn-group-vertical>.btn, .btn-group>.btn {
    position: relative;
    float: left;
}
.simplesurvey .btn-default:hover {
    color: #333;
    background-color: #e6e6e6;
    border-color: #adadad;
}
.simplesurvey .btn.focus, .btn:focus, .btn:hover {
    color: #333;
    text-decoration: none;
}
.simplesurvey .btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}
.simplesurvey .btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.simplesurvey .btn-group>.btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
    border-radius: 0;
}
.simplesurvey .btn-group>.btn:last-child:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
';

if ($include_js)  {
	$doc->addScriptDeclaration($include_js);
}

switch ($template) {
	case 1:
		JHtml::_('bootstrap.framework');
		require(JModuleHelper::getLayoutPath('mod_simple_survey'));
		break;
	default:
		$doc->addStyleDeclaration($css);
		require(JModuleHelper::getLayoutPath('mod_simple_survey'));
};


