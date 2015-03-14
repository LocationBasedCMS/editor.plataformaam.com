<?php

class VirtualSpaceController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VirtualSpace'),
		));
	}

	public function actionCreate() {
		$model = new VirtualSpace;


		if (isset($_POST['VirtualSpace'])) {
			$model->setAttributes($_POST['VirtualSpace']);

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
		$model = $this->loadModel($id, 'VirtualSpace');


		if (isset($_POST['VirtualSpace'])) {
			$model->setAttributes($_POST['VirtualSpace']);

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
			$this->loadModel($id, 'VirtualSpace')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('VirtualSpace');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new VirtualSpace('search');
		$model->unsetAttributes();

		if (isset($_GET['VirtualSpace']))
			$model->setAttributes($_GET['VirtualSpace']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}