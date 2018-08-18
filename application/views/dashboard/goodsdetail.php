<!DOCTYPE html>
<html lang="zh-CN" class="detail_standard">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
  <title>农产品详情</title> 
  <meta name="keywords" content="" /> 
  <meta name="description" content="" /> 
  <meta name="apple-mobile-web-app-capable" content="yes" /> 
  <meta name="apple-mobile-web-app-status-bar-style" content="black" /> 
  <meta name="format-detection" content="telephone=no" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no, viewport-fit=cover" /> 
  <meta http-equiv="x-dns-prefetch-control" content="on" /> 
  <!-- jd播放器样式 --> 
  <link rel="stylesheet"  href=" <?php echo base_url('/assets/css/jd.css'); ?>">
 </head> 
 <body> 
<!DOCTYPE html>
<html lang="zh-CN" class="detail_standard">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
  <title>农产品</title> 
  <meta name="keywords" content="" /> 
  <meta name="description" content="" /> 
  <meta name="apple-mobile-web-app-capable" content="yes" /> 
  <meta name="apple-mobile-web-app-status-bar-style" content="black" /> 
  <meta name="format-detection" content="telephone=no" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no, viewport-fit=cover" /> 
  <meta http-equiv="x-dns-prefetch-control" content="on" /> 
  <!-- jd播放器样式 --> 
 </head> 
 <body> 
  <div class="m_header" id="m_header" style="height: 95px;"> 
   <div class="header_content"> 
    <div id="m_common_header" class="m_item_header">
     <header class="jd-header">
      <div class="jd-header-new-bar">
       <div report-eventid="MCommonHead_Back"  id="m_common_header_goback" class="jd-header-icon-back J_ping">
        <span></span>
       </div>
       <div class="jd-header-new-title">
        <div class="detail_anchor_wrap" style="" id="detailAnchor"> 
         <nav class="detail_anchor"> 
          <a href="javascript:" dtype="item" class="detail_anchor_item cur"><span>商品</span></a> 
         </nav> 
        </div>
       </div>
       <div report-eventid="MCommonHead_NavigateButton"  id="m_common_header_jdkey" class="jd-header-icon-new-shortcut J_ping">
        <span></span>
       </div>
      </div>
     </header>
    </div> 
   </div> 
  </div> 
  <div id="part_main"> 
   <div class="mod_slider mod_slider_s1" id="loopImgDiv" style="height: 375px; width: 375px;"> 
    <div class="inner"> 
     <ul class="pic_list" data-slide-ul="firstUl" id="loopImgUl" style="left: 0px; width: 2250px; height: 375px;"> 
        <li id="firstImgLi" data-ul-child="child" style="height: 375px; width: 375px; transition: all 300ms ease; transform: translate3d(0px, 0px, 0px); z-index: 10;">
            <img id="firstImg"  src="<?php echo base_url($goods['goods_cover']);?>"/>
        </li> 
     </ul>
    </div> 
   </div> 
   <!-- E 服饰商品颜色属性快捷切换区 --> 
   <div class="buy_area" id="buyArea"> 
    <div class="fn_wrap"> 
     <h1 class="fn fn_goods_name" id="favWrap"> 
      <div class="fn_text_wrap" id="itemName" ptag="7001.1.163">
       <?php echo $goods['goods_title'];?>
      </div> <a class="J_ping favour heart" href="javascript:void(0)" pppptag="7001.1.22" id="fav" report-eventid="MProductdetail_AddtoFollowed" report-eventparam="23349372188" report-pageparam="23349372188">关注</a> </h1> 
    </div>
    <div id="priceWrap">
        <div class="price_wrap" id="priceBlock">
            <span class="hide" id="priceTitle"></span>
            <span class="price large_size" id="priceSale">¥<em><?php echo $goods['goods_price'];?></em></span>
            <span class="col_right hide" id="headEval" ptag="7001.1.26">
                <span class="sale_num">评价：<b id="evalNo1">1700+</b>条</span>
            </span>
        </div>
    </div> 

     <!--送货地址--> 
     <div class="detail_transfer" id="sendArea"> 
      <div class="J_ping detail_transfer_row" id="addrArea" ptag="7001.1.4"> 
       <i class="detail_transfer_row_link"></i> 
       <span class="detail_transfer_row_tit">送至</span> 
       <div class="detail_transfer_row_content"> 
        <p class="detail_transfer_row_content_oline" id="addrName">北京朝阳区三环到四环之间</p> 
        <p id="postNotice"><small><span>现货</span><b id="postTip">由商家从 浙江杭州市 发货</b></small></p> 
       </div> 
      </div> 
      <div class="detail_transfer_row" id="postArea" style=""> 
       <span class="detail_transfer_row_tit">运费</span> 
       <div class="detail_transfer_row_content"> 
        <p id="postPrice">在线支付免运费 </p> 
       </div> 
      </div> 
     </div> 
     <ul class="detail_serve" id="serviceArea" ptag="7001.1.24">
      <li class="detail_serve_item " tag="">商家发货&amp;售后</li>
      <li class="detail_serve_item disabled" tag="">不支持7天无理由退货</li>
     </ul> 
     <div class="detail_gap"></div> 
     <div class="sku_container sku_container_on" id="skuCont"> 
      <div class="sku_wrap"> 
       <div id="propertyDiv">
        <div class="sku" id="sku1" ptag="7001.1.5">
         <h3>种类</h3>
         <div class="sku_list">
          <span class="option" no="1" dis="0">1kg</span>
         </div>
        </div>
       </div> 
       <div class="sku sku_num" id="skuNum"> 
        <h3>数量</h3> 
        <div class="num_wrap"> 
         <span class="minus minus_disabled" id="minus" ptag="7001.1.11"></span> 
         <input class="num" id="buyNum" type="tel" value="1" /> 
         <span class="plus" id="plus" ptag="7001.1.11"></span> 
        </div> 
       </div> 
      </div> 
     </div> 
     <div class="detail_gap" style=""></div> 
     <!-- 店铺 -->  
    </div> 
    <!-- E de_pm--> 
   </div> 
   <div class="detail_gap"></div> 
   <!-- S 下载引流楼层 --> 
   <div id="detailBaseLine"></div> 
   <div class="mod_fix_wrap"> 
    <div class="mod_fix" id="detailTab"> 
     <div class="mod_tab"> 
      <div class="J_ping item cur" no="1" ptag="7001.1.12" report-eventid="MProductdetail_DetailProductIntroduction" report-pageparam="23349372188">
       商品介绍
      </div> 
     </div> 
    </div> 
   </div> 
   <div class="detail_info_wrap" id="detail" style="height: 800px;"> 
    <div class="detail_list" id="detailCont" style="transform: translate3d(0px, 0px, 0px); transition: all 0.3s ease;"> 
     <p><?php echo $goods['goods_content'];?></p> 
     <img src="<?php echo base_url($goods['good_intro']); ?>" style="width: 100%;">
    <p></p>
    </div> 
   </div> 
  </div> 
  
  <div class="de_btn_wrap fixed" id="btnTools"> 
   <div class="de_row de_btn_bar"> 
    <div class="de_span btn_group"> 
     <div class="de_row"> 
      <!--<div class="btn btn_orange" id="addCart2" pppptag="7001.1.10"> 
       <span class="txt"></span> 
      </div> -->
      <div class="btn btn_buy" id="buyBtn2" pppptag="7001.1.8">
       <span class="txt">立即购买</span>
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
</html>