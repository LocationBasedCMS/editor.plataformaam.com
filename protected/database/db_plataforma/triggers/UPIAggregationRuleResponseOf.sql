delimiter $$

DROP TRIGGER IF EXISTS after_insert_UPIAGGREGATIONRULERESPONSEOF $$
CREATE TRIGGER after_insert_UPIAGGREGATIONRULERESPONSEOF AFTER INSERT ON UPIAggregationRuleResponseOf
FOR EACH ROW
BEGIN

    INSERT INTO VComUPIAggregationRuleResponseOf (
        vcomuserole, 
       upiaggregationruleresponseof, 
       allowedRead, 
       allowedWrite 
    )
    SELECT  
        VComUserRole.id, 
        NEW.id , 
        1, 
        1  
    FROM        VComUserRole,  VComComposite, VComBase,  UPIAggregationRuleStart
    WHERE       
                    VComComposite.id  = VComUserRole.vcomcomposite 
            AND     VComComposite.id = VComBase.vcomcomposite 
            AND     VComBase.id = UPIAggregationRuleStart.vcombase              
            AND     UPIAggregationRuleStart.id =  NEW.upiaggregationrulestart             ; 
END;
$$
delimiter ;


