<h3>Ordem de Exportação</h3>
<ul>
    <li>
        Virtual Space
    </li>
    <li>
        VComComposite - Recur
        <ul>
            <li>
                VCom Base
                <ul>
                    <li>Regras de Publicação</li>
                    <li>Regras de Resposta</li>
                </ul>
            </li>
            <li>VComUSerRole
                <ul> 
                    <li>Papeis X Regras de publicações</li>
                    <li>Papeis X Regras de publicações</li>
                    <li>Papeis X Usuários</li>
                </ul>
            </li>
        </ul>
    </li>
    
</ul>

    
    

    
<?php
echo "<p>Iniciando a exportação do veículo de comunicação  '$model->id - $model'  </p>";
try {
    $command = Yii::app()->db->createCommand("CALL procedureExportVCLocRecursive($model->id,20);");
    $command->execute();
    echo    '<div class="alert alert-success" > '.
                '<p>VCLoc Exportado (possivelmente) com sucesso !! </p>'.
            '</div>';
} catch (Exception $e) {
    echo    '<div class="alert alert-danger" > '.
                '<p>'.$e->getMessage().'</p>'.
                '<p>'.$e->getTraceAsString().'</p>'.
            '</div>';
}
    

echo " </div>";

