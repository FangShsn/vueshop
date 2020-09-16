<?php

 header("content-type:text/html;charset=utf-8"); 
echo "我是编辑页面";
echo "<br>";
echo $_SERVER["PHP_SELF"];
echo "<br>";


//判断是否为POST请求
if($_SERVER["REQUEST_METHOD"]=="POST"){

//重新获取输入框的值   //获取不到id
    $myid=$_POST['id'];
	print_r($myid);
	echo "<br>";

	$avatar="阿凡达";
	print_r($avatar);
	echo "<br>";
		
	$name=$_POST['name'];
	print_r($name);
	echo "<br>";

	
	
	$gender=$_POST['gender'];
	 print_r($gender);
	 echo "<br>";
	
	$birthady=$_POST['birthady'];
	print_r($birthady);
	echo "<br>";

		//连接数据库
		$connect=mysqli_connect("127.0.0.1","root","root","fsdata");
		print_r($connect);
		echo "<br>";
		//判断连接是否成功
		if(!$connect){
			exit("连接数据库失败");
		}
	
	
	//修改数据
	$sql="update fangshan set avatar='{$avatar}',name='{$name}', gender={$gender},birthady='{$birthady}' where id={$myid} ";
	print_r($sql);
	echo "<br>";
	$query=mysqli_query($connect,$sql);
	print_r($query);
	echo "<br>";
	
	if(!$query){
		exit("编辑失败1");
	}
	
	$affects=mysqli_affected_rows($connect);
	print_r($affects);
	echo "<br>";
	if($affects<1){
		exit("编辑失败2");
	}
	
	  header("Location:./myindex.php");
		 	
	}else{	
	//拿到跳转页面的id
	$id=$_GET["id"];			
	//print_r($id);
	echo "<br>";
	//连接数据库
	$link=mysqli_connect("127.0.0.1","root","root","fsdata");
	
	//判断连接是否成功
	if(!$link){
		exit("连接数据库失败");
	}
	
		//查询数据库数据
	$sqllink="select * from fangshan where id={$id}";
	//print_r($sqllink);
	echo "<br>";
	$querylink=mysqli_query($link,$sqllink);
	//print_r($querylink);
	echo "<br>";
	
	if(!$querylink){
		exit("编辑数据失败");
	}
	
	//将数据渲染到页面
	$rows=mysqli_fetch_assoc($querylink);
	//print_r($rows);
	
		
	}






?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>XXX管理系统</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">XXX管理系统</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">用户管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">商品管理</a>
      </li>
    </ul>
  </nav>
  <main class="container">
    <h1 class="heading">编辑“<?php echo $user['name']; ?>”</h1>
    <form  action="<?php   echo $_SERVER["PHP_SELF"]  ?>"   method="POST" > 
	<div >
        <label  style="display:none;">id</label>
        <input type="text"  name="id" value="<?php  echo $rows['id'] ?>"    hidden>
      </div>
      <div class="form-group">
        <label for="avatar">头像</label>
        <input type="file" class="form-control" id="avatar"  name="avatar" >
      </div>
      <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" class="form-control" id="name"  name="name"  value="<?php echo $rows["name"] ?>" >
      </div>
      <div class="form-group">
        <label for="gender">性别</label>
        <select class="form-control" id="gender"   name="gender"  >
          <option  value="-1">请选择性别</option>
          <option value="1" <?php echo $rows["gender"]=='1'? 'selected': ''; ?>  >男</option>
          <option value="0" <?php echo $rows["gender"]=='0'? 'selected': ''; ?>  >女</option>
        </select>
      </div>
      <div class="form-group">
        <label for="birthday">生日</label>
        <input type="date" class="form-control" id="birthady" name="birthady"  value="<?php echo $rows["birthady"] ?>"  >
      </div>
      <button  class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>
