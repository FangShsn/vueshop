<?php  
header("content-type:text/html;charset=utf-8");


echo "我是删除页面";
echo  "<br>";

//链接数据库
$connect=mysqli_connect("127.0.0.1","root","root","datafang");

//判断连接是否成功
if(!$connect){
    exit("连接数据库失败");
}



//获取动态id
 $id=$GLOBALS["_GET"];
 //print_r($id);
 echo "<br>";
print_r($id["id"]);
echo "<br>";






//查询数据库
$sql="delete from fangtable where id=".$id["id"];

$query=mysqli_query($connect,$sql);
print_r($query);

if(!$query){
   exit("删除数据失败1");
}

//查看删除数据是否成功
$affects=mysqli_affected_rows($connect);
if($affects<1){
    //当受影响的行数小于1,说明删除没有成功,没有受影响的数据
  exit("删除数据失败2");
}

//跳转到首页,展现删除之后的效果;
header("Location:./phptable.php");

















?>