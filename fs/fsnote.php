<?php  
header("content-type:text/html;charset=utf-8");
//注意事项 
//1.php 里面指令写完后面必须加分号
//2.单独php必须标明文字类型
//header("content-type:text/html;charset=utf-8");

//php的基本模式
//<?php    对应的指令  


//打印指令
//echo   打印简单数据类型 可以打印多个,中间用逗号隔开
//echo "php 你好","php 打印" 
//var_dump  打印复杂数据类型 
//print  打印一个
//print_r 通常用来打印数组居多
//  换行  echo "<br>"; 浏览器显示换行
//\n 换行   在服务器显示换行,在浏览器显示没变化

//初始化变量
$username="Lisa";
echo $username;
echo "<br>";
 

//变量的拼接 .
echo "我的名字叫".$username;
echo "<br>";


//变量的作用域及函数
//global 关键字用于函数内访问全局变量。
//在函数内调用函数外定义的全局变量，我们需要在函数中的变量前加上 global 关键字：
//PHP 将所有全局变量存储在一个名为 $GLOBALS[index] 的数组中。 index 保存变量的名称。
//这个数组可以在函数内部访问，也可以直接用来更新全局变量
$x=10;
function num (){
    global $x;
    echo $x;

}

num();
echo "<br>";
echo "-------------------";
echo "<br>";

//PHP 将所有全局变量存储在一个名为 $GLOBALS[index] 的数组中。 index 保存变量的名称。
//这个数组可以在函数内部访问，也可以直接用来更新全局变量。

$x1=10;
$y1=100;
function foo ($x1,$y1){
    $GLOBALS["z1"]=$GLOBALS["x1"]+$GLOBALS["y1"];

}
foo($x1,$y1);
print_r($GLOBALS["z1"]);
echo "<br>";
echo "-------------------";
echo "<br>";


//初始化常量
//define("常量名称一般大写", "常量取值"); 一般以键值对形式存储
//常量是一个简单值的标识符。该值在脚本中不能改变。
//一个常量由英文字母、下划线、和数字组成,但数字不能作为首字母出现。 (常量名不需要加 $ 修饰符)。
//注意： 常量在整个脚本中都可以使用。
define("DB_HOST", "localhost");
//打印常量
echo DB_HOST;
echo "<br>";

//条件语句
$age=10;
if($age>18){
echo "成年人";
}else{
echo "小朋友";
}
echo "<br>";


//数组
//关联数组访问
$arr10=["key1"=>"zs","key2"=>"man"];
$key=array_keys($arr10);
print_r($key);
echo "<br>";
echo "-------------------";
echo "<br>";
$value=array_values($arr10);
print_r($value);
echo "<br>";
echo "-------------------";
echo "<br>";


//关联数组
$arr1=array("key1"=>"hello","sex"=>"男","age"=>20);
var_dump($arr1);
echo "<br>";

$arr2=["key"=>"zs","age"=>17.8,"sex"=>"神魔一体"];
print_r($arr2);
echo "<br>";
echo "<br>";

//多维数组
//二维数组
$cars = array
(
    array("Volvo",100,96),
    array("BMW",60,59),
    array("Toyota",110,100)
);

print_r($cars);
echo "<br>";
echo "<br>";
//多维数组
$sites = array 
( 
    "runoob"=>array 
    ( 
        "菜鸟教程", 
        "http://www.runoob.com" 
    ), 
    "google"=>array 
    ( 
        "Google 搜索", 
        "http://www.google.com" 
    ), 
    "taobao"=>array 
    ( 
        "淘宝", 
        "http://www.taobao.com" 
    ) 
); 
print_r($sites);
echo "<br>";
echo "<br>";


//数组遍历
//二维数组遍历
// $cars = array
// (
//     array("Volvo",100,96),
//     array("BMW",60,59),
//     array("Toyota",110,100)
// );
foreach ($cars as $key=>$values){
     print_r($values);
     echo "<br>";
     echo "<br>";
    foreach($values as $key1=>$values1  ){ 
        print_r($values1);
        echo "<br>"; 
        echo "<br>"; 
             
    }
}
echo "<br>";
echo "<br>";




//循环
//for循环
for($x=0;$x<10;$x++){
    echo $x;
    echo "<br>";
}
echo "<br>";
echo "<br>";



//while循环
$y=0;
while($y<10){
    print_r($y);
    $y++;  
    echo "<br>";
}


//引用文件

//require_once 只会执行一次 如果有警告会影响后面代码的执行
//require引入几次执行几次,  如果有警告会影响后面代码的执行

//include  引入几次执行几次,如果有警告不会影响后面代码的执行

//include_once 引入几次执行几次  如果有警告不会影响后面代码的执行





//字符串方法
// strlen()字符串的长度
$str="hello";
$num=strlen($str);
print_r($num);
echo "<br>";
echo "-------------------";
echo "<br>";


$str2="你好";
// mb_strlen字符串的长度
$num2=mb_strlen($str2);
print_r($num2);
echo "<br>";
echo "-------------------";
echo "<br>";

//strpos() 字符串中是否包含某字符
//strpos("完整的字符串" ,  "是否包含的字符") false
//如果包含，返回包含的第一个字符的位置，如果不包含，返回
echo '<br>';
echo strpos("hello world" ,  "world") ;
echo '<br>';


// isset()  是否存在某个变量
//empty()相似
$mystr='你好';
if(isset($mystr)){
    echo '存在';  //true
    echo "<br>";
}else{
    echo "不存在";   //false
    echo "<br>";
}

$myarr=[1,23,5,10];
if(isset($myarr[1])){
    echo '存在';
    echo "<br>";
}else{
    echo "不存在";
    echo "<br>";
}

//count(数组) 获取数组长度的函数
$cars=array("Volvo","BMW","Toyota");
echo count($cars);
echo '<br>';

//date_default_timezone_set("PRC");   
//设定用于所有日期时间函数的默认时区。

date_default_timezone_set("PRC");
$str="2019-11-11";


//strtotime( )    //将任何英文文本的日期或时间描述解析为 Unix 时间戳
$time=strtotime($str);
echo $time;

echo "<br>";

//date() //将日期或时间描述解析为 Unix 时间戳
echo date($time);



//将字符串转成数字
$num=(int)$str;
print_r($num);
echo "<br>";

//将数字转化为布尔值
$flag=(bool)$num;
echo $flag;
echo "<br>";
print_r($flag);
echo "<br>";







//表单验证
?>



















