<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>

    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

</head>

<body>

<br><br><br><br><br><br><br>

	<div class = "container">
		<div class = "col-md-4 col-md-offset-4">
			<div class = "panel panel-primary" id = "login-panel"> <!--登陆小板块的div-->
				<div class = "panel-heading">
					<h2>用户登陆</h2>
				</div>
				<!--
				<h2>用户登陆</h2>
				<hr/>
				<!--想大标题加一个分割线之后再来什么表单的--> 
				
				<?php $form = $this->beginWidget("CActiveForm"); ?>
				<div id = "form-field" class ="panel-body">
				
						<div id = "namefield" >
							<span><label>用户名</label></span>
							<?php echo $form->textfield($loginModel,'username',array('class'=>'form-control' , 'id'=>'username' , 'placeholder'=> "请输入用户名" ));?>
						</div>
						
						<div id = "passwordfield" >
							<label>密码</label>
							 <?php echo $form->passwordfield($loginModel,'password',array('class'=>'form-control' , 'id'=>'password' , 'placeholder'=> "请输入密码" ));?>
						</div>

					

					<br>
					
					<div id = "buttonfield" class = "row col-md-10 col-md-offset-1">
							
						<button type = "submit" class = "btn btn-success dropdown-toggle col-md-5" style = "float:left" >登陆</button>

						<button class = "btn btn-info dropdown-toggle col-md-5" style = "float:right" >注册</button>
						
					</div>
					
					<?php $this ->endWidget(); ?>
					
					<br>
					<br>
					
					<div id = "extrafield" class = "col-md-10">
						<?php echo $form->checkBox($loginModel,'rememberMe');?>&nbsp;记住我
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href = "#">忘记密码？</a>
					</div>
					
				</div>
			</div>
		</div>
    </div>

	
    
        <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
</body>
</html>
