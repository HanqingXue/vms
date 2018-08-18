<!DOCTYPE html>
<html class="t-root" style="overflow: visible; height: auto;">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta content="initial-scale=1.0,user-scalable=no,minimum-scale=1,maximum-scale=1,width=device-width" name="viewport" />
  <title>旅游攻略</title>
  <link rel="stylesheet"  href=" <?php echo base_url('/assets/css/go.css'); ?>">
  <script src =" <?php echo base_url('/assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
 </head>
 <body style="overflow: visible; height: auto;">
  <div class="qn_page" id="b_main_box">
   <div class="b_crumb">
    <div class="e_crumb">
     <a class="arrow arrow_left" href=""></a>
     <div class="tit">
        <?php echo $keyword;  ?>
     </div>
    </div>
   </div>
   <div class="b_filter_box">
    <div class="e_searchbox">
     <div class="input_search no_filter">
      <div class="icon_search">
       
      </div>
      <div class="inputbox">
       <input type="text" readonly="readonly" class="input_txt" value="请输入目的地进行搜索" />
      </div>
     </div>
    </div>
   </div>
    <div class="rct">
     <div class="train-ico"></div>
    </div></a>
   <div class="b_list_box" >
      <?php foreach ( $travels as $travel ): ?>
        <a href="http://localhost/vms/dashboard/xiangqing?id=<?php echo $travel['travels_id'];?>"   class="list_txt_link" data-log="touch_main_arrange" id="<?php echo $travel['travels_id'];?>" class="logs">
            <img class="list-img"   src="<?php echo base_url('/assets/img/go1.jpg'); ?>" />
            <div class="img-mask"></div>
            <div class="bd">
              <p class="tit-text"><?php echo $travel['travels_name'];?></p>
              <p class="tit-time"><?php echo $travel['travels_date'];?>出发/共 <?php echo $travel['travels_length'];   ?>天/26图</p>
            </div>
            <span class="tit-user">作者信息</span></a>
      <?php endforeach; ?> 
    
   <a href="" data-q="青海湖" class="b_load_more" data-log="touch_main_list_more">查看更多</a>
  </div>
  <div id="searchInput" class="qn_page" style="display:none">
   <div class="b_crumb">
    <div class="e_crumb">
     <a class="arrow arrow_left" href="javascript:void(0);" id="back_arrow"></a>
     <div class="tit">
      目的地搜索
     </div>
    </div>
   </div>
   <div class="b_filter_box">
    <div class="e_searchbox">
     <div class="input_search">
      <div class="icon_search">
       
      </div>
      <a class="icon_cancel" href="javascript:void(0);" data-log="touch_search_delete"></a>
      <a class="input_filter" id="submit_btn" data-log="touch_search_ok"></a>
      <form name="str_search" action="" id="search_form">
       <div class="inputbox">
        <input type="search" id="searchPanel_input" class="input_txt" data-log="touch_search_keyword" value="" />
       </div>
      </form>
     </div>
    </div>
   </div>
   <div class="b_list_box">
    <ul class="list_item" id="city_list">
     <li class="list"><a data-log="touch_search_mark" href="" class="item_link">北京</a></li>
     <li class="list"><a data-log="touch_search_mark" href="" class="item_link">青海湖</a></li>
    </ul>
    <a href="javascript:void(0);" id="clear_city_list" class="btn_clear" data-log="touch_search_mark_clean" style="">清空搜索记录</a>
   </div>
  </div>
  <div id="searchFilter" style="visibility: visible; display: none;">
   <div class="b_dialog_mask" style="position: absolute; z-index: 1000; top: 0px; left: 0px; height: 640px;"></div>
   <div class="b_dialog b_dialog_menufilter" style="top: -120%;">
    <div class="e_dialog_hd hide"></div>
    <div class="e_dialog_ct">
     <div class="e_menufilter">
      <ul class="listitem clrfix">
       <li class="item current td2"><span class="line"></span><span class="txt">月份不限</span><span class="img_arrow"></span></li>
       <li class="item td2"><span class="txt">天数不限</span><span class="img_arrow"></span></li>
      </ul>
      <div class="filterbox clrfix">
       <div class="item_filterbox f_travemonth c_contbox">
        <ul class="listbox clrfix">
         <li class="list" data-value="1_2_3"><a class="link" href="https://touch.go.qunar.com/1002781#">1-3月</a></li>
         <li class="list" data-value="4_5_6"><a class="link" href="https://touch.go.qunar.com/1002781#">4-6月</a></li>
         <li class="list" data-value="7_8_9"><a class="link" href="https://touch.go.qunar.com/1002781#">7-9月</a></li>
         <li class="list" data-value="10_11_12"><a class="link" href="https://touch.go.qunar.com/1002781#">10-12月</a></li>
        </ul>
       </div>
       <div class="item_filterbox f_traveday c_contbox" style="display:none;">
        <ul class="listbox clrfix">
         <li class="list" data-value="1_2_3"><a class="link" href="https://touch.go.qunar.com/1002781#">1-3天</a></li>
         <li class="list" data-value="4_5_6_7"><a class="link" href="https://touch.go.qunar.com/1002781#">4-7天</a></li>
         <li class="list" data-value="8to10"><a class="link" href="https://touch.go.qunar.com/1002781#">8-10天</a></li>
         <li class="list" data-value="11to15"><a class="link" href="https://touch.go.qunar.com/1002781#">11-15天</a></li>
         <li class="list" data-value="16tom"><a class="link" href="https://touch.go.qunar.com/1002781#">15天以上</a></li>
        </ul>
       </div>
      </div>
      <a id="filter_submit" class="f_submit" data-log="touch_screen_ok" >确 定</a>
     </div>
    </div>
    <div class="e_dialog_ft hide"></div>
   </div>
  </div>
  <!--客户端过来的无footer-->
  <div id="qunarFooter"></div>
 </body>
 <script >
   function trim(str) { 
      return str.replace(/(^\s*)|(\s*$)/g, ""); 
    }
 </script>
</html>