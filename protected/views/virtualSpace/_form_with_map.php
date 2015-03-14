<style>
  div#map {
    position: relative;
  }
  div#crosshair {
    position: absolute;
/*
     the top will be half of the width of the map
     less 50% of its size more or less
     to center the image correctly on the map
*/
    top: 192px;
    height: 19px;
    width: 19px;
    left: 50%;
    margin-left: -8px;
    display: block;
/* we are going to borrow a crosshair gif from google */
    background: url(http://gmaps-samples-v3.googlecode.com/svn/trunk/geocoder/crosshair.gif);
    background-position: center center;
    background-repeat: no-repeat;
}
</style>
<script type="text/javascript">
    
  function setStartLatLngToClass(aLatitude,aLongitude){
    if(document.getElementById('VirtualSpace_startLatitude'))
        document.getElementById('VirtualSpace_startLatitude').value = aLatitude;
    if(document.getElementById('VirtualSpace_startLongitude'))
        document.getElementById('VirtualSpace_startLongitude').value = aLongitude;
  }

  function setStopLatLngToClass(aLatitude,aLongitude){
    if(document.getElementById('VirtualSpace_stopLatitude'))
        document.getElementById('VirtualSpace_stopLatitude').value = aLatitude;
    if(document.getElementById('VirtualSpace_stopLongitude'))
        document.getElementById('VirtualSpace_stopLongitude').value = aLongitude;
  }


    // 
  // function to get the latitude and longitude
  // and place them on the test fields
  function setLatLngToClass(){
    if(document.getElementById('test_latitude'))
        document.getElementById('test_latitude').value = map.getCenter().lat();
    if(document.getElementById('test_longitude'))
        document.getElementById('test_longitude').value = map.getCenter().lng();
  }
  //
  // function to get Centered Latitude and Longitude points
  function getCenterLatLngText() {
    return '(' + map.getCenter().lat() +', '+ map.getCenter().lng() +')';
  }
  //
  // function to call when the center of the map
  // has changed. Center information will be
  // collected and displayed on the document
  // elements
  function centerChanged() {
    centerChangedLast = new Date();
    var latlng = getCenterLatLngText();
    document.getElementById('latlng').innerHTML = latlng;
    document.getElementById('formatedAddress').innerHTML = '';

  }
  
  
  
 //
</script>
<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'virtual-space-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
        <div class="row-fluid">
            <div class="span4">
                    <div class="row">
                    <?php echo $form->labelEx($model,'name'); ?>
                    <?php echo $form->textField($model, 'name', array('maxlength' => 100)); ?>
                    <?php echo $form->error($model,'name'); ?>
                    </div><!-- row -->
                    <div class="row">
                    <?php echo $form->labelEx($model,'startLatitude'); ?>
                    <?php echo $form->textField($model, 'startLatitude'); ?>
                    <?php echo $form->error($model,'startLatitude'); ?>
                    </div><!-- row -->
                    <div class="row">
                    <?php echo $form->labelEx($model,'startLongitude'); ?>
                    <?php echo $form->textField($model, 'startLongitude'); ?>
                    <?php echo $form->error($model,'startLongitude'); ?>
                    </div><!-- row -->
                    <div class="row">
                    <?php echo $form->labelEx($model,'stopLatitude'); ?>
                    <?php echo $form->textField($model, 'stopLatitude'); ?>
                    <?php echo $form->error($model,'stopLatitude'); ?>
                    </div><!-- row -->
                    <div class="row">
                    <?php echo $form->labelEx($model,'stopLongitude'); ?>
                    <?php echo $form->textField($model, 'stopLongitude'); ?>
                    <?php echo $form->error($model,'stopLongitude'); ?>
                    </div><!-- row -->
            </div>                
            <div class="span6">
                 <div id="map">
                    <div id="map_canvas" style="width:100%; height:400px"></div>
                    <div id="crosshair"></div>
                </div>                
                <?php 
                Yii::import('application.extensions.EGMap.*');



                $gMap = new EGMap();
                $gMap->setJsName('virtual_space_map');
                $gMap->width = '100%';
                $gMap->height = 300;
                $gMap->zoom = 10;
                $gMap->setCenter(
                        ( $model->__get('startLatitude') + $model->__get('stopLatitude') )/2 ,
                        ( $model->__get('startLongitude') + $model->__get('stopLongitude'))/2 );

                //Adicionando as Marcas
                //MARCADOR INICIAL
                $dragendStartLatitude = new EGMapEvent('dragend', "function (event) { 
                                           setStartLatLngToClass(event.latLng.lat(),event.latLng.lng());
                                        }", false, EGMapEvent::TYPE_EVENT_DEFAULT);
                $markerStartCoord = new EGMapMarker(
                        $model->__get('startLatitude'),$model->__get('startLongitude'), 
                        array('title' => '(Strat) Canto  Inferior Esquerdo','draggable'=>true),
                        'markerStartCoord',
                            array('dragendStartLatitude'=>$dragendStartLatitude) );
                $gMap->addMarker($markerStartCoord);
                
                //CORDENADA FINAL
                $dragendStopLatitude = new EGMapEvent('dragend', "function (event) { 
                                           setStopLatLngToClass(event.latLng.lat(),event.latLng.lng());
                                        }", false, EGMapEvent::TYPE_EVENT_DEFAULT);
                $markerStopCoord = new EGMapMarker(
                        $model->__get('stopLatitude'),$model->__get('stopLongitude'), 
                        array('title' => '(Stop) Canto Superior Direito','draggable'=>true, ),
                        'markerStopCoord',
                            array('dragendStopLatitude'=>$dragendStopLatitude) );
                $gMap->addMarker($markerStopCoord);
                
                
                $gMap->addEvent(
                     new EGMapEvent(
                             'zoom_changed',
                             'document.getElementById("zoom_level").innerHTML = map.getZoom();'));
                $gMap->addEvent(new EGMapEvent('center_changed','centerChanged',false));
                $gEvent = new EGMapEvent('dblclick','map.setZoom(map.getZoom() +1)');
                
                
                
                $gMap->appendMapTo('#map_canvas');
                $gMap->renderMap(array(
                     'initStartCoords' => 'new google.maps.LatLng('.$model->__get('startLatitude').','.$model->__get('startLongitude').');',
                    /* 
                    'markerStartCoord' => 'new google.maps.Marker({ 
                            position: initStartCoords,
                            draggable: true,
                            title: "Coordenadas Iniciais ",
                            map: virtual_space_map
                        })',
                    */
                    
                    
                    
                    
                    
                ));
                
                
                $gMap->renderMap();    
            ?>   

            </div>
        </div>
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->
<hr />