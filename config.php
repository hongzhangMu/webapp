<?php
var_dump(123);
die();
	//header("Content-Type:application/json; charset=UTF-8");
	//�����ļ�
	define("DBServer", "localhost");		//���ݿ�����IP��ַ
	define("DBUser", "sa");					//���ݿ��¼��	sa
	define("DBPassword", "cai83114");		//���ݿ��¼����	cai83114
	define("DBName", "GPS");				//Ҫʹ�õ����ݿ�����
	
	//tUser
	//id = 1
	//name = test
	//password = test
	//MSSQL ����ת�� iconv('gb2312','utf-8', $resultArray['title'])
	
	//ͨ�ó�ʼ������
	function initialize() {
		header("Content-Type:application/json; charset=UTF-8");
	}
	
	//�������ݿⲢѡ�����ݿ�
	function connectDatabase() {
		$conn = sqlsrv_connect(DBServer, array( "Database"=>DBName, "UID"=>DBUser, "PWD"=>DBPassword));
		return $conn;
	}
	
	//�ر����ݿ����
	function closeDatabase($conn) {
		sqlsrv_close($conn);
	}
	
	//�ͷż�¼����Դ
	function freeResult($result) {
		//mssql_free_result($result);
	}
	
	//ִ�в�ѯ���
	//tCar, tUser, tSuperVision
	function executeQuery($sql) {
		global $conn;
		return sqlsrv_query($conn, $sql);
	}
	
	//ִ��SQL���
	function executeSQL($sql) {
		global $conn;
		sqlsrv_query($conn, $sql);
	}
	
	//չ����¼��
	function fetchArray($result) {
		return sqlsrv_fetch_array($result);
	}
	
	//��ȡ��¼���ļ�¼����
	function getResultCount($result) {
		return sqlsrv_num_rows($result);
	}
?>