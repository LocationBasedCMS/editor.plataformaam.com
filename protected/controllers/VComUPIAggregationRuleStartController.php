<?php

class VComUPIAggregationRuleStartController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VComUPIAggregationRuleStart'),
		));
	}

	public function actionCreate() {
		$model = new VComUPIAggregationRuleStart;


		if (isset($_POST['VComUPIAggregationRuleStart'])) {
			$model->setAttributes($_POST['VComUPIAggregationRuleStart']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'VComUPIAggregationRuleStart');


		if (isset($_POST['VComUPIAggregationRuleStart'])) {
			$model->setAttributes($_POST['VComUPIAggregationRuleStart']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'VComUPIAggregationRuleStart')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = $this->getDataProvider();
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new VComUPIAggregationRuleStart('search');
		$model->unsetAttributes();

		if (isset($_GET['VComUPIAggregationRuleStart']))
			$model->setAttributes($_GET['VComUPIAggregationRuleStart']);

                $dataProvider = $this->getDataProvider();
		$this->render('admin', array(
			'model' => $model,
                        'dataProvider' => $dataProvider,
		));
	}

        public function getDataProvider(){
            return new CActiveDataProvider('VComUPIAggregationRuleStart', array(
                'criteria'=>array(
                    'select' => 'RR.*',
                    'distinct' => true,
                    'alias' => 'RR',
                    'join' => 
                                ' INNER JOIN    UPIAggregationRuleStart ON  UPIAggregationRuleStart.id  = RR.upiaggregationrulestart '.
                                ' INNER JOIN    VComBase                ON  VComBase.id  = UPIAggregationRuleStart.vcombase '.
                                ' INNER JOIN    VComComposite           ON  VComComposite.id  = VComBase.vcomcomposite '.
                                ' INNER JOIN    VComUserRole            ON  VComUserRole.vcomcomposite = VComComposite.id '.
                                ' INNER JOIN    UserVComUserRole        ON  UserVComUserRole.vcomuserrole = VComUserRole.id ',
                    'condition'=>
                            '  UserVComUserRole.user =  '.Yii::app()->user->getId().
                            '  AND VComUserRole.allowedEditVComAggregationRule = 1  '.
                            '  ',
                    'order'=>'RR.id',
                    ),
                    'pagination'=>array(
                        'pageSize'=>100,
                    ),
                )
            );
        }  
        
}