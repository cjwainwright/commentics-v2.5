<?php
/*
Copyright © 2009-2013 Commentics Development Team [commentics.org]
License: GNU General Public License v3.0
		 http://www.commentics.org/license/

This file is part of Commentics.

Commentics is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Commentics is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Commentics. If not, see <http://www.gnu.org/licenses/>.

Text to help preserve UTF-8 file encoding: 汉语漢語.
*/

/*************************************************************** DIRECT ACCESS **********************************************************/
if (!isset($cmtx_path)) { die('Access Denied.'); }
/****************************************************************************************************************************************/


/*************************************************************** ENVIRONMENT ************************************************************/
@ini_set('default_charset', 'utf-8');
/****************************************************************************************************************************************/


/*************************************************************** PARSING (1/2) **********************************************************/
$cmtx_start_time = microtime(true);
/****************************************************************************************************************************************/


/*************************************************************** VARIABLES (1/2) ********************************************************/
require_once $cmtx_path . 'includes/variables/set_variables.php'; //set variables for page
/****************************************************************************************************************************************/


/*************************************************************** FUNCTIONS **************************************************************/
require_once $cmtx_path . 'includes/bootstrap/functions.php'; //load bootstrap file for functions
/****************************************************************************************************************************************/


/*************************************************************** DATABASE (1/2) *********************************************************/
require_once $cmtx_path . 'includes/db/connect.php'; //connect to database
if ($cmtx_db_ok) { //if database connection okay
/****************************************************************************************************************************************/


/*************************************************************** TIME ZONE **************************************************************/
cmtx_set_time_zone(cmtx_setting('time_zone')); //set the time zone
/****************************************************************************************************************************************/


/*************************************************************** LANGUAGE ***************************************************************/
require_once $cmtx_path . 'includes/bootstrap/language.php'; //load bootstrap file for language
/****************************************************************************************************************************************/


/*************************************************************** ERROR REPORTING ********************************************************/
cmtx_error_reporting($cmtx_path . 'includes/logs/errors.log');
/****************************************************************************************************************************************/


/*************************************************************** ADMIN DETECTION ********************************************************/
$cmtx_is_admin = cmtx_is_administrator(); //detect admin
/****************************************************************************************************************************************/


/*************************************************************** FORM VALUES ************************************************************/
cmtx_load_form_login(); //load login values
cmtx_load_form_defaults(); //load default values
cmtx_load_form_cookie(); //load cookie values
/****************************************************************************************************************************************/


/*************************************************************** MAINTENANCE (1/2) ******************************************************/
if (!cmtx_in_maintenance()) { //if not in maintenance
/****************************************************************************************************************************************/


/*************************************************************** PAGE SETUP *************************************************************/
cmtx_page_setup(); //page setup
/****************************************************************************************************************************************/


/*************************************************************** TEMPLATE (1/2) *********************************************************/
require_once $cmtx_path . 'includes/template/head.php'; //load head template
/****************************************************************************************************************************************/


/*************************************************************** LOAD PROCESSOR *********************************************************/
require_once $cmtx_path . 'includes/app/processor.php'; //load form processor
/****************************************************************************************************************************************/


/*************************************************************** TEMPLATE (2/2) *********************************************************/
require_once $cmtx_path . 'includes/template/main.php'; //load main template
/****************************************************************************************************************************************/


/*************************************************************** VIEWERS ****************************************************************/
cmtx_add_viewer(); //add viewer
/****************************************************************************************************************************************/


/*************************************************************** TASK SYSTEM ************************************************************/
require_once $cmtx_path . 'includes/tasks/tasks.php'; //load task system
/****************************************************************************************************************************************/


/*************************************************************** PARSING (2/2) **********************************************************/
cmtx_parsing($cmtx_start_time); //display parsing
/****************************************************************************************************************************************/


/*************************************************************** MAINTENANCE (2/2) ******************************************************/
} //end of if-not-in-maintenance
/****************************************************************************************************************************************/


/*************************************************************** DATABASE (2/2) *********************************************************/
} //end of is-database-connection-okay
/****************************************************************************************************************************************/


/*************************************************************** VARIABLES (2/2) ********************************************************/
require_once $cmtx_path . 'includes/variables/unset_variables.php'; //unset variables for page
/****************************************************************************************************************************************/
?>