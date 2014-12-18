<?php

/** 
 * 这个文件来自网络分享, 所有权未知 
 */

$IDCard = new IDCard(); 
// 查看值和类型 var_dump($IDCard::isCard($_POST['id_card']));

/** 
 * 身份证处理类 
 */
class IDCard { 
  
    //检证身份证是否正确 
    public static function isCard($card) { 
        $card = self::to18Card($card); 
        if (strlen($card) != 18) { 
            return false; 
        } 
  
        $cardBase = substr($card, 0, 17); 
  
        return (self::getVerifyNum($cardBase) == strtoupper(substr($card, 17, 1))); 
    } 
  
  
    //格式化15位身份证号码为18位 
    public static function to18Card($card) { 
        $card = trim($card); 
  
        if (strlen($card) == 18) { 
            return $card; 
        } 
  
        if (strlen($card) != 15) { 
            return false; 
        } 
  
        // 如果身份证顺序码是996 997 998 999，这些是为百岁以上老人的特殊编码 
        if (array_search(substr($card, 12, 3), array('996', '997', '998', '999')) !== false) { 
            $card = substr($card, 0, 6) . '18' . substr($card, 6, 9); 
        } else { 
            $card = substr($card, 0, 6) . '19' . substr($card, 6, 9); 
        } 
        $card = $card . self::getVerifyNum($card); 
        return $card; 
    } 
  
    // 计算身份证校验码，根据国家标准gb 11643-1999 
    private static function getVerifyNum($cardBase) { 
        if (strlen($cardBase) != 17) { 
            return false; 
        } 
        // 加权因子 
        $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2); 
  
        // 校验码对应值 
        $verify_number_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2'); 
  
        $checksum = 0; 
        for ($i = 0; $i < strlen($cardBase); $i++) { 
            $checksum += substr($cardBase, $i, 1) * $factor[$i]; 
        } 
  
        $mod = $checksum % 11; 
        $verify_number = $verify_number_list[$mod]; 
  
        return $verify_number; 
    }

} 


















/*
	$pre_num = mt_rand(1, 9);
	require_once('mysql_connect.php');
	$select_sql = "SELECT * FROM list WHERE id = '$pre_num'";
	$data = mysqli_query($mysql_connect, $select_sql);
	while (mysqli_num_rows($data) != 0) {
        $pre_num = mt_rand(1, 9);
		$select_sql = "SELECT * FROM list WHERE id = '$pre_num'";
        $data = mysqli_query($mysql_connect, $select_sql);
    }
    echo $pre_num;



    $mobile = 8989273817;
    if(!preg_match("/^1[34578]\d{9}$/", $mobile)){
		echo '错误';//这里有无限想象
	}
	echo $mobile;
*/



/*
	$x = mt_rand(1, 6); 

	while($x<=5) { //如果 $x<=5 是真的则执行, 如果 $x 被取值为 6 则不再执行
	  echo "这个数字是：$x <br>";
	  $x = mt_rand(1, 6);
	} 

	echo "这个数字是：$x <br>";
*/
?>
