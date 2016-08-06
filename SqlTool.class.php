<?php 

	class SqlTool{
		private $conn;
		private $host = "localhost";
		private $user = "root";
		private $password = "111333aaa";
		private $db = "worddb";

		function SqlTool() {
			$this->conn = mysql_connect($this->host, $this->user,$this->password);	//打开一个到 MySQL 服务器的连接
			if (!$this->conn) {
				die("连接失败".mysql_error());
			}

			mysql_select_db($this->db,$this->conn);		//选择 MySQL 数据库
			mysql_query("set names utf8");		//发送一条 MySQL 查询,设置操作编码
		}

		//完成select
		public function exeute_dql($sql) {

			$res = mysql_query($sql) or die(mysql_error());		//mysql_query()向与指定的连接标识符关联的服务器中的当前活动数据库发送一条查询
			return $res;

		}

		//完成delete/update/insert/create/drop
		public function exeute_dml($sql) {
			$b = mysql_query($sql, $this->conn) or die(mysql_error());
			if (!$b) {
				return 0; //失败
			} else {
				if (mysql_affected_rows($this->conn) > 0) {
					return 1; //表示成功
				} else {

					return 2; //表示没有行数影响
				}
			}
		}
	}

 ?>