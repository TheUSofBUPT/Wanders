<div><p><h1><a href="<?php echo Yii::app()->createUrl('request'); ?>&sort=0">项目发布</a></h1></p></div>
<div id="content" >
<table style="margin-left:600px">
<?php for($i=0;$i<count($name);$i++) 
{ ?>
<tr><td><a href="<?php echo Yii::app()->createUrl('publish'); ?>&id=<?php echo $id[$i];?>&sort=0"><?php echo $name[$i];echo "</td></a><td align='left'>          ".$time[$i]."</td><tr/>"; }?>
</table>
</div>
