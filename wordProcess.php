<?php 

	require_once "SqlTool.class.php";
	header("utf-8");

	//接收type
	if(isset($_POST['type'])) {
		$type = $_POST['type'];
	} else {
		echo "输入为空";
		echo "<a href = 'mainView.php'>返回重新查询</a>";
	}


	if($type == "search1")  {
		//接收英文单词
		if (isset($_POST['enword'])) {
			$en_word = $_POST["enword"];
			//var_dump($en_word);
		} else {
			echo "输入为空";
			echo "<a href = 'mainView.php'>返回重新查询</a>";
		}

		//查看数据库有没有记录
		//用什么查什么
		$sql = "select chword from words  where enword = '$en_word' limit 0,1";	//查找到就返回
		//设计表
		//查询（面向对象）
		$sqlTool = new SqlTool();

		$res = $sqlTool->exeute_dql($sql);

		/*if ($row = mysql_fetch_row($res)) {

			echo $en_word."对应的中文意思是--".$row[0];*/

		if ($row = mysql_fetch_assoc($res)) {
			echo $en_word."对应的中文意思是--".$row['chword'];

		} else {
			echo "查询没有该词条";
		}
	} else if ($type == "search2") {
		//接收英文单词
		if (isset($_POST['chword'])) {
			$ch_word = $_POST["chword"];
			//var_dump($en_word);
		} else {
			echo "输入为空";
			echo "<a href = 'mainView.php'>返回重新查询</a>";
		}

		//查看数据库有没有记录
		//用什么查什么
		$sql = "select enword from words  where chword like '%".$ch_word."%'";	//查找到就返回
		//设计表
		//查询（面向对象）
		$sqlTool = new SqlTool();

		$res = $sqlTool->exeute_dql($sql);

		if (mysql_num_rows($res) > 0) {

			while ($row = mysql_fetch_assoc($res)) {
					echo $ch_word."对应的英文意思是--".$row['enword']."<br />";
				} 
		} else {
			echo "查询没有该词条";
		}
	}

	echo "<br /><a href='mainView.php'>返回重新查询</a>";
	mysql_free_result($res);
 ?>