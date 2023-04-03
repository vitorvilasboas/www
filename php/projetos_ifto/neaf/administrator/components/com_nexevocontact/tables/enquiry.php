<?php defined("_JEXEC") or die('Restricted access');
/* 
 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 :::: Joomla Nexevo Responsive Conact Form             ::::
 :::: Author - Nexevo.in <info@nexevo.in>              ::::
 :::: Copyright (C) 2009 - 2015 Nexevo-Extension       ::::
 :::: license GNU/GPL,for full license                 ::::
 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
*/

//No direct access

class NexevoContactTableEnquiry extends JTable
{
	public function __construct(&$_db)
	{
		parent::__construct("#__nexevocontact_enquiries", "id", $_db);
	}
}