-- Extension specific tables
DROP TABLE IF EXISTS `#__nexevocontact_settings`;

-- Assets
DELETE FROM `#__assets` WHERE `name` = 'com_nexevocontact';

-- Installed extension
DELETE FROM `#__extensions` WHERE `element` = 'com_nexevocontact';

-- Installed modules
DELETE FROM `#__extensions` WHERE `element` = 'mod_nexevocontact';

-- Administrator menu item and Site menu items
DELETE FROM `#__menu` WHERE `link` LIKE '%com_nexevocontact%';

-- Site modules
DELETE FROM `#__modules` WHERE `module` = 'mod_nexevocontact';

-- Joomla auto updater
DELETE FROM `#__update_sites` WHERE `name` LIKE '%nexevocontact%';

