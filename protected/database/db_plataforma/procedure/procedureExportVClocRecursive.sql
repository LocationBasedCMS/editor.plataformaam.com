


DROP PROCEDURE IF EXISTS  db_plataforma.procedureExportVCLocRecursive;
DELIMITER //




CREATE  PROCEDURE db_plataforma.procedureExportVCLocRecursive (
    IN _id INT(11) , 
    IN _depth  INT (11) 
)


BEGIN
    DECLARE _passagem  INT;
    
    IF _depth > 0 
    THEN
        SET _passagem = _depth -1 ;

        INSERT IGNORE  INTO  db_central.VirtualSpace
        SELECT * FROM db_plataforma.VirtualSpace VS WHERE VS.id IN ( 
                SELECT virtualspace FROM  db_plataforma.VComComposite VC WHERE  VC.id = _id
                UNION
                SELECT virtualspace FROM  db_plataforma.VComBase VB WHERE  VB.vcomcomposite = _id
        );


        INSERT IGNORE  INTO  db_central.VComComposite
        SELECT * FROM  db_plataforma.VComComposite VC WHERE  VC.id =  _id ;



        INSERT IGNORE  INTO  db_central.VComBase
        SELECT * FROM db_plataforma.VComBase VB WHERE VB.vcomcomposite = _id ;



        INSERT IGNORE  INTO  db_central.UPIAggregationRuleStart
        SELECT * FROM db_plataforma.UPIAggregationRuleStart RP 
        WHERE RP.vcombase IN 
            (   SELECT VB.id FROM db_plataforma.VComBase VB 
                WHERE VB.vcomcomposite =  _id );



        INSERT IGNORE  INTO  db_central.UPIAggregationRuleResponseOf
        SELECT * FROM db_plataforma.UPIAggregationRuleResponseOf RR
        WHERE RR.upiaggregationrulestart IN
            (   SELECT RP.id FROM db_plataforma.UPIAggregationRuleStart RP 
                WHERE RP.vcombase IN 
                (   SELECT VB.id FROM db_plataforma.VComBase VB 
                    WHERE VB.vcomcomposite = _id ));


        INSERT IGNORE  INTO  db_central.VComUserRole
        SELECT * FROM db_plataforma.VComUserRole VUR WHERE VUR.vcomcomposite = _id ;

        INSERT IGNORE  INTO  db_central. VComUPIAggregationRuleStart
        SELECT * FROM  db_plataforma.VComUPIAggregationRuleStart PRP
        WHERE PRP.vcomuserrole IN ( 
            SELECT id FROM db_plataforma.VComUserRole VUR WHERE VUR.vcomcomposite = _id );


        INSERT IGNORE  INTO  db_central.VComUPIAggregationRuleResponseOf
        SELECT * FROM db_plataforma.VComUPIAggregationRuleResponseOf PRR
        WHERE  PRR.vcomuserole IN ( 
            SELECT id FROM db_plataforma.VComUserRole VUR WHERE VUR.vcomcomposite = _id );


        INSERT IGNORE  INTO  db_central.UserVComUserRole
        SELECT * FROM db_plataforma.UserVComUserRole UUR
        WHERE  UUR.vcomuserrole IN ( 
            SELECT id FROM db_plataforma.VComUserRole VUR WHERE VUR.vcomcomposite = _id );

        
        
    END IF;


    
END //

DELIMITER ;

