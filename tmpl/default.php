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
        <a class="btn btn-default" target="<?=$url_type?>" href="<?=$url_positive?>" <?=$html_params_positive?>><?=$answer_positive?></a>
        <a class="btn btn-default" target="<?=$url_type?>" href="<?=$url_negative?>" <?=$html_params_negative?>><?=$answer_negative?></a>
    </div>
</div>