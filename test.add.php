<html>
	<head>
		<meta charset="utf-8" />
	</head>
	<body>
		<form method="post" action="test.add.handle.php">
		    <label for="name">手机号码:</label>
		    <input type="text" id="phone_number" name="phone_number" value="<?php if (!empty($phone_number)) echo $phone_number; ?>" /><br/>
		    <label for="id_card">身份证号:</label>
		    <input type="text" id="id_card" name="id_card" value="<?php if (!empty($id_card)) echo $id_card; ?>" /><br/>
		    <input type="submit" name="submit" value="提交表格" />
		</form>
		<a href="javascript:history.go(-1);">重新订购</a>
	</body>
</html>
