<!DOCTYPE html>
<!-- saved from url=(0081)https://so.m.jd.com/ware/search.action?keyword=%E5%86%9C%E5%AE%B6&searchFrom=home -->
<html lang="zh-CN">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
  <title>92农家乐商品搜索</title> 
  <meta name="keywords" content="92农家乐" /> 
  <meta name="description" content="" /> 
  <meta name="apple-mobile-web-app-capable" content="yes" /> 
  <meta name="apple-mobile-web-app-status-bar-style" content="black" /> 
  <meta name="format-detection" content="telephone=no" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no, viewport-fit=cover" /> 
  <meta http-equiv="x-dns-prefetch-control" content="on" /> 
  <link rel="stylesheet"  href=" <?php echo base_url('/assets/css/goodlist.css'); ?>">
  <script src =" <?php echo base_url('/assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
 </head> 
 <body> 
  <div class="wx_wrap"> 
   <div class="pro_filter_mask" id="pFilterMask"></div> 
   <div class="search_head" id="searchHead" style="height: 129px;"> 
    <div class="" id="searchHeadFixer"> 
     <div id="mCommonTips">
      <div id="mTipsContent"></div>
     </div> 
     <div id="tsearchwrap" class="search-land" style="display: block;">
      <div class="mjd-header">
       <div class="m_common_container">
        <div class="m_cc_header_inner">
         <header class="jd-header">
          <div class="jd-header-new-bar">
           <div id="msCancelBtn" report-eventid="MCommonHead_Back" report-eventparam="https://so.m.jd.com/ware/search.action" class="jd-header-icon-back J_ping" style="display: block;">
            <span></span>
           </div>
           <div class="jd-header-new-title"></div>
  
           <div id="msShortcutMenu" report-eventid="MCommonHead_NavigateButton" report-eventparam="https://so.m.jd.com/ware/search.action" class="jd-header-icon-new-shortcut J_ping" style="display: block;">
            <span></span>
           </div>
          </div>
         </header>
        </div>
        <div class="m-common-header-search">
         <form action="https://so.m.jd.com/search/search.action" class="jd-header-search-form">
          <div class="jd-header-search-box" id="msSearchBox" style="margin-right: 32px;">
           <div class="jd-header-search-input">
            <i id="search-input-left-jd" class="jd-header-icon-jd"></i>
            <i id="search-input-left-icon" class="jd-header-icon-fdj"></i>
            <input value="" maxlength="20" name="keyword" id="msKeyWord" type="text" cleardefault="no" autocomplete="off" placeholder="输入您要搜索的产品" class="hilight2" />
           </div>
          </div>
         </form>
        </div>
       </div>
      </div>
     </div> 
    <div class="search_prolist cols_1" id="itemList"> 
    <?php foreach ( $goods as $good ): ?>
     <div class="search_prolist_item" id ="<?php echo $good['goods_id'];?>" >
      <div class="search_prolist_item_inner J_ping" > 
       <div class="search_prolist_cover" > 
        <img class="photo"  src="<?php echo base_url($good['goods_cover']); ?>" /> 
       </div> 
       <div class="search_prolist_info" > 
        <div class="search_prolist_title" >
          <?php echo $good['goods_title'];?>
        </div> 
        <div class="search_prolist_price" > 
         <strong rd="0-4-1"> <em id="dp_J_13441383523" rd="0-4-1" pri="138.00">&yen; <span class="int"><?php echo $good['goods_price'];?></span></em> </strong> 
        </div> 
        <div class="search_prolist_line" > 
        </div> 
        <div class="search_prolist_other text_small" > 
        </div> 
        <div class="search_prolist_other text_small hide" ></div> 
        <div class="search_prolist_buy color_red2"></div>
       </div> 
      </div> 
     </div>
     <?php endforeach; ?> 
     </div>
  </div>
 </body>
 <script type="text/javascript">
   $('.search_prolist_item').click(function() {
      var id = $(this).attr('id');
      window.location.href = "http://localhost/vms/dashboard/goodsdetail?id=" + id;
   });
 </script>
</html>