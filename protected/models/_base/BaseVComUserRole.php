<?php

/**
 * This is the model base class for the table "VComUserRole".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "VComUserRole".
 *
 * Columns in table "VComUserRole" available as properties of the model,
 * followed by relations of table "VComUserRole" available as properties of the model.
 *
 * @property integer $id
 * @property integer $vcomcomposite
 * @property string $name
 * @property integer $allowedEditVComAggregationRule
 * @property integer $allowedEditVCom
 * @property integer $isClientDefault
 * @property integer $isClientSelectable
 *
 * @property User[] $users
 * @property VComUPIAggregationRuleResponseOf[] $vComUPIAggregationRuleResponseOfs
 * @property VComUPIAggregationRuleStart[] $vComUPIAggregationRuleStarts
 * @property VComComposite $vcomcomposite0
 */
abstract class BaseVComUserRole extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'VComUserRole';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Papel do Usuário|Papeis de Usuários', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name', 'required'),
			array('vcomcomposite, allowedEditVComAggregationRule, allowedEditVCom, isClientDefault, isClientSelectable', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('vcomcomposite, allowedEditVComAggregationRule, allowedEditVCom, isClientDefault, isClientSelectable', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, vcomcomposite, name, allowedEditVComAggregationRule, allowedEditVCom, isClientDefault, isClientSelectable', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'users' => array(self::MANY_MANY, 'User', 'UserVComUserRole(vcomuserrole, user)'),
			'vComUPIAggregationRuleResponseOfs' => array(self::HAS_MANY, 'VComUPIAggregationRuleResponseOf', 'vcomuserole'),
			'vComUPIAggregationRuleStarts' => array(self::HAS_MANY, 'VComUPIAggregationRuleStart', 'vcomuserrole'),
			'vcomcomposite0' => array(self::BELONGS_TO, 'VComComposite', 'vcomcomposite'),
		);
	}

	public function pivotModels() {
		return array(
			'users' => 'UserVComUserRole',
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'vcomcomposite' => null,
			'name' => Yii::t('app', 'Nome'),
			'allowedEditVComAggregationRule' => Yii::t('app', 'Pode editar regras de Publicação'),
			'allowedEditVCom' => Yii::t('app', 'Pode Editar Estrutura do VCLoc'),
			'isClientDefault' => Yii::t('app', 'Default do CLiente'),
			'isClientSelectable' => Yii::t('app', 'Opcional no Cliente'),
			'users' => Yii::t('app', 'Usuários do perfil'),
			'vComUPIAggregationRuleResponseOfs' => Yii::t('app', 'Regras de Resposta do Perfil'),
			'vComUPIAggregationRuleStarts' => Yii::t('app', 'Regras de Publicação do Perfil'),
			'vcomcomposite0' => Yii::t('app', 'VCLoc Associado'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('vcomcomposite', $this->vcomcomposite);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('allowedEditVComAggregationRule', $this->allowedEditVComAggregationRule);
		$criteria->compare('allowedEditVCom', $this->allowedEditVCom);
		$criteria->compare('isClientDefault', $this->isClientDefault);
		$criteria->compare('isClientSelectable', $this->isClientSelectable);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
        
        
        
}