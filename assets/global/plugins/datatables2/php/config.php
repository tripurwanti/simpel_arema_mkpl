<?php if (!defined('DATATABLES')) exit(); // Ensure being used in DataTables env.

// Enable error reporting for debugging (remove for production)
error_reporting(E_ALL);
ini_set('display_errors', '1');


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Database user / pass
 */
$sql_details = array(
	"type" => "Oracle",  // Database type: "Mysql", "Postgres", "Sqlite" or "Sqlserver"
	"user" => "moni_plg",       // Database user name
	"pass" => "plnmalang",       // Database password
	"host" => "localhost",       // Database host
	"port" => "1521",       // Database connection port (can be left empty for default)
	"db"   => "",       // Database name
	"dsn"  => "oci8"        // PHP DSN extra information. Set as `charset=utf8` if you are using MySQL
);


