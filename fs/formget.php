<?php  
header("content-type:text/html;charset=utf-8");
$name=$_GET['name'];
var_dump($name);
echo "<br>";
$pwd=$_GET['pwd'];
var_dump($pwd);
echo "<br>";


//$_POST同理





// $_SERVER["PHP_SELF"]是超级全局变量，返回当前正在执行脚本的文件名，
// 与 document root相关。所以， $_SERVER["PHP_SELF"] 会发送表单数
// 据到当前页面，而不是跳转到不同的页面。
//显示路径

// $_SERVER["REQUEST_METHOD"]来检测表单是否被提交 。如果 REQUEST_METHOD 
// 是 POST, 表单将被提交 - 数据将被验证
// $_GET 变量接受所有以 get 方式发送的请求，及浏览器地址栏中的 ? 之后的内容。
// $_POST 变量接受所有以 post 方式发送的请求，例如，一个 form 以 method=post 提交，
// 提交后 php 会处理 post 过来的全部变量。
// $_REQUEST 支持两种方式发送过来的请求，即 post 和 get 它都可以接受，
// 显示不显示要看传递方法，get 会显示在 url 中（有字符数限制），post 不会在 url 中显示，
// 可以传递任意多的数据（只要服务器支持）
// 在 HTML 表单中使用 method="get" 时，所有的变量名和值都会显示在 URL 中。
// 注释：所以在发送密码或其他敏感信息时，不应该使用这个方法！
// 然而，正因为变量显示在 URL 中，因此可以在收藏夹中收藏该页面。在某些情况下，这是很有用的。
// 注释：HTTP GET 方法不适合大型的变量值。它的值是不能超过 2000 个字符的。
// 从带有 POST 方法的表单发送的信息，对任何人都是不可见的，并且对发送信息的量也没有限制。
// 然而，由于变量不显示在 URL 中，所以无法把页面加入书签。

//进行正则表达式匹配。
//preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)





// test_input()是一个自定的函数，过滤提交信息，防止被攻击
// 使用 PHP trim() 函数去除用户输入数据中不必要的字符 (如：空格，tab，换行)。 
// 使用PHP stripslashes()函数去除用户输入数据中的反斜杠 (\) 
// htmlspecialchars() 函数把一些预定义的字符转换为 HTML 实体。 
// 预定义的字符是：
// & （和号） 成为 &amp;
// " （双引号） 成为 &quot;
// ' （单引号） 成为 &#039;
// < （小于） 成为 &lt;
// > （大于） 成为 &gt;

?>