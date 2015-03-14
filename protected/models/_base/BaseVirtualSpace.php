<?php

/**
 * This is the model base class for the table "VirtualSpace".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "VirtualSpace".
 *
 * Columns in table "VirtualSpace" available as properties of the model,
 * followed by relations of table "VirtualSpace" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 * @property double $startLatitude
 * @property double $startLongitude
 * @property double $stopLatitude
 * @property double $stopLongitude
 *
 * @property VComBase[] $vComBases
 * @property VComComposite[] $vComComposites
 */
abstract class BaseVirtualSpace extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'VirtualSpace';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Espaço Virtuai|Espaços Virtuais', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, startLatitude, startLongitude, stopLatitude, stopLongitude', 'required'),
			array('startLatitude, startLongitude, stopLatitude, stopLongitude', 'numerical'),
			array('name', 'length', 'max'=>100),
			array('id, name, startLatitude, startLongitude, stopLatitude, stopLongitude', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'vComBases' => array(self::HAS_MANY, 'VComBase', 'virtualspace'),
			'vComComposites' => array(self::HAS_MANY, 'VComComposite', 'virtualspace'),
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
                        'startLatitude' => Yii::t('app', 'Latitude Inicial'),
                        'startLongitude' => Yii::t('app', 'Longitude Inicial'),
                        'stopLatitude' => Yii::t('app', 'Latitude Final'),
                        'stopLongitude' => Yii::t('app', 'Longitude Final'),                    
                    /*
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'startLatitude' => Yii::t('app', 'Start Latitude'),
			'startLongitude' => Yii::t('app', 'Start Longitude'),
			'stopLatitude' => Yii::t('app', 'Stop Latitude'),
			'stopLongitude' => Yii::t('app', 'Stop Longitude'),
                     */
                        'vComComposites' => Yii::t('app', 'Composições'),
			'vComBases' => Yii::t('app', 'Áreas de Interação'),
                        //'vComBases' => Yii::t('app', 'Áreas de Interação'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('startLatitude', $this->startLatitude);
		$criteria->compare('startLongitude', $this->startLongitude);
		$criteria->compare('stopLatitude', $this->stopLatitude);
		$criteria->compare('stopLongitude', $this->stopLongitude);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}