<?php
class PublishController extends Controller
{
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName			
		);
	}
	public  function actionIndex()
	{
		if(isset($_GET['id']))
		{
			//获取项目详细信息
			$id=$_GET['id'];
			$sort=$_GET['sort'];
			if($sort==0)
			$sql="select title,content,regtime,starttime,kind,deadline from nb_software where id=".$id.";";
			else if($sort==1)
			$sql="select title,content,regtime,starttime,kind,deadline from nb_hardware where id=".$id.";";
			$result=Yii::app()->db->createCommand($sql)->query();
			while(($port=$result->read())!==false)
			{
				$title=$port['title'];
				$regtime=$port['regtime'];
				$content=$port['content'];
				$starttime=$port['starttime'];
				$kind=$port['kind'];
				$deadline=$port['deadline'];
			}
            //展示项目评论
			$sql="select comment,uid,userkind from nb_comment where pid=".$id." and parentid =".$sort.";";
			$result=Yii::app()->db->createCommand($sql)->queryAll();
			if($result)
			{
				foreach( $result as $comment )			//遍历输出所有的评论遍历
				{
				 	$i=0;		
					if( $comment['userkind'] == 1 )			//如果用户是服务方
					{
						$sql = "select username from nb_sellers where id=".$comment['uid'].";";
						$res[$i] = Yii::app()->db->createCommand($sql)->queryAll();
                        
						// echo $sqlcmd;
					}else
					{
						$sql = "select username from nb_buyers where id=".$comment['uid'].";";
						$res = Yii::app()->db->createCommand($sql)->queryAll();
					}
					$i++;
					//print_r($res);
					$imgstr = md5("uid=".$comment['uid']."userkind=".$comment['userkind']);
					// echo "<img src = \"".Yii::app()->baseUrl."/images/userimages/".$imgstr.".jpg\"</img>";
					// echo "用户\t".$res[0]['username']."\t评论说\t".$comment['comment']."<br>";
				}
				print_r($result);
			}
			if($result==NULL)
			{
				$comment=null;
				$imgstr=null;
			}
			//提交项目评论
            $model=new Comment();
            if(isset($_POST['Comment']))
            {
            	$model->attributes=$_POST['Comment'];
            	$model['userkind']=Yii::app()->session['userkind'];
			    $model['uid']=Yii::app()->session['id'];
			    $model['pid']=$id;
			    $model['parentid']=$sort;            	
            	$model->save();
            }
			$this->render('index',array('title'=>$title,'content'=>$content,'regtime'=>$regtime,'kind'=>$kind,
				'deadline'=>$deadline,'starttime'=>$starttime,'model'=>$model,'result'=>$result));
		}
	}
}
?>