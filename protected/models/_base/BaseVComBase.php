<?php

/**
 * This is the model base class for the table "VComBase".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "VComBase".
 *
 * Columns in table "VComBase" available as properties of the model,
 * followed by relations of table "VComBase" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $vcomcomposite
 * @property integer $virtualspace
 *
 * @property UPIAggregationRuleStart[] $uPIAggregationRuleStarts
 * @property VComComposite $vcomcomposite0
 * @property VirtualSpace $virtualspace0
 */
abstract class BaseVComBase extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'VComBase';
	}

	public static function label($n = 1) {
		//return Yii::t('app', 'VComBase|VComBases', $n);
            return Yii::t('app', 'Área de Interação|Áreas de Interação', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, description, vcomcomposite, virtualspace', 'required'),
			array('vcomcomposite, virtualspace', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('id, name, description, vcomcomposite, virtualspace', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'uPIAggregationRuleStarts' => array(self::HAS_MANY, 'UPIAggregationRuleStart', 'vcombase'),
			'vcomcomposite0' => array(self::BELONGS_TO, 'VComComposite', 'vcomcomposite'),
			'virtualspace0' => array(self::BELONGS_TO, 'VirtualSpace', 'virtualspace'),
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
                        'description' => Yii::t('app', 'Descrição'),
                        'vcomcomposite' => Yii::t('app', 'Composição Pai'),
                        'virtualspace' => Yii::t('app', 'Espaço Virtual'),
                    /*
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'description' => Yii::t('app', 'Description'),
                     * 
                     */
			'vcomcomposite' => Yii::t('app', 'VCLoc Pai'),
                        'virtualspace0' => Yii::t('app', 'Espaço Virtual'),
			'uPIAggregationRuleStarts' => null,
                        'vcomcomposite0' => Yii::t('app', 'VCLoc Pai'),	
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('vcomcomposite', $this->vcomcomposite);
		$criteria->compare('virtualspace', $this->virtualspace);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
        
        
}