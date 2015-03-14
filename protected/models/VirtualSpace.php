<?php

Yii::import('application.models._base.BaseVirtualSpace');

class VirtualSpace extends BaseVirtualSpace
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}