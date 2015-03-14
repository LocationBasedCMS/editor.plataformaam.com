<?php

Yii::import('application.models._base.BaseVComBase');

class VComBase extends BaseVComBase
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}