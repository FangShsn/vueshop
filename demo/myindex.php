<?php

//连接数据库
$connect=mysqli_connect("127.0.0.1","root","root","fsdata");
//print_r($connect);

//判断连接是否成功
if(!$connect){
	exit("连接失败");
}

//sql语句
$sql="select * from fangshan";

//查询数据
$query=mysqli_query($connect,$sql);  
//print_r($query);   //对象

//判断查询是否成功
if(!$query){
	exit("查询数据失败");
}


//将数据展示在页面上
//mysqli_fetch_assoc($query)  //只展示一行   //得到一个二维或者多维数组
//mysqli_fetch_all($query)    //全部数据展示出来//产生一个关联数组

 
 $value=mysqli_fetch_assoc($query);
 // print_r( $value);
 
//  while($value=mysqli_fetch_assoc($query)){
// 	  print_r( $value);
//  }
 

 


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
    <h1 class="heading">用户管理 <a class="btn btn-link btn-sm" href="myadd.php">添加</a></h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>id</th>
          <th>头像</th>
          <th>姓名</th>
          <th>性别</th>
          <th>生日</th>
					  <th class="text-center" width="200">操作</th>
        </tr>
      </thead>
      <tbody>
	
					
					<?php		while($value=mysqli_fetch_assoc($query)){  ?>
					<tr>
							<td> <?php  echo $value["id"]   ?>   </td>
							<td> <?php  echo $value["avatar"]   ?>   </td>
							<td> <?php   echo $value["name"]  ?>   </td>
							<td> <?php   echo $value["gender"]==0? '女':'男'  ?>   </td>
							<td> <?php   echo $value["birthady"]   ?>   </td>
					  <td class="text-center" >
					  <a class="btn btn-info btn-sm" href="myedit.php?id=<?php echo $value["id"] ?>">编辑</a>
					  <a class="btn btn-danger btn-sm" href="mydelete.php?id=<?php echo $value["id"] ?>">删除</a>
					</td>
					</tr>
	    	<?php		}		   ?>
				

      </tbody>
    </table>
    <ul class="pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
    </ul>
  </main>
</body>
</html>