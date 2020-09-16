<?php  
header("content-type:text/html;charset=utf-8");
echo  "我是编辑页面";
echo "<br>";

//判断是否为post   //是否点击提交按钮
 if( $_SERVER["REQUEST_METHOD"]=="POST"){

    //输入框的值
   //获取修改之后的id(通过name来拿)
     $idtable=$_POST["id"];
    //print_r($idtable);
//    echo "<br>";
     $username=$_POST["username"];
       //print_r($username);
//     echo "<br>";
     $age=$_POST["age"];
     //print_r($age);
//     echo "<br>";

    //连接数据库
    $connectone=mysqli_connect("127.0.0.1","root","root","datafang");
    //print_r($connect);
   if(!$connectone){
       exit("连接数据库失败");
   }
  
    //更新数据库
    $sqlone="update fangtable set name='{$username}',age={$age} where id={$idtable} ";
    //查询数据
   $queryone=mysqli_query($connectone,$sqlone);
   //print_r($queryone);
   //判断查询数据是否成功  //有问题的地方
   if(!$queryone){
       exit("编辑数据失败1");
   }
    //得出受影响的行数
   $affects=mysqli_affected_rows($connectone);
   //判断更新数据是否成功
   if($affects<1){
    exit("编辑数据失败2");
   }

    //跳转到首页
     header("Location:./phptable.php");
 }else{

    // //获取当前点击行的id
    $id=$GLOBALS["_GET"];
    //print_r($id);
    echo "<br>";
    //print_r($id["id"]);
    echo "<br>";
    //链接数据库
    $connect=mysqli_connect("127.0.0.1","root","root","datafang");
    //print_r($connect);

    //判断链接数据库是否成功
    if(!$connect){
       exit("链接数据库失败");
    }

    //查询数据库
     $sqlselect="select * from fangtable where id={$id['id']} ";
     //print_r($sqlselect);
     $query=mysqli_query($connect,$sqlselect);
     // print_r($query);
     echo "<br>";
    if(!$query){
        exit("编辑数据失败");
     }

     //将数据重新展示在页面上  //对应的数据用php填写在html中;
     $rows=mysqli_fetch_assoc($query);
    //print_r($rows);
      echo "<br>";
     
      //关闭数据库
      mysqli_close($connect);

 };





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

<label style="display:none;">id &nbsp;&nbsp;&nbsp;</label>
<input type="text" name="id"  value="<?php echo  $rows["id"]  ?>"  hidden>
<br>
<br>
<label>姓名</label>
<input type="text"  name="username" value="<?php echo  $rows["name"]  ?>"  >
<br>
<br>
<label>年龄</label>
<input type="text" name="age"  value="<?php echo  $rows["age"]  ?>"  >
<br>
<br>
<input type="submit">
</form>
</div> 
</body>
</html>