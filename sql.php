
<?php
$search = $_GET["ip"];
$ch = curl_init();
// start url will append a qotation to end url that user enters

$startUrl = "'";
$quearyURL = $search.$startUrl;
if (   $search == null){
    echo"";
} else{



// sending curl requests to host IP
curl_setopt($ch, CURLOPT_URL, $quearyURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
$data = curl_exec($ch);
if($data === FALSE){
	echo "  " . curl_error($ch);

}
}
#keywords found on sqlmap github account: https://github.com/sqlmapproject/sqlmap/blob/afc2a42383c48e7209c3dbff23a5eb05333b485e/xml/errors.xml
//create functions to check for keywords on web page that are common with sql errors
global $mySqlDB;
$mySqlDB = array("SQL",
	"SQL syntax.*?MySQL",
    "Warning.*?mysql_",
    "MySqlException \(0x",
    "valid MySql result",
    "check the manual that corresponds to your (MySQL|MariaDB) server version",
    "MySqlClient",
    "com\.mysql\.jdbc\.exceptions"
);
global $postgreSQLDB;
$postgreSQLDB = array("PostgreSQL.*?ERROR",
	"Warning.*?\Wpg_",
	"valid PostgreSQL result",
	"Npgsql\.",
	"PG::SyntaxError:",
	"org\.postgresql\.util\.PSQLException",
	"ERROR:\s\ssyntax error at or near"
);
global $msSqlServerDB;
$msSqlServerDB = array("Driver.*? SQL[\-\_\ ]*Server",
	"OLE DB.*? SQL Server",
	"\bSQL Server[^&lt;&quot;]+Driver",
	"Warning.*?(mssql|sqlsrv)_",
	"\bSQL Server[^&lt;&quot;]+[0-9a-fA-F]{8}",
	"System\.Data\.SqlClient\.SqlException",
	"(?s)Exception.*?\WRoadhouse\.Cms\.",
	"Microsoft SQL Native Client error '[0-9a-fA-F]{8}",
	"com\.microsoft\.sqlserver\.jdbc\.SQLServerException",
	"ODBC SQL Server Driver",
	"SQLServer JDBC Driver",
	"macromedia\.jdbc\.sqlserver",
	"com\.jnetdirect\.jsql"
);
global $msAccessDB;
$msAccess = array("Microsoft Access (\d+ )?Driver",
	"JET Database Engine",
	"Access Database Engine",
	"ODBC Microsoft Access",
	"Syntax error \(missing operator\) in query expression"
);
global $oracleDB;
$oracleDB = array("\bORA-\d{5}",
	"Oracle error",
	"Oracle.*?Driver",
	"Warning.*?\Woci_",
	"Warning.*?\Wora_",
	"oracle\.jdbc\.driver",
	"quoted string not properly terminated",
	"SQL command not properly ended"
);
global $ibmDB2;
$ibmDB2 = array("CLI Driver.*?DB2",
	"DB2 SQL error",
	"\bdb2_\w+\(",
	"SQLSTATE.+SQLCODE"
);
global $informixDB;
$informixDB = array("Exception.*?Informix",
	"Informix ODBC Driver",
	"com\.informix\.jdbc",
	"weblogic\.jdbc\.informix"
);
global $firebirdDB;
$firebirdDB = array("Dynamic SQL Error",
	"Warning.*?ibase_"
);
global $SQLiteDB;
$SQLiteDB = array("SQLite/JDBCDriver",
	"SQLite\.Exception",
	"(Microsoft|System)\.Data\.SQLite\.SQLiteException",
	"Warning.*?sqlite_",
	"Warning.*?SQLite3::",
	"\[SQLITE_ERROR\]",
	"SQLite error \d+:",
	"sqlite3.OperationalError:"
);
global $SAPMaxDB;
$SAPMaxDB = array("SQL error.*?POS([0-9]+)",
	"Warning.*?maxdb"
);
global $sybaseDB;
$sybaseDB = array("Warning.*?sybase",
	"Sybase message",
	"Sybase.*?Server message",
	"SybSQLException",
	"com\.sybase\.jdbc"
);
global $ingresDB;
$ingresDB = array("Warning.*?ingres_",
	"Ingres SQLSTATE",
	"Ingres\W.*?Driver"
);
global $frontbaseDB;
$frontbaseDB = array("Exception (condition )?\d+\. Transaction rollback",
	"com\.frontbase\.jdbc"
);
global $hsqlDB;
$hsqlDB = array("org\.hsqldb\.jdbc",
	"Unexpected end of command in statement \[",
	"Unexpected token.*?in statement \["
);
function sqlCheck($page, $sqlArray){ // loops through the functions checking to see if keywords appear
	foreach($sqlArray as $elem){
		$result = stripos($page, $elem);
		if($result == false){ // returning nothing if not vulnerable
			echo "";
			break;
			exit;
		}
		else{
			echo  "<p>Page is vulnerable. The DBMS might be: 	".$elem." </></p>\n";
			echo "This webpage has been flagged as SQL Injectable, To prevent from this the following precautions shoukd be taken.";
			echo "<p><li><b>Validating User Input</b></li></p>";
			echo  "<p> - Make sure the value is of the accepted type, length, format, etc.</p>";
			echo "<p><li><b>Using Prepared Statements</b></li></p>";
			echo  "<p> - Prepared statements ensure that an attacker is not able to change the intent of a query, even if SQL commands are inserted by an attacker.If an attacker were to enter the userID of tom' or '1'='1, the parameterized query would not be vulnerable and would instead look for a username which literally matched the entire string tom' or '1'='1.</p>";
			echo "<p><li><b>Stored Procedures</b></li></p>";
			echo  "<p> - Stored Procedures performs the escaping required so that the app treats input as data to be operated on rather than SQL code to be executed.</p>";
			echo "<p><li><b>Updating your system</b></li></p>";
			echo  "<p> - SQL injection vulnerability is a frequent programming error and its discovered regularly, so its vital to apply patches and updates your system to the most up-to-date version as you can, especially for your SQL Server.</p>";
			echo "<p><li><b>Limiting Privelages</b></li></p>";
			echo  "<p> -Dont connect to your database using an account with root access unless required because the attackers might have access to the entire system. Therefore, its best to use an account with limited privileges to limit the scope of damages in case of SQL Injection.</p>";

		}
	}
}
// calling each individual function
sqlCheck($data, $mySqlDB);
sqlCheck($data, $postgreSQLDB);
sqlCheck($data, $msSqlServerDB);
sqlCheck($data, $oracleDB);
sqlCheck($data, $ibmDB2);
sqlCheck($data, $informixDB);
sqlCheck($data, $firebirdDB);
sqlCheck($data, $SQLiteDB);
sqlCheck($data, $SAPMaxDB);
sqlCheck($data, $sybaseDB);
sqlCheck($data, $ingresDB);
sqlCheck($data, $frontbaseDB);
sqlCheck($data, $hsqlDB);
