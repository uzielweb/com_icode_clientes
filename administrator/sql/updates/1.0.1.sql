/* Version 1.0.1 - Joomla 6 Compatibility Update */

/* Ensure database structure is up to date for Joomla 6 compatibility */
/* No database schema changes required - this is primarily a code compatibility update */

/* Update component version in case needed */
UPDATE `#__extensions` 
SET `manifest_cache` = REPLACE(`manifest_cache`, '"version":"CVS: 1.0.0"', '"version":"CVS: 1.0.1"')
WHERE `element` = 'com_icode_clientes' AND `type` = 'component';

/* Update plugin version if installed */
UPDATE `#__extensions` 
SET `manifest_cache` = REPLACE(`manifest_cache`, '"version":"CVS: 1.0.0"', '"version":"CVS: 1.0.1"')
WHERE `element` = 'icode_clientesclientes' AND `type` = 'plugin' AND `folder` = 'finder';