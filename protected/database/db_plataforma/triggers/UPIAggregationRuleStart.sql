delimiter $$

DROP TRIGGER IF EXISTS after_insert_UPIAGGREGATIONRULESTART $$
CREATE TRIGGER after_insert_UPIAGGREGATIONRULESTART AFTER INSERT ON UPIAggregationRuleStart
FOR EACH ROW
BEGIN

   INSERT INTO VComUPIAggregationRuleStart    (   
            vcomuserrole, 
            upiaggregationrulestart, 
            allowedRead, 
            allowedWrite 
        )
        SELECT      
            VComUserRole.id, 
            NEW.id , 
            1, 
            1  
        FROM        VComUserRole,  VComComposite, VComBase 
        WHERE       
                VComComposite.id  = VComUserRole.vcomcomposite 
                AND VComComposite.id = VComBase.vcomcomposite 
                AND VComBase.id = NEW.vcombase; 

END;
$$
delimiter ;

