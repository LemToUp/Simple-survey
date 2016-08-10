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
    <? foreach ($fields as $field) :?>
        <a class="btn btn-default" target="<?=$url_type?>" href="<?=$field['field_url']?>" <?=$field['field_params']?>><?=$field['field_answer']?></a>
    <? endforeach; ?>
    </div>
</div>