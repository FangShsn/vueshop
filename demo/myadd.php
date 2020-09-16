<?php

header("content-type:text/html;charset=utf-8"); 
echo "我是新增页面";
echo "<br>";
echo $_SERVER["PHP_SELF"];
echo "<br>";

//判断是否为POST请求
if($_SERVER["REQUEST_METHOD"]=="POST"){

	//连接数据库
	$connect=mysqli_connect("127.0.0.1","root","root","fsdata");

	//判断连接是否成功
	if(!$connect){
		exit("连接数据库失败");
	}

	$avatar="阿凡达";
		//print_r($img);
		echo "<br>";
		
	$name=$_POST['name'];
	//print_r($name);
	echo "<br>";
	
	$gender=$_POST['gender'];
	//print_r($gender);
	echo "<br>";
	
	$birthday=$_POST['birthday'];
	//print_r($birthday);
	echo "<br>";
	
	
	//新增数据
	$sql="insert into fangshan values (null,'{$avatar}','{$name}',{$gender},'{$birthday}')";
	print_r($sql);
	echo "<br>";
	$query=mysqli_query($connect,$sql);
	print_r($query);
	echo "<br>";
	
	if(!$query){
		exit("新增失败1");
	}
	
	$affects=mysqli_affected_rows($connect);
	if($affects<1){
		exit("新增失败2");
	}
	
	  header("Location:./myindex.php");
	
	
	
	
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
    <h1 class="heading">添加用户</h1>
    <?php if (isset($error_message)) : ?>
      <div class="alert alert-warning">
        <?php echo $error_message; ?>
      </div>
    <?php endif ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="form-group">
        <label for="avatar">头像</label>
        <input type="file" class="form-control" id="avatar" name="avatar">
      </div>
      <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="gender">性别</label>
        <select class="form-control" id="gender" name="gender">
          <option value="-1">请选择性别</option>
          <option value="1">男</option>
          <option value="0">女</option>
        </select>
      </div>
      <div class="form-group">
        <label for="birthday">生日</label>
        <input type="date" class="form-control" id="birthday" name="birthday">
      </div>
      <button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>

</html>