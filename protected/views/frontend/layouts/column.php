<?php $this->beginContent('/layouts/main'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <?= $content ?>
        </div>
    </div>
</div>

<footer class="mt-auto">
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-10 offset-lg-1">
                <?= Yii::app()->params['template.footer'] ?>
            </div>
        </div>
    </div>
</footer>
<?php $this->endContent('/layouts/main'); ?>