<div id="content" align="center">
	<table width="600" style="table-layout:fixed">
	<tr ><td align="center">
	<p><h1><b><?php echo $title; ?></b></h1></p>
	<p><h3><?php echo $regtime; ?>   <i>标签: </i><?php echo $kind?>  </h3></p>
	<p><h4><i>起始时间</i><?php echo " ".$starttime; ?><i>截止日期</i><?php echo " ".$deadline;?></h4></p>
	</td></tr>
	<tr><td style="word-wrap:break-word;" ><h5><?php echo $content;?></h5></td></tr>
	</table>
</div>
<div class="spilt"></div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<div class="count"> </div>
	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textField($model,'comment',array('placeholder'=>'请输入评论')); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>
	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>		
		<?php echo $form->textField($model,'verifyCode',array('placeholder'=>'')); ?>		
		<?php echo $form->error($model,'verifyCode'); ?>
		<?php $this->widget('CCaptcha',array('id'=>'verifyCode')); ?>
	</div>
	<?php endif; ?>
	<button class="btn btn-lg btn-primary btn-block" type="submit">发表评论</button>
<?php $this->endWidget(); ?>
<?php 
 //    echo "<img src = \"".Yii::app()->baseUrl."/images/userimages/".$imgstr[0].".jpg\"</img>";
	// echo "用户\t".$res[0]['username']."\t评论说\t".$comment['comment']."<br>";?>