<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=utf8">
	<title>项目发布</title>
	<link type="text/css" href="<?php echo dirname(__FILE__).'../../../css/bootstrap.min.css';?>" rel="stylesheet">	
</head>
<body>
	<script src="<?php echo Yii::app()->baseUrl ;?>/js/bootstrap.min.js"></script>
<?php
/* @var $this DefaultController */
//$dir=dirname(__FILE__);
$this->breadcrumbs=array(
	$this->module->id,
);
?>

<?php
if($sort==0) 
{
$form=$this->beginWidget('CActiveForm', array(
'id'=>'request-form',
'action'=>'http://localhost/Wanders/Wanders/index.php?r=Software',
'enableClientValidation'=>true,
'clientOptions'=>array('validateOnSubmit'=>true,),
));
$_GET['sort']=0;
} 
else if($sort==1)
{
$form=$this->beginWidget('CActiveForm', array(
'id'=>'request-form',
'action'=>'http://localhost/Wanders/Wanders/index.php?r=Hardware',
'enableClientValidation'=>true,
'clientOptions'=>array('validateOnSubmit'=>true,),
));
$_GET['sort']=1;
}

?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('placeholder'=>'')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'kind'); ?>
		<?php echo $form->textField($model,'kind',array('onFocus'=>'setter()','onBlur'=>'getter()')); ?>
		<div id="kindLabel"></div>
		<?php echo $form->error($model,'kind'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'starttime'); ?>
		<?php echo $form->textField($model,'starttime',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'starttime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deadline'); ?>
		<?php echo $form->textField($model,'deadline',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'deadline'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('提交'); ?>
	</div>

<?php $this->endWidget(); ?>
<script type=text/javascript>
function setter()
{
	document.getElementById('kindLabel').innerHTML="<table><tr><th>推荐</th><td onMousedown=phpSet()>php</td><td onMousedown=androidSet()>android</td></tr></table>";
}
function getter()
{
	document.getElementById('kindLabel').innerHTML="";
}
function phpSet()
{
	document.getElementById('RequestForm_kind').value +='php ';
}
function androidSet()
{
	document.getElementById('RequestForm_kind').value +='android ';
}
</script>
</body>
</html>
<!-- form -->
