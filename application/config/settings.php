<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ------------------------------------------------------------
 *   DATABSE SETTINGS
 * ------------------------------------------------------------
 *
 */

$config['hostname']         = 'localhost';
$config['username']         = 'root';
$config['password']         = '';
$config['database']         = 'smartlists';

/*
 *
 */

$config['site_name']        = 'Smart Lists';
$config['site_keywords']    = '';
$config['site_description'] = '';

/* ------------------------------------------------------------
 *   AUTH SYSTEM
 * ------------------------------------------------------------
 *
 */

$config['enable_xss']       = ''; //todo : Implement xss
$config['brute_force']      = ''; //todo : Implement brute_force
$config['check_email']      = FALSE;

/* ------------------------------------------------------------
 *   EMAIL (SMTP) SETTINGS
 * ------------------------------------------------------------
 * All fields are required if you have made it required for
 * users to verify their email address before doing anything.
 *
 */

$config['protocol']         = 'smtp';
$config['smtp_host']        = '';
$config['smtp_port']        = '465';
$config['smtp_user']        = '';
$config['smtp_pass']        = '********';
$config['mailtype']         = 'html';
$config['charset']          = 'iso-8859-1';
$config['wordwrap']         = TRUE;
$config['newline']          = "\r\n";
