<?php
var_dump(123);
die();
	//header("Content-Type:application/json; charset=UTF-8");
	//配置文件
	define("DBServer", "localhost");		//数据库所在IP地址
	define("DBUser", "sa");					//数据库登录名	sa
	define("DBPassword", "cai83114");		//数据库登录密码	cai83114
	define("DBName", "GPS");				//要使用的数据库名称
	
	//tUser
	//id = 1
	//name = test
	//password = test
	//MSSQL 中文转化 iconv('gb2312','utf-8', $resultArray['title'])
	
	//通用初始化操作
	function initialize() {
		header("Content-Type:application/json; charset=UTF-8");
	}
	
	//连接数据库并选择数据库
	function connectDatabase() {
		$conn = sqlsrv_connect(DBServer, array( "Database"=>DBName, "UID"=>DBUser, "PWD"=>DBPassword));
		return $conn;
	}
	
	//关闭数据库操作
	function closeDatabase($conn) {
		sqlsrv_close($conn);
	}
	
	//释放记录集资源
	function freeResult($result) {
		//mssql_free_result($result);
	}
	
	//执行查询语句
	//tCar, tUser, tSuperVision
	function executeQuery($sql) {
		global $conn;
		return sqlsrv_query($conn, $sql);
	}
	
	//执行SQL语句
	function executeSQL($sql) {
		global $conn;
		sqlsrv_query($conn, $sql);
	}
	
	//展开记录集
	function fetchArray($result) {
		return sqlsrv_fetch_array($result);
	}
	
	//获取记录集的记录个数
	function getResultCount($result) {
		return sqlsrv_num_rows($result);
	}
?>