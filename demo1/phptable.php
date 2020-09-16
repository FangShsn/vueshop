<?php 
header("content-type:text/html;charset=utf-8");
//1,链接数据库
$connect=mysqli_connect("127.0.0.1","root","root","datafang");
//var_dump($connect);

if(!$connect){
    exit("链接数据库失败");
}

//查询数据库
$sql="select *from fangtable ";

$query=mysqli_query($connect,$sql);
//print_r($query);


//判断数据查询是否失败
if(!$query){
    exit("查询库失败");
}


//将数据展示出来
$array=[];
while($row=mysqli_fetch_assoc($query)){
 // print_r($row);
  $array[]=$row;
}

//print_r($array);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpdata</title>
    <style>
       *{
           margin:0;
           padding:0;
       }
        table{
            width:800px;
            height:300px;
            margin:0 auto;
            margin-top:60px;
        }
        table tr{
            text-align:center;
        }
        thead tr{
            background:#ccc;
            color:white;
            height:60px
        }
        tbody tr:nth-of-type(even){
            background:skyblue;
        }
        tbody tr:nth-of-type(odd){
            background:pink;
        }
    </style>
</head>
<body>
    <table >
        <thead>
        <tr>
            <th>id</th>
            <th>姓名</th>
            <th>年龄</th>
            <th>操作</th>
            <th>修改</th>
            <th>新增</th>
        </tr>
        </thead>
        <tbody>

        
        <?php    foreach($array  as $value){   ?>
             <tr> 
             <?php      foreach($value as $key=>$valuekey){   ?>
                <td> <?php  echo $valuekey ?>   </td>

               


               <?php    }    ?>
               <td> <a href="delete.php?id=<?php  echo $value["id"]   ?>"> 删除 </a></td>
               <td> <a href="edit.php?id=<?php  echo $value["id"]   ?> "> 编辑</a></td>
               <td> <a href="add.php?id=<?php  echo $value["id"]   ?> "> 添加</a></td>
             </tr>
             <?php    }    ?>


        </tbody>  
    </table>
</body>
</html>






