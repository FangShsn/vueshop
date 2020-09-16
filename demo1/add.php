
<?php  

header("content-type:text/html;charset=utf-8");
echo  "我是添加页面页面";
echo "<br>";

// $_SERVER["PHP_SELF"]  显示当前页面的路径
echo $_SERVER["PHP_SELF"];
echo "<br>";

//$_SERVER["REQUEST_METHOD"]当前请求为post还是get

//判断当前是否为post请求,如果是执行下面的操作
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    //获取输入框的值,判断让输入框的值不能为空
$id=$_POST["id"];
//print_r($id);
if(empty($id)){
    $GLOBALS['error_message'] = 'id不能为空';
}
echo "<br>";

$username=$_POST["username"];
//print_r($username);
if(empty($username)){
    $GLOBALS['error_message'] = '用户名不能为空';
}
echo "<br>";

$age=$_POST["age"];
//print_r($age);
if(empty($age)){
    $GLOBALS['error_message'] = '年龄不能为空';
}
echo "<br>";


//连接数据库
$connect=mysqli_connect("127.0.0.1","root","root","datafang");
print_r($connect);

if(!$connect){
    exit("连接数据库失败");
}

//增加数据
$sql="insert into fangtable values({$id},'{$username}',{$age})";

$query=mysqli_query($connect,$sql);
print_r($query);


if(!$query){
    exit("添加数据失败1");
}

$affects=mysqli_affected_rows($connect);

if($affects<1){
   exit("添加数据失败2");
}

header("Location:./phptable.php");


 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加页面HTML</title>
    
   <style>


       *{
           margin:0;
           padding:0;
       }
       .bigbox{
           width:1000px;
           height:800px;
           margin:0 auto;
       }
       .bigbox input[type="text"]{
           width:200px;
           height:30px;
       }
       input[type="submit"]{
           width:100px;
           height:30px;
       }
   </style>

</head>
<body>

<div class="bigbox">
<h4>添加页面</h4>
<!-- 如果为空,弹出为空的内容 -->
<?php if (isset($error_message)) : ?>
      <div class="alert alert-warning">
        <?php echo $error_message; ?>
      </div>
    <?php endif ?>
<br>
<form action="<?php   echo $_SERVER["PHP_SELF"]  ?>"   method="POST" >

<label>id &nbsp;&nbsp;&nbsp;</label>
<input type="text" name="id"  >
<br>
<br>
<label>姓名</label>
<input type="text"  name="username" >
<br>
<br>
<label>年龄</label>
<input type="text" name="age"  >
<br>
<br>
<input type="submit">
</form>
</div>   
</body>
</html>


