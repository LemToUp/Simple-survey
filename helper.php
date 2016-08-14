<?php defined('_JEXEC') or die;

/**
 * File       mod_fastnews.php
 * Created    1/06/16
 * Author     Dmitry Rumiantsev | lemtoup@gmail.com
 * License    GNU General Public License version 2, or later.
 */


class modSimpleSurveyHelper {

	public static function getAjax() {
		jimport('joomla.application.module.helper');
		$input  = JFactory::getApplication()->input;
		$module = JModuleHelper::getModule('fastnews');
		$params = new JRegistry();
		$params->loadString($module->params);

		$answer = $input->get('answer');
		$url = $input->get('url');
		$url_from = $input->get('url_from');
		$disabled = $input->get('disabled');

		if (!$disabled) {

			$db = JFactory::getDbo();
			$object = new stdClass();

			$object->button_text = $answer;
			$object->button_url = $url;
			$object->url_from = $url_from;

			$result = $db->insertObject('#__simple_survey_history', $object);

			if ($result) return $input->get('answer') . " / " . $input->get('url');
			else return FALSE;
		}
		return FALSE;
	}

	function colourBrightness($rgb, $darker=2) {

		$hash = (strpos($rgb, '#') !== false) ? '#' : '';
		$rgb = (strlen($rgb) == 7) ? str_replace('#', '', $rgb) : ((strlen($rgb) == 6) ? $rgb : false);
		if(strlen($rgb) != 6) return $hash.'000000';
		$darker = ($darker > 1) ? $darker : 1;

		list($R16,$G16,$B16) = str_split($rgb,2);

		$R = sprintf("%02X", floor(hexdec($R16)/$darker));
		$G = sprintf("%02X", floor(hexdec($G16)/$darker));
		$B = sprintf("%02X", floor(hexdec($B16)/$darker));

		return $hash.$R.$G.$B;
	}
}