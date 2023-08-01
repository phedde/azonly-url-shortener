<script type="text/javascript">
$(document).ready(function() {
    "use strict";

    var isActive = true;
	var seconds = <?php echo $seconds ?>,
			second = 0,
			url = <?= CJavaScript::encode($model['Url']) ?>;
	var interval = setInterval(function(){
	    if(!isActive) {
	        return;
        }
		$('#second').html(seconds - second);
		if (second >= seconds) {
            document.location.href = url;
            clearInterval(interval);
		}
		second++;
	}, 1000);

    window.onfocus = function () {
        isActive = true;
    };
    window.onblur = function () {
        isActive = false;
    };
});
</script>

<h1 class="mt-4 text-primary text-center site-name">
    <?= Yii::t("app", "main_header"); ?>
</h1>

<div class="card mt-4">
    <div class="card-body">
        <h3 class="card-title mb-4">
            <?= Yii::t("app", "redirect", array(
                "{url}"=>CHtml::encode($model['Url'])
            )); ?>
        </h3>
        <p class="card-text">
            <?= Yii::t("app", "redirect_timer", array(
                "{url}"=>'<strong>'.CHtml::encode($model['Url']).'</strong>',
                "{second}"=>'<strong><span id="second">'.(int)$seconds.'</span></strong>'
            )); ?>
        </p>
    </div>
</div>


