<?php defined('_JEXEC') or die;

/**
 * File       mod_fastnews.php
 * Created    1/06/16
 * Author     Dmitry Rumiantsev | lemtoup@gmail.com
 * License    GNU General Public License version 2, or later.
 */

// Include the helper.
require_once __DIR__ . '/helper.php';
$helper = new modSimpleSurveyHelper();

// Instantiate global document object
$doc = JFactory::getDocument();

$loadJquery = $params->get('loadJquery', 1);
$message = $params->get('text_message', '');
$answer_positive = $params->get('answer_positive', JTEXT::_('MOD_SIMPLE_SURVEY_ANSWER_POSITIVE_DEFAULT'));
$answer_negative = $params->get('answer_negative', JTEXT::_('MOD_SIMPLE_SURVEY_ANSWER_NEGATIVE_DEFAULT'));
$url_positive = $params->get('url_positive', '/');
$url_negative = $params->get('url_negative', '/');
$template = $params->get('template', 0);
$url_type = $params->get('url_type', '_blank');
$html_classes_positive = $params->get('html_classes_positive', JTEXT::_('MOD_SIMPLE_SURVEY_HTML_PARAMS_POSITIVE_DEFAULT'));
$html_classes_negative = $params->get('html_classes_negative', JTEXT::_('MOD_SIMPLE_SURVEY_HTML_PARAMS_NEGATIVE_DEFAULT'));
$bgc_positive = $params->get('backgroundcolor_positive', '#5cb85c');
$bgc_negative = $params->get('backgroundcolor_negative', '#c9302c');
$bgc_positive_dark = $helper->colourBrightness($bgc_positive, 1.1);
$bgc_negative_dark = $helper->colourBrightness($bgc_negative, 1.1);
$include_js = $params->get('include_js', '');

$js = '
	function surveyAjaxSend(object) {
 	  var answer = jQuery(object).data("answer"),
 	  url = jQuery(object).attr("href"),
 	  disabled = jQuery(object).attr("disabled"),
 	  current_url = window.location.href;
 	  
 	  console.log(current_url);
 	  
 	  if (disabled) event.preventDefault();
 	  else {
		request = {
			   "option" : "com_ajax",
			   "module" : "simple_survey",
			   "format" : "raw",
			   "answer" : answer,
			   "url"    : url,
			   "disabled" : disabled,
			   "url_from" : current_url,
			};
		  
		  jQuery.ajax({
			  type: "POST",
			  data: request,
			  success: function(data) {
				console.log(data);
				jQuery(".simplesurvey a").attr("disabled",true);
			  },
			  error:  function(xhr, str){
				console.log("Error: " + xhr.responseCode);
			  }
			});
        }
    }
';

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
    z-index: 0;
}
.simplesurvey .btn-group-vertical>.btn, .btn-group>.btn {
    position: relative;
    float: left;
}
.simplesurvey .btn-default:hover {
    color: #fff;
    background-color: #e6e6e6;
    border-color: #adadad;
}
.simplesurvey .btn.focus, .btn:focus, .btn:hover {
    color: #fff;
    text-decoration: none;
}
.simplesurvey .btn-default {
    color: #fff;
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

$doc->addScriptDeclaration($js);
if ($include_js) $doc->addScriptDeclaration($include_js);

switch ($template) {
	case 1:
		JHtml::_('bootstrap.framework');
		require(JModuleHelper::getLayoutPath('mod_simple_survey'));
		break;
	default:
		$doc->addStyleDeclaration($css);
		require(JModuleHelper::getLayoutPath('mod_simple_survey'));
};


