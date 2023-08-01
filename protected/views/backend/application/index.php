<p>Total Hits: <strong><?= Helper::f(Shortlink::model()->totalHits()); ?></strong></p>
<p>Totoal Urls: <strong><?= Helper::f($model->count()); ?></strong></p>
<p>New Urls Today: <strong><?= Helper::f(Shortlink::model()->getToday()); ?></strong></p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'summaryText'=>'',
	'pager'=>array(
		'maxButtonCount' => 10,
		'cssFile'=>Yii::app()->createAbsoluteUrl('css/pager.css'),
		'header'=>'',
		'prevPageLabel'=>'&laquo;',
		'nextPageLabel'=>'&raquo;',
	),
	'cssFile'=>Yii::app()->request->getBaseUrl(true).'/css/grid.css',
	'columns'=>array(
		'UrlID',
		array(
			'name'=>'UrlShort',
			'value'=>'Yii::app()->createAbsoluteUrl($data->UrlShort)',
		),
		array(
			'name'=>'Url',
			'value'=>'mb_strlen($data->Url, "utf-8") > 50 ? mb_substr($data->Url, 0, 50, "utf-8")."..." : $data->Url',
		),
		'Hits',
		'Added',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
			'updateButtonImageUrl'=>Yii::app()->baseUrl. '/images/update.png',
			'deleteButtonImageUrl'=>Yii::app()->baseUrl. '/images/delete.png',
			'buttons'=>array(

				'delete'=>array(
					'url'=>'Yii::app()->createAbsoluteUrl("admin/delete/$data->UrlID")',
				),
				'update'=>array(
					'url'=>'Yii::app()->createAbsoluteUrl("admin/edit/$data->UrlID")',
				),
			),
		),
	),
)); ?>