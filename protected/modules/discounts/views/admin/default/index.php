<?php

/**
 * Display products list
 **/

$this->pageHeader = Yii::t('DiscountsModule.admin', 'Скидки');

$this->breadcrumbs = array(
	'Home'=>$this->createUrl('/admin'),
	Yii::t('DiscountsModule.admin', 'Скидки'),
);

$this->topButtons = $this->widget('application.modules.admin.widgets.SAdminTopButtons', array(
	'template'=>array('create'),
	'elements'=>array(
		'create'=>array(
			'link'=>$this->createUrl('create'),
			'title'=>Yii::t('DiscountsModule.admin', 'Создать скидку'),
			'options'=>array(
				'icons'=>array('primary'=>'ui-icon-plus')
			)
		),
	),
));

$this->widget('ext.sgridview.SGridView', array(
	'dataProvider'=>$dataProvider,
	'id'=>'discountsListGrid',
	'filter'=>$model,
	'columns'=>array(
		array(
			'class'=>'CCheckBoxColumn',
		),
		array(
			'class'=>'SGridIdColumn',
			'name'=>'id'
		),
		array(
			'name'=>'name',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->name), array("/discounts/admin/default/update", "id"=>$data->id))',
		),
		array(
			'name'=>'active',
			'filter'=>array(1=>Yii::t('DiscountsModule.admin', 'Да'), 0=>Yii::t('DiscountsModule.admin', 'Нет')),
			'value'=>'$data->active ? Yii::t("DiscountsModule.admin", "Да") : Yii::t("DiscountsModule.admin", "Нет")'
		),
		'start_date',
		'end_date',
		// Buttons
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
		),
	),
));