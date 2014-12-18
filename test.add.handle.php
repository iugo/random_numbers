<?php

	// 判断填写内容非空
	if (!empty($_POST['phone_number']) && !empty($_POST['id_card'])) {
		// 不进行任何操作, 到下一步.
    }else{
        echo "<script>alert('请填写您的手机号码与身份证号');window.location.href='test.add.php';</script>";
        exit();
    }

    // 判断手机号码是否正确
    if(!preg_match("/^1[34578]\d{9}$/", $_POST['phone_number'])){
		echo "<script>alert('请输入正确的手机号码');window.location.href='test.add.php';</script>";
		exit();
	}

	// 判断身份证号码是否正确
	require_once('id_verify.php');
	if(!$IDCard::isCard($_POST['id_card'])){
		echo "<script>alert('请输入正确的身份证号');window.location.href='test.add.php';</script>";
		exit();
	}

	// 连库操作
	require_once('mysql_connect.php');

    // 将时间函数写得符合 MySQL datetime 类型
    date_default_timezone_set('PRC');
    $date_line =  new mysql_DateTime();
    class mysql_DateTime extends DateTime {
	    public function __toString() {
	        return $this->format('Y-m-d H:i:s');
	    }
	}

	//安全操作, 防止 SQL 注入
	$phone_number = mysqli_real_escape_string($mysql_connect, trim($_POST['phone_number']));
	$id_card = mysqli_real_escape_string($mysql_connect, trim($_POST['id_card']));

	// 生成一个与数据库相关项无匹配的随机数
	$pre_num = mt_rand(0, 99999);
	$select_sql = "SELECT * FROM list WHERE num = '$pre_num'";
	$data = mysqli_query($mysql_connect, $select_sql);
	while (mysqli_num_rows($data) != 0) {
        $pre_num = mt_rand(0, 99999);
		$select_sql = "SELECT * FROM list WHERE num = '$pre_num'";
        $data = mysqli_query($mysql_connect, $select_sql);
    }

    // 插入数据
	$insert_sql = "INSERT INTO list(phone_number, id_card, dateline, num) VALUES('$phone_number', '$id_card', '$date_line', '$pre_num')";
    $query = mysqli_query($mysql_connect, $insert_sql); // 把内容插入数据库

    // 关闭数据库连接
    $mysql_connect->close(); // 原句为 mysqli_close($mysql_connect);

    // 返回成功信息并结束操作
    echo "<script>alert('订购成功, 您的订购码为" . $pre_num . "');window.location.href='test.add.php';</script>";
    exit();

/*
    $data = mysqli_query($mysql_connect, $select_sql);
    if (mysqli_num_rows($data) == 0) { //如果没有匹配项, 就是 (mysqli_num_rows($data) == 0) 为真的时候
        
    } else {
        echo "订购码重复, 请重新订购";
        $pre_num = "";
    }
*/
	// echo $date_line;
	
?>