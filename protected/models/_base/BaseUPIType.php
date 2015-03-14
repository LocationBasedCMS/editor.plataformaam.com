<?php

/**
 * This is the model base class for the table "UPIType".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UPIType".
 *
 * Columns in table "UPIType" available as properties of the model,
 * followed by relations of table "UPIType" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 *
 * @property UPIAggregationRuleResponseOf[] $uPIAggregationRuleResponseOfs
 * @property UPIAggregationRuleStart[] $uPIAggregationRuleStarts
 */
abstract class BaseUPIType extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'UPIType';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Tipo de UPI|Tipos de UPI', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>100),
			array('id, name', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'uPIAggregationRuleResponseOfs' => array(self::HAS_MANY, 'UPIAggregationRuleResponseOf', 'upitype'),
			'uPIAggregationRuleStarts' => array(self::HAS_MANY, 'UPIAggregationRuleStart', 'upitype'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Nome'),
			'uPIAggregationRuleResponseOfs' => Yii::t('app', 'Regras de Respostas'),
			'uPIAggregationRuleStarts' => Yii::t('app', 'Regras de Publicações'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}