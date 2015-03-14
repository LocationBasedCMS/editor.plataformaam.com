delimiter $$
DROP TRIGGER IF EXISTS after_insert_VCOMCOMPOSITE $$
CREATE TRIGGER after_insert_VCOMCOMPOSITE AFTER INSERT ON VComComposite
    FOR EACH ROW
    BEGIN
   

        -- CRIA O ADMINISTRADOR PARA A RAIZ DO VCOM SOMENTE
       --  IF (  NEW.vcomcomposite = 1  )  OR ( NEW.vcomcomposite IS NULL  ) THEN

            -- CRIA O PAPEL DO ADMINISTRADOR DA COMPOSICAO
            -- CRIA O USUÀRIO PADRAO
            INSERT VComUserRole(
                vcomcomposite,
                `name`,
                allowedEditVComAggregationRule,
                allowedEditVCom,
                isClientDefault,	
                isClientSelectable,
                allowedAccessPedagogicalPanel,
                allowedAccessOnlineMap
            )
            VALUES
            (
                NEW.id,
                CONCAT( 'Administrador :',  NEW.`name` ),
                1,
                1,
                0,
                0,
                1,
                1
            ); 

            INSERT VComUserRole(
                vcomcomposite,
                `name`,
                allowedEditVComAggregationRule,
                allowedEditVCom,
                isClientDefault,	
                isClientSelectable,
                allowedAccessPedagogicalPanel,
                allowedAccessOnlineMap
            )
            VALUES            
            (
                NEW.id,
                CONCAT( 'Usuário Padrão :',  NEW.`name` ),
                0,
                0,
                1,
                1,
                0,
                0
            );

            -- ASSOCIA ESTE PAPEL AO USUÀRIO SETADO COMO PROPRIETÀRIO
            INSERT UserVComUserRole ( `user`, vcomuserrole   ) 
            SELECT NEW.createruser, id FROM VComUserRole WHERE vcomcomposite = NEW.id ;

    -- END IF; 
END;
$$
delimiter ;


