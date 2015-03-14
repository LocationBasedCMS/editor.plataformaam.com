

DROP TABLE IF EXISTS   `VComUPIAggregationRuleResponseOf`;
DROP TABLE IF EXISTS   `VComUPIAggregationRuleStart`;
DROP TABLE IF EXISTS   `UPIAggregationRuleResponseOf`;
DROP TABLE IF EXISTS   `UPIAggregationRuleStart`;
DROP TABLE IF EXISTS   `UserVComUserRole`;
DROP TABLE IF EXISTS   `VComUserRole`;
DROP TABLE IF EXISTS   `VComBase`;
DROP TABLE IF EXISTS   `VComComposite`;
DROP TABLE IF EXISTS   `User`;
DROP TABLE IF EXISTS   `UPIType`;
DROP TABLE IF EXISTS   `VirtualSpace`;


-- Tabela Espaço Virtual

CREATE TABLE `VirtualSpace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT 'Nome',
  `startLatitude` double NOT NULL COMMENT 'Latitude Inicial',
  `startLongitude` double NOT NULL COMMENT 'Longitude Inicial',
  `stopLatitude` double NOT NULL COMMENT 'Latitude Final',
  `stopLongitude` double NOT NULL COMMENT 'Longitude Final',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;


-- Tabela Tipo de UPI
CREATE TABLE `UPIType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT 'Nome',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL COMMENT 'Login',
  `name` varchar(500) NOT NULL COMMENT 'Nome',
  `email` varchar(500) NOT NULL COMMENT 'E-mail',
  `password` varchar(100) NOT NULL COMMENT 'Senha',
  `isExcluded` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Está Excluído',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Usuários';

CREATE TABLE `VComComposite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT 'Nome',
  `description` text COMMENT 'Descrição',
  `virtualspace` int(11) NOT NULL,
  `vcomcomposite` int(11) DEFAULT NULL,
  `createruser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `virtualspace` (`virtualspace`),
  KEY `vcomcomposite` (`vcomcomposite`),
  KEY `createruser` (`createruser`),
  KEY `createruser_2` (`createruser`),

  CONSTRAINT `VComComposite_ibfk_2` FOREIGN KEY (`virtualspace`) REFERENCES `VirtualSpace` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `VComComposite_ibfk_3` FOREIGN KEY (`vcomcomposite`) REFERENCES `VComComposite` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `VComComposite_ibfk_6` FOREIGN KEY (`createruser`) REFERENCES `User` (`id`) ON DELETE SET NULL ON UPDATE SET NULL

) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;


CREATE TABLE `VComBase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT 'Nome',
  `description` text NOT NULL COMMENT 'Descrição',
  `vcomcomposite` int(11) NOT NULL COMMENT 'Composição Pai',
  `virtualspace` int(11) NOT NULL COMMENT 'Espaço Virtual',
  PRIMARY KEY (`id`),
  KEY `vcomcomposite` (`vcomcomposite`),
  KEY `virtualspace` (`virtualspace`),

  CONSTRAINT `VComBase_ibfk_1` FOREIGN KEY (`vcomcomposite`) REFERENCES `VComComposite` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `VComBase_ibfk_2` FOREIGN KEY (`virtualspace`) REFERENCES `VirtualSpace` (`id`) ON UPDATE CASCADE

) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8  ;


CREATE TABLE `VComUserRole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vcomcomposite` int(11) NOT NULL DEFAULT '1' COMMENT 'Composição que o papel Pertence',
  `name` varchar(100) NOT NULL COMMENT 'Nome do Papel do Usuário',
  `allowedEditVComAggregationRule` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Permissão para editar as regras de agregação.',
  `allowedEditVCom` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Permissões para Alterações na Composição e nas Bases do VCom',
  `isClientDefault` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Automaticamente selecionado pelo cliente',
  `isClientSelectable` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Disponível para ser selecionado pelo Usuário do Cliente.',
  `allowedAccessPedagogicalPanel` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Acesso ao painel pedagógico',
  `allowedAccessOnlineMap` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Acesso ao mapa online',
  PRIMARY KEY (`id`),
  KEY `vcomcomposite` (`vcomcomposite`),
  CONSTRAINT `VComUserRole_ibfk_1` FOREIGN KEY (`vcomcomposite`) REFERENCES `VComComposite` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='Papeis de Usuários no VCom' ;


CREATE TABLE `UserVComUserRole` (
  `user` int(11) NOT NULL,
  `vcomuserrole` int(11) NOT NULL,
  PRIMARY KEY (`user`,`vcomuserrole`),
  KEY `vcomuserrole` (`vcomuserrole`),

  CONSTRAINT `UserVComUserRole_ibfk_1` FOREIGN KEY (`user`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `UserVComUserRole_ibfk_2` FOREIGN KEY (`vcomuserrole`) REFERENCES `VComUserRole` (`id`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `UPIAggregationRuleStart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vcombase` int(11) NOT NULL COMMENT 'Base:',
  `upitype` int(11) NOT NULL COMMENT 'Tipo',
  `name` varchar(100) NOT NULL COMMENT 'Nome',
  `description` text COMMENT 'Descrição',
  `requirePositionToCreate` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Exigir posição para criar',
  `requirePositionToView` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Exigir posição para visualizar',
  `visibleDistance` int(11) NOT NULL COMMENT 'Distância para Visibilidade',
  `republisAllowed` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Permitir Republicação',
  `isSingleton` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Raiz Única (Singleton)',

  PRIMARY KEY (`id`),
  KEY `vcombase` (`vcombase`),
  KEY `upitype` (`upitype`),
  CONSTRAINT `UPIAggregationRuleStart_ibfk_1` FOREIGN KEY (`vcombase`) REFERENCES `VComBase` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `UPIAggregationRuleStart_ibfk_2` FOREIGN KEY (`upitype`) REFERENCES `UPIType` (`id`)

) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;


 CREATE TABLE `UPIAggregationRuleResponseOf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upiaggregationrulestart` int(11) NOT NULL COMMENT 'Tipo de resposta a regra inicial',
  `upitype` int(11) NOT NULL COMMENT 'Tipo de UPI da Resposta',
  `name` varchar(100) NOT NULL COMMENT 'Nome',
  `requirePositionToResponse` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Requer posicionamento na Base para Responder',
  `requirePositionToView` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Requer presença na base para visualizar.',
  `republisAllowed` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Permite a republicação de seu conteúdo por Terceiros.',
  `aceptMultiple` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Aceita estrutura de Árvore.',
  PRIMARY KEY (`id`),
  KEY `UPIAggregationRuleStart` (`upiaggregationrulestart`),
  KEY `upitype` (`upitype`),

  CONSTRAINT `UPIAggregationRuleResponseOf_ibfk_1` FOREIGN KEY (`UPIAggregationRuleStart`) REFERENCES `UPIAggregationRuleStart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `UPIAggregationRuleResponseOf_ibfk_2` FOREIGN KEY (`upitype`) REFERENCES `UPIType` (`id`) ON UPDATE CASCADE


) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

CREATE TABLE `VComUPIAggregationRuleStart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vcomuserrole` int(11) NOT NULL COMMENT 'Define a qual papel esta regra pertence',
  `upiaggregationrulestart` int(11) NOT NULL COMMENT 'Define a qual regra de agregação se aplica',
  `allowedRead` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Define se o papel visualizará criações sobre esta regra',
  `allowedWrite` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Define se o papel poderá criar sobre esta regra.',
  PRIMARY KEY (`id`),
  KEY `upiaggregationrulestart` (`upiaggregationrulestart`),
  KEY `vcomuserrole` (`vcomuserrole`),
  CONSTRAINT `VComUPIAggregationRuleStart_ibfk_2` FOREIGN KEY (`upiaggregationrulestart`) REFERENCES `UPIAggregationRuleStart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `VComUPIAggregationRuleStart_ibfk_3` FOREIGN KEY (`vcomuserrole`) REFERENCES `VComUserRole` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

CREATE TABLE `VComUPIAggregationRuleResponseOf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vcomuserole` int(11) NOT NULL COMMENT 'Define a qual papel esta regra pertence',
  `upiaggregationruleresponseof` int(11) NOT NULL COMMENT 'Define a qual regra de agregação se aplica',
  `allowedRead` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Define se o papel pode ler os Objetos regidos sobre a regra.',
  `allowedWrite` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Define se o papel pode responder a objetos regidos por esta regras',
  PRIMARY KEY (`id`),
  KEY `upiaggregationruleresponseof` (`upiaggregationruleresponseof`),
  KEY `vcomuserole` (`vcomuserole`),
  CONSTRAINT `VComUPIAggregationRuleResponseOf_ibfk_1` FOREIGN KEY (`upiaggregationruleresponseof`) REFERENCES `UPIAggregationRuleResponseOf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `VComUPIAggregationRuleResponseOf_ibfk_2` FOREIGN KEY (`vcomuserole`) REFERENCES `VComUserRole` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/******************************************
* CARGA DE DADOS BÁSICOS
******************************************/

INSERT INTO `VirtualSpace` (`id`, `name`, `startLatitude`, `startLongitude`, `stopLatitude`, `stopLongitude`) VALUES
(1, 'Planeta Terra', -90, -180, 90, 180),
(2, 'Hemisfério SUL', 0, -180, -90, 180);

INSERT INTO `UPIType` (`id`, `name`) VALUES
(1, 'UPIText'),
(2, 'UPIImage'),
(3, 'UPIVideo'),
(4, 'UPIAudio');

INSERT INTO `User` (`id`, `login`, `name`, `email`, `password`, `isExcluded`) VALUES
(1, 'root', 'Administrador do Sistema', 'bernard.pereira@dataprev.gov.br', 'qw', 0),
(2, 'bernauuudo', 'Bernard Corrêa Pereira', 'bernauuudo@yahoo.com.br', 'qw', 0);

INSERT INTO `VComComposite` (`id`, `name`, `description`, `virtualspace`, `vcomcomposite`, `createruser`) VALUES
(1, 'RAIZ', 'Composição base de toda a estrutura.', 1, 1, 1);






