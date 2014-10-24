<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-brand"></div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo Yii::app()->createUrl('software'); ?>">软件开发</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('hardware'); ?>">硬件研发</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('design'); ?>">创新设计</a></li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">更多 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo Yii::app()->createUrl('teach'); ?>">家教</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('intern'); ?>">实习</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('parttime'); ?>">兼职</a></li>
                        <!-- <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li> -->
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo Yii::app()->createUrl('site')?>"><?php if(isset(Yii::app()->session['username'])){
                  echo '欢迎您'.Yii::app()->session['username'].'!';
                  }?></a></li>
                <li><a href="<?php echo Yii::app()->createUrl('user/default/logout')?>"><?php if(isset(Yii::app()->session['username'])){
                  echo '注销';
                  }?></a></li>
                <li><a href="<?php echo Yii::app()->createUrl('user/default/index')?>"><?php if(!isset(Yii::app()->session['username'])){
                  echo '注册';
                  }?></a></li>
                <li><a href="<?php echo Yii::app()->createUrl('user/default/login')?>"><?php if(!isset(Yii::app()->session['username'])){
                  echo '请登录';
                  }?></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Example headline.</h1>
                    <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="" alt="Second slide">
                <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                     <h1>One more for good measure.</h1>
                     <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                      <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->



<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
            <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl?>/css/soft-1.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
            <h2>软件开发</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="btn btn-default" href="<?php echo Yii::app()->createUrl('software'); ?>" role="button">查看更多 &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl?>/css/hard-1.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
            <h2>硬件研发</h2>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
             <p><a class="btn btn-default" href="<?php echo Yii::app()->createUrl('hardware'); ?>" role="button">查看更多 &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
             <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl?>/css/design-1.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
             <h2>创新设计</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
             <p><a class="btn btn-default" href="<?php echo Yii::app()->createUrl('design'); ?>" role="button">查看更多 &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
    <!-- START THE FEATURETTES -->
    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-12">
            <h1 class="text-heading" align="center">如何帮助您寻找专业人士来解决您的服务需求？</h1>
        </div>
    </div>
    <hr class="featurette-divider-in">
    <div class="row featurette">
        <div class="col-md-7">
             <h2 class="featurette-heading"><span class="text-muted">发布项目需求</span></h2>
             <p class="lead">通过手机APP或者电脑网页发布您的需求，您将收到一些专业的申请信息。</p>
        </div>
        <div class="col-md-5">
             <img class="featurette-image img-responsive" src="<?php echo Yii::app()->request->baseUrl?>/css/step-1.jpg" alt="Generic placeholder image">
        </div>
    </div>

    

    <div class="row featurette">
        <div class="col-md-5">
            <img class="featurette-image img-responsive" src="<?php echo Yii::app()->request->baseUrl?>/css/step-2.jpg" alt="Generic placeholder image">
        </div>
        <div class="col-md-7">
             <h2 class="featurette-heading"> <span class="text-muted">筛选专业人士</span></h2>
             <p class="lead">申请信息包括：</p>
              <p class="lead"><img src="<?php echo Yii::app()->request->baseUrl?>/css/yuan.jpg">报    价 
              <img src="<?php echo Yii::app()->request->baseUrl?>/css/person.jpg">个人信息</p>
              <p class="lead"><img src="<?php echo Yii::app()->request->baseUrl?>/css/credit.jpg">信誉度
               <img src="">能力值</p>
              <p class="lead"><img src="<?php echo Yii::app()->request->baseUrl?>/css/phone.jpg">联系方式
              </p>
        </div>
    </div>

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading"><span class="text-muted">确定合适人员</span></h2>
             <p class="lead">您可以根据自己的要求，对比不同的专业申请信息，选择最适合自己的专业人士来完成您的需求。
             </p>
        </div>
        <div class="col-md-5">
             <img class="featurette-image img-responsive" src="<?php echo Yii::app()->request->baseUrl?>/css/step-3.jpg" alt="Generic placeholder image">
        </div>
    </div>

    <hr class="featurette-divider">
<!-- /END THE FEATURETTES -->

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-12">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>每年漫游者完成的各种项目</h1>
            <p></p>
          </div>
          <div class="row">
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>案例1</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>案例2</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>案例3</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>案例4</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>案例5</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>案例6</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>
</div><!-- /.container -->

