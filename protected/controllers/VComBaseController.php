<?php

class VComBaseController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VComBase'),
		));
	}

	public function actionCreate() {
		$model = new VComBase;


		if (isset($_POST['VComBase'])) {
			$model->setAttributes($_POST['VComBase']);

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
		$model = $this->loadModel($id, 'VComBase');


		if (isset($_POST['VComBase'])) {
			$model->setAttributes($_POST['VComBase']);

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
			$this->loadModel($id, 'VComBase')->delete();

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
		$model = new VComBase('search');
		$model->unsetAttributes();

		if (isset($_GET['VComBase']))
			$model->setAttributes($_GET['VComBase']);

		$this->render('admin', array(
			'model' => $model,
                        'dataProvider' => $this->getDataProvider()
		));
	}
        
        public function getDataProvider(){
                return new CActiveDataProvider('VComBase', array(
                    'criteria'=>array(
                        'select' => 'VB.*',
                        'distinct' => true,
                        'alias' => 'VB',
                        'join' => 
                                    ' INNER JOIN    VComComposite       ON  VComComposite.id  = VB.vcomcomposite '.
                                    ' INNER JOIN    VComUserRole        ON  VComUserRole.vcomcomposite = VComComposite.id '.
                                    ' INNER JOIN    UserVComUserRole    ON  UserVComUserRole.vcomuserrole = VComUserRole.id ',
                        'condition'=>
                                '  UserVComUserRole.user =  '.Yii::app()->user->getId().
                                '  AND VComUserRole.allowedEditVCom = 1  '.
                                '  ',
                        'order'=>'name',
                        ),
                        'pagination'=>array(
                            'pageSize'=>100,
                        ),
                ));
        }        

}