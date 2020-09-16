
<?php

header("content-type:text/html;charset=utf-8");
// 第一步.读取数据
$array=file_get_contents("names.txt");
//print_r($array);



//字符串分割  //得到每一个人的信息
$newarray=explode("\n",$array);
//print_r($newarray);


//遍历
 foreach($newarray as $value){
     //将字符串用"|"进行分割  //得到每一个人的单项信息
   $singlearr=explode("|",$value);

    // print_r($singlearr);
    //把分割的每一项放到数组里面  //每一个人单项信息组成一个数组
      $newArr[]=$singlearr;
   }

//print_r($newArr);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data</title>
</head>
<body>

<table>
<thead>
<td>
    <th>编号</th>
    <th>姓名</th>
    <th>年龄</th>
    <th>邮箱</th>
    <th>网址</th>
</td>
</thead>
<tbody>


<?php foreach($newArr as $valuenum){ ?> 

<tr>

 <?php  foreach( $valuenum as $Val){  ?>
   <td><?php echo $Val ?><td>
   <?php  } ?> 

</tr> 

<?php  } ?> 


</tbody>
</table>

    
</body>
</html>