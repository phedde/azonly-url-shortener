<script type="text/javascript">
$(document).ready(function() {
    "use strict";

	$(window).keydown(function(event){
		if(event.keyCode === 13) {
			event.preventDefault();
			return false;
		}
	});

	$.fn.shortlink({
		ajax: '<?php echo $this->createAbsoluteUrl("application/short"); ?>',
		siteUrl: '<?php echo Yii::app()->request->getBaseUrl(true); ?>',
		qr: '#qr',
		copy: '#copy',
		shortlink: '#shortlink',
		url: '#url',
		create: '#create',
		form: '#shortForm',
		shortarea: '#short-area',
		notice: '#copy-notice',
		share: '.share42init',
	});
});
</script>


<h1 class="mt-4 text-primary text-center site-name">
    <?= Yii::t("app", "main_header"); ?>
</h1>

<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title text-center mb-4">
            <?= Yii::t("app", "secondary_header"); ?>
        </h5>

        <form id="shortForm">
            <div class="input-group mb-4">
                <input type="text" class="form-control form-control-lg" name="url" id="url" placeholder="<?= Yii::app()->params['app.placeholder']; ?>">

                <div class="input-group-append">
                    <button class="btn btn-primary" id="create">
                        <?= Yii::t("app", "shorten") ?>
                    </button>
                </div>
            </div>
        </form>

        <p class="mt-4 text-center">
            <?= Yii::t("app", "short_description"); ?>
        </p>

    </div>
</div>



<div id="short-area" class="disnone">
    <h2 class="mt-4 text-primary text-center site-name">
        <?= Yii::t("app", "shortened_url_header"); ?>
    </h2>

    <div class="card">
        <div class="card-body">

            <div class="form-group row">
                <label for="shortlink" class="col-md-2 col-form-label">
                    <?= Yii::t("app", "short_link"); ?>
                </label>
                <div class="col-md-10">
                    <div class="input-group mb-4">
                        <input type="text" class="form-control form-control-lg" name="shortLink" id="shortlink">

                        <div class="input-group-append">
                            <button class="btn btn-primary" id="d_clip_button" data-clipboard-target="#shortlink">
                                <?= Yii::t("app", "copy"); ?>
                            </button>
                        </div>

                        <div id="copy-notice" style="visibility:hidden;"><?= Yii::t("app", "copied"); ?></div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label qr-label"><?= Yii::t("app", "qr_code"); ?></label>
                <div class="col-md-10">
                    <img src="#" title=<?= CJavaScript::encode("app", "qr_code"); ?> alt=<?= CJavaScript::encode("app", "qr_code"); ?> id="qr" class="qr"/>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <div class="share42init" data-path="<?= Yii::app()->baseUrl ?>/images/"></div>
        </div>
    </div>
</div>

<? if(!empty(Yii::app()->params['template.banner_top'])): ?>
    <div class="mt-4">
        <?= Yii::app()->params['template.banner_top'] ?>
    </div>
<? endif; ?>

<ul class="list-group list-group-horizontal-md mt-4" style="width: 100%">
    <li class="list-group-item flex-fill">
        <?= Yii::t("app", "total_hits") ?>: <strong><?= Helper::f($totalHits); ?></strong>
    </li>
    <li class="list-group-item flex-fill">
        <?= Yii::t("app", "total_urls") ?>: <strong><?= Helper::f($totalUrls); ?></strong>
    </li>
    <li class="list-group-item flex-fill">
        <?= Yii::t("app", "today_added") ?>: <strong><?= Helper::f($today); ?></strong>
    </li>
</ul>

<? if(Yii::app()->params['app.show_recent'] AND !empty($recent)): ?>
    <h3 class="text-primary mt-4"><?= Yii::t("app",'recently_added') ?></h3>
    <div class="table-responsive">
        <table class="table table-results">
            <thead class="table-primary">
            <tr>
                <th><?= Yii::t("app",'short_url') ?></th>
                <th><?= Yii::t("app",'long_url') ?></th>
                <th><?= Yii::t("app",'date_time') ?></th>
                <th><?= Yii::t("app",'hits') ?></th>
            </tr>
            </thead>
            <tbody>
            <? foreach($recent as $r): ?>
                <tr>
                    <td>
                        <a href="<?= Yii::app()->createAbsoluteUrl("application/redirect", array("shortid"=>$r['UrlShort'])) ?>" target="_blank">
                            <?= Yii::app()->createAbsoluteUrl("application/redirect", array("shortid"=>$r['UrlShort'])) ?>
                        </a>
                    </td>
                    <td><?= CHtml::encode(Helper::cropText($r['Url'])) ?></td>
                    <td><?php echo $r['Added'] ?></td>
                    <td><?php echo Helper::f($r['Hits']) ?></td>
                </tr>
            <? endforeach; ?>
            </tbody>
        </table>
    </div>
<? endif; ?>

<? if(Yii::app()->params['app.show_popular'] AND !empty($top)): ?>
    <h3 class="text-primary mt-4"><?= Yii::t("app",'most_popular_urls') ?></h3>
    <div class="table-responsive">
        <table class="table table-results">
            <thead class="table-primary">
            <tr>
                <th><?= Yii::t("app",'short_url') ?></th>
                <th><?= Yii::t("app",'long_url') ?></th>
                <th><?= Yii::t("app",'date_time') ?></th>
                <th><?= Yii::t("app",'hits') ?></th>
            </tr>
            </thead>
            <tbody>
            <? foreach($top as $t): ?>
                <tr>
                    <td>
                        <a href="<?= Yii::app()->createAbsoluteUrl("application/redirect", array("shortid"=>$t['UrlShort'])) ?>" target="_blank">
                            <?= Yii::app()->createAbsoluteUrl("application/redirect", array("shortid"=>$t['UrlShort'])) ?>
                        </a>
                    </td>
                    <td><?= CHtml::encode(Helper::cropText($t['Url'])) ?></td>
                    <td><?php echo $t['Added'] ?></td>
                    <td><?php echo Helper::f($t['Hits']) ?></td>
                </tr>
            <? endforeach; ?>
            </tbody>
        </table>
    </div>
<? endif; ?>

<? if(!empty(Yii::app()->params['template.banner_bottom'])): ?>
    <div class="mt-4">
        <?= Yii::app()->params['template.banner_bottom'] ?>
    </div>
<? endif; ?>
