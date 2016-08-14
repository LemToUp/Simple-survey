<?php defined('_JEXEC') or die;

/**
 *
 * File       mod_fastnews.php
 * Created    1/06/16
 * Author     Dmitry Rumiantsev | lemtoup@gmail.com
 * License    GNU General Public License version 2, or later.
 */

?>

<div class="simplesurvey">
    <p><?=$message?></p>
    <div class="btn-group">
        <a target="<?=$url_type?>" onclick="surveyAjaxSend(this);" href="<?=$url_positive?>" class="<?=$html_classes_positive?>" data-answer="<?=$answer_positive?>"><?=$answer_positive?></a>
        <a target="<?=$url_type?>" onclick="surveyAjaxSend(this);" href="<?=$url_negative?>" class="<?=$html_classes_negative?>" data-answer="<?=$answer_negative?>"><?=$answer_negative?></a>
    </div>
</div>