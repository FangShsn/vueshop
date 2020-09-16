<?php
//定义文字
 header("content-type:text/html;charset=utf-8"); 
 
 echo "我是删除页面";
 echo "<br>";
 
 //获取id 
 $id=$_GET["id"];
 print_r($id);
  echo "<br>";
 
//连接数据库
$connect=mysqli_connect("127.0.0.1","root","root","fsdata");
//print_r($connect);

//判断数据连接是否成功
if(!$connect){
	exit("连接数据库失败");
}

//删除数据库
$sql="delete from fangshan where id=".$id;
//print_r($sql);
 echo "<br>";

//查询数据库
$query=mysqli_query($connect,$sql);
print_r($query);
 echo "<br>";

if(!$query){
	exit("删除数据失败1");
}


//查看受影响的行数
$affects=mysqli_affected_rows($connect);
//print_r($affects);


//判断受影响的行数
if($affects<1){
	exit("删除数据失败2");
}

//跳转到首页
header("Location:./myindex.php");



?>


 




