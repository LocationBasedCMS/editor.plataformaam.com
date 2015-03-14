<?php

Yii::import('application.models._base.BaseVComComposite');

class VComComposite extends BaseVComComposite
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        
        /****
         * @description : Efetua a recursão para retornar os arrays de VComComposites
         */
        public function  coreGetRecursiveVComComposites($arrayVComComposites){
            $output = array();
            //Verifica a árada de Recursão
            if( $arrayVComComposites != null  ){
                //Extraia Primeira Composição 
                $composicao  = array_pop($arrayVComComposites);
                //Obtem os filhos da primeira Composição do Array 
                $pre_output = $this->coreGetRecursiveVComComposites( $composicao->vComComposites );   
                //Junta a composição com os Filhos da Primeira Composição e Filhos da Demais Composições, obtido recursivamente.
                $output = array_merge(
                            array($composicao), 
                            $pre_output, 
                            $this->coreGetRecursiveVComComposites($arrayVComComposites)  );
            }
            return $output;
        }
        /***
         * @description: Retorna Recursivamente todas as composições de um VComCOmposite.
         */
        public function getRecursiveVComComposites(){
            return  $this->coreGetRecursiveVComComposites(array($this));
        }
        /***coreGetRecursiveVComComposites
         * @description: Retorna Recursivamente todas as bases de um VComCOmposite. Este método usa o $this->getRecursiveVComComposites()
         */        
        public function getRecursiveVComBases(){
            //Obtem as composições recursivamente.
            $arrayVComBases = array();
            $arrayVComComposites = $this->coreGetRecursiveVComComposites(array($this));
            foreach( $arrayVComComposites as $composites ){
                $arrayVComBases    = array_merge($arrayVComBases,$composites->vComBases );
            }
            return $arrayVComBases;
        }

}