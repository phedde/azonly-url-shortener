<?php
$flashMessages = Yii::app()->user->getFlashes();
if ($flashMessages):foreach($flashMessages as $key => $message):?>
<div class="flash <?= $key?>">
<div class="close-flash"></div>
<?= $message ?>
</div>
<? endforeach; endif; ?>