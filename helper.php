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
}