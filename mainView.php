<!DOCTYPE html>
<html>
<head>
	<title>在线查询</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>欢迎进入查询页面</h1>
	<form action="wordProcess.php" method="post">
		请输入要查询的英文:<input type="text" name="enword">
		<input type="hidden" name="type" value="search1">
		<input type="submit" value="查询">
	</form>

	<form action="wordProcess.php" method="post">
		请输入要查询的中文:<input type="text" name="chword">
		<input type="hidden" name="type" value="search2">
		<input type="submit" value="查询">
	</form>
</body>
</html>