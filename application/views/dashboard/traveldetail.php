<!DOCTYPE html>
<!-- saved from url=(0044)https://touch.travel.qunar.com/youji/6532054 -->
<html class="t-root">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta content="initial-scale=1.0,user-scalable=no,minimum-scale=1,maximum-scale=1,width=device-width" name="viewport" />
  <meta name="baidu-site-verification" content="hvrv6onKKj" />
  <meta http-equiv="Cache-Control" content="no-transform" />
  <title>游记详情</title>
  <!--熊掌号代码-->
  <link rel="stylesheet"  href=" <?php echo base_url('/assets/css/traveldetail.css'); ?>">
 </head>
 <body>
  <div class="qn_page">
   <div class="b_crumb">
    <div class="e_crumb">
     <a class="arrow arrow_left" href=""></a>
     <a class="back_home" href=""></a>
     <div class="tit">
      游记详情
     </div>
    </div>
   </div>
   <div class="b_plan">
    <div class="e_plan note_detail">
     <div class="title">
      <div class="img-mask"></div>
      <div class="title-bd">
       <a href=""><img class="t_author" src="<?php echo base_url('/assets/img/go1.jpg'); ?>"/></a>
       <div class="title-content">
        <h1 class="name"><?php echo $travels['travels_name']?></h1>
        <ul class="messege">
         <li class="item"><span class="t_date"><?php echo $travels['travels_authors']?>&nbsp; </span></li>
         <li class="item"><span class="t_date"><?php echo $travels['travels_date']?>出发</span></li>
        </ul>
       </div>
      </div>
      <img src="<?php echo base_url('/assets/img/go1.jpg'); ?>" />
     </div>
     <!-- 前言 start -->
     <!-- 前言 end -->
     <!-- 游记day start -->
     <div class="date-content">
      <div class="date style0">
       前言
      </div><!--style0-->
      <div class="planboxday">
       <div class="planbox" id="ele-2086096-2">
        <div class="note">
         <div class="note_img">
          <div class="text_link">
           <p>
            <?php echo $travels['travels_content']?>

           </p>
          </div>
         </div><!--note_img-->
        </div><!--note-->
       </div><!--planbox-->
      </div><!--planboxday-->
     </div><!--date-content-->
    <?php foreach ($logs as $log): ?>
      <div class="date-content">
        <div class="date style0">
          <?php echo $log['section_title']?>
        </div><!--style0-->
        <div class="planboxday">
         <div class="planbox" id="ele-2086096-2">
          <div class="note">
           <div class="note_img">
            <div class="text_link">
             <p>
              <?php echo $log['section_content']?>
             </p>
             <img src="<?php echo $log['section_url']?>">
            </div>
           </div><!--note_img-->
          </div><!--note-->
         </div><!--planbox-->
        </div><!--planboxday-->
       </div><!--date-content-->
    <?php endforeach; ?>
     </div>
    </div>
  <!--客户端过来的无footer-->
  <div id="qunarFooter"></div>
 </body>
</html>