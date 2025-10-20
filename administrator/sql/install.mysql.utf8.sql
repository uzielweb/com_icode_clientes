CREATE TABLE IF NOT EXISTS `#__icode_clientes` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`state` TINYINT(1)  NULL  DEFAULT 1,
`ordering` INT(11)  NULL  DEFAULT 0,
`checked_out` INT(11)  UNSIGNED,
`checked_out_time` DATETIME NULL  DEFAULT NULL ,
`created_by` INT(11)  NULL  DEFAULT 0,
`modified_by` INT(11)  NULL  DEFAULT 0,
`created_at` DATETIME NULL  DEFAULT NULL ,
`modified_at` DATETIME NULL  DEFAULT NULL ,
`alias` VARCHAR(255) COLLATE utf8_bin NULL ,
`destaque` TINYINT(1)  NULL  DEFAULT 0,
`nome` VARCHAR(255)  NOT NULL ,
`imagem` TEXT NOT NULL ,
PRIMARY KEY (`id`)
,KEY `idx_state` (`state`)
,KEY `idx_checked_out` (`checked_out`)
,KEY `idx_created_by` (`created_by`)
,KEY `idx_modified_by` (`modified_by`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;

CREATE INDEX `#__icode_clientes_created_at` ON `#__icode_clientes`(`created_at`);

CREATE INDEX `#__icode_clientes_destaque` ON `#__icode_clientes`(`destaque`);

CREATE INDEX `#__icode_clientes_nome` ON `#__icode_clientes`(`nome`);


INSERT INTO `#__content_types` (`type_title`, `type_alias`, `table`, `rules`, `field_mappings`, `content_history_options`)
SELECT * FROM ( SELECT 'Cliente','com_icode_clientes.cliente','{"special":{"dbtable":"#__icode_clientes","key":"id","type":"ClienteTable","prefix":"Joomla\\\\Component\\\\Icode_clientes\\\\Administrator\\\\Table\\\\"}}', CASE 
                                    WHEN 'rules' is null THEN ''
                                    ELSE ''
                                    END as rules, CASE 
                                    WHEN 'field_mappings' is null THEN ''
                                    ELSE ''
                                    END as field_mappings, '{"formFile":"administrator\/components\/com_icode_clientes\/forms\/cliente.xml", "hideFields":["checked_out","checked_out_time","params","language"], "ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"group_id","targetTable":"#__usergroups","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}') AS tmp
WHERE NOT EXISTS (
	SELECT type_alias FROM `#__content_types` WHERE (`type_alias` = 'com_icode_clientes.cliente')
) LIMIT 1;
