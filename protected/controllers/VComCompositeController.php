<?php

class VComCompositeController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VComComposite'),
		));
	}

	public function actionCreate() {
		$model = new VComComposite;


		if (isset($_POST['VComComposite'])) {
			$model->setAttributes($_POST['VComComposite']);

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
		$model = $this->loadModel($id, 'VComComposite');


		if (isset($_POST['VComComposite'])) {
			$model->setAttributes($_POST['VComComposite']);

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
			$this->loadModel($id, 'VComComposite')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('VComComposite');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new VComComposite('search');
		$model->unsetAttributes();
                $dataProvider= $this->getDataProvider();

		if (isset($_GET['VComComposite']))
			$model->setAttributes($_GET['VComComposite']);

		$this->render('admin', array(
			'model' => $model,
                        'dataProvider' => $dataProvider,
		));
	}
        
        //METODOS CRIADOS MANUALMENTE
        public function actionPublish() {
            	$model = new VComComposite('search');
                $dataProvider= $this->getDataProvider();
		$model->unsetAttributes();
		if (isset($_GET['VComComposite']))
			$model->setAttributes($_GET['VComComposite']);

		$this->render('publish', array(
			'model' => $model,
                    	'dataProvider' => $dataProvider,
		));
        }

        public function actionConfirmPublish($id) {
            $model = $this->loadModel($id, 'VComComposite');

            $this->render('confirmPublish', array(
				'model' => $model,
				));       
        }
        

        
        public function getDataProvider(){
            return new CActiveDataProvider('VComComposite', array(
                    'criteria'=>array(
                        'distinct' => true,
                        'select' => 'vcc.*',
                        'alias' => 'vcc',
                            'join' => 
                                        ' INNER JOIN VComUserRole ON VComUserRole.vcomcomposite = `vcc`.id '.
                                        ' INNER JOIN UserVComUserRole ON UserVComUserRole.vcomuserrole = VComUserRole.id ',
                                        'condition'=>'  ( `vcc`.vcomcomposite = 1 OR `vcc`.vcomcomposite IS NULL ) AND  `vcc`.id <> 1  AND VComUserRole.allowedEditVCom = 1  AND UserVComUserRole.user =  '.Yii::app()->user->getId(),
                                        'order'=>'name',
                    ),
                        'pagination'=>array(
                        'pageSize'=>100,
                    ),
                ));
            
        }
        
        public function actionFinishPublish($id) {
            $model = $this->loadModel($id, 'VComComposite');
            $this->render('finishPublish', array(
				'model' => $model,
				));       
        }
}