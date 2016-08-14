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
        <a target="<?=$url_type?>"
           onclick="surveyAjaxSend(this);"
           href="<?=$url_positive?>"
           class="<?=$html_classes_positive?>"
           data-answer="<?=$answer_positive?>"
           style="
               background-color: <?=$bgc_positive?>;
               border-color: <?=$bgc_positive?>;
               "
           onmouseover="
               this.style.backgroundColor='<?=$bgc_positive_dark?>';
               this.style.borderColor='<?=$bgc_positive_dark?>';
               "
           onmouseout="
               this.style.backgroundColor='<?=$bgc_positive?>';
               this.style.borderColor='<?=$bgc_positive?>';
               "
        >
            <?=$answer_positive?>
        </a>
        <a
            target="<?=$url_type?>"
            onclick="surveyAjaxSend(this);"
            href="<?=$url_negative?>"
            class="<?=$html_classes_negative?>"
            data-answer="<?=$answer_negative?>"
            style="
                background-color: <?=$bgc_negative?>;
                border-color: <?=$bgc_negative?>;
                "
            onmouseover="
                this.style.backgroundColor='<?=$bgc_negative_dark?>';
                this.style.borderColor='<?=$bgc_negative_dark?>';
                "
            onmouseout="
                this.style.backgroundColor='<?=$bgc_negative?>';
                this.style.borderColor='<?=$bgc_negative?>';
                "
        >
            <?=$answer_negative?>
        </a>
    </div>
</div>