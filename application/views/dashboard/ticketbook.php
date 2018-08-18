<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <style class="vjs-styles-defaults">
      .video-js {
        width: 300px;
        height: 150px;
      }

      .vjs-fluid {
        padding-top: 56.25%
      }
    </style>
  <title>门票预订</title>
  <script>window.touchTimeObj = {};touchTimeObj.windowStartTime = +new Date();</script>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta content="yes" name="apple-mobile-web-app-capable" />
  <meta content="black" name="apple-mobile-web-app-status-bar-style" />
  <meta content="telephone=no" name="format-detection" />
  <meta content="false" id="twcClient" name="twcClient" />
  <meta name="applicable-device" content="mobile" />
  <link rel="stylesheet"  href=" <?php echo base_url('/assets/css/bookticket.css'); ?>">
 </head>
 <body>
  <div class="mp-page" id="main-page">
   <div class="mp-header" style="position: fixed; width: 100%; top: 0px; left: 0px; display: block; opacity: 1;">
    <a mp-role="left" class="mp-header-left mp-iconfont" href=""></a>
    <h1 mp-role="title" class="mp-header-title">北京大学</h1>
   </div>
   <div class="mp-main">
    <div class="mp-headfigure">
     <div class="mp-headfigure-wrap" id="imgcontainer">
      <img class="mp-headfigure-img" src= "<?php echo base_url('/assets/img/pku.jpg'); ?>"/>
     </div>
     <div class="mp-headfeagure-info">
      <div class="mp-headfeagure-title">
       <?php echo $attrs['attr_name'] ?>
      </div>
     </div>
     <div class="mp-imgswipeicon">
      <span class="mp-iconfont mp-imgswipeicon-icon"></span>
      <em class="mp-imgswipeicon-number">9</em>
     </div>
    </div>
    <div class="mp-baseinfo">
     <div class="mpg-flexbox mp-flex-card">
      <div class="mpg-flexbox-item mp-flexlink-con">
       <a href="jacascript::void(0)" class="mp-card-link"></a>
       <div>
        <span class="mp-commentcard-score"><?php echo $attrs['attr_score'] ?></span>
        <span class="mp-commentcard-text">分</span>
        <span class="mp-commentcard-desc">很棒</span>
       </div>
       <div>
        <span class="mp-totalcommentnum"></span>
        <span class="mp-totalcommentnum">攻略个数XX</span>
        <span class="mp-iconfont mp-rightarrow">F</span>
       </div>
      </div>
      <div class="mpg-flexbox-item mp-border-left mp-flexlink-con">
       <a href="jacascript::void(0)" class="mp-card-link"></a>
       <div>
        <span class="mp-sightcard-title">景点简介</span>
       </div>
       <div>
        <span class="mp-sightcard-text"><?php echo $attrs['attr_desc'] ?></span>
        <span class="mp-iconfont mp-rightarrow" style="right: 0;">F</span>
       </div>
      </div>
     </div>
     <div class="mp-baseinfo-address mp-border-top" id="card-adress">
      <p class="mp-baseinfo-address-txt"><span class="mp-iconfont mp-baseinfo-address-icon"></span><?php echo $attrs['attr_addr'] ?><span class="mp-iconfont mp-baseinfo-address-arrow">F</span></p>
     </div>
    </div>
    <div id="list-container">
     <div class="mp-ticket-container">
      <div class="mpw-calendar-tabout mp-border-bottom" mp-role="displayOrderCon" style="">
       <div class="mp-border-bottom" mp-role="displayOrderConInner">
        <span mp-role="displayOrder" class="mpw-calendar-tabitem" data-order="displayOrder_1" style="width: 50%;">门票</span>
       </div>
       <span class="mp-tab-slider" mp-role="tabSlider" style="left: 441px;"></span>
      </div>
      <div class="mp-ticket-group mp-border-bottom">
       <div class="mp-ticket-list mp-border-top   mp-ticket-list-multi mp-ticket-list-expand" data-type="group-title" data-typeid="1600819" mp-role="PriceListItem">
        <?php foreach ( $tickets as $ticket ): ?>
         <div class="mp-ticket-item mp-flexbox mp-border-top" data-tickettype="TICKET" mp-role="TicketItem">
          <div class="mp-ticket-main mp-flexbox-layout" mp-role="TicketMainZone" data-click="true" data-click-value="t_mini_window_bc">
           <div>
            <h6 class="mp-ticket-title mp-ellipsis2"><?php echo $ticket['ticket_name'] ?></h6>
            <ul class="mp-ticket-light">
             <span class="mp-ticket-desctag"></span>
            </ul>
            <ul class="mp-ticket-labelcon">
             <span class="mp-ticket-label mp-border mp-label14">随时退</span>
            </ul>
            <div class="mp-ticket-supplier">
              <!-- 景区服务支持
             <span>e景游景区智能导游</span>
             <span class="mp-ticket-infobtn mp-border-left">预订须知<span class="mpg-iconfont">F</span></span>
              -->
            </div>
            <div class="mp-ticket-detail" data-clktype="product-detail" data-sightid="12138" data-preference="false" data-pid="51033316" data-priceid="3751698412" data-straightsign="false" data-classify="1" data-supid="18594"></div>
           </div>
          </div>
          <div class="mp-ticket-side mp-flexbox-layout">
           <a href="jacascript::void(0)" data-pid="51033316" data-type="ticket" data-inactivity="false" data-redid="" data-hasmob="" data-suppliertype="3" data-supplierid="18594" data-suppliername="e景游景区智能导游" data-teamtype="1" class="mp-ticket-link" mp-role="TicketLink" title="北京大学门票"><strong class="mp-ticket-sale mp-price">&yen;<em class="mp-price-num"><?php echo $ticket['ticket_price'] ?></em></strong><em mp-role="downloadAppBtn" class="mp-ticket-btn">预订</em></a>
          </div>
         </div>
        <?php endforeach; ?> 

         <div class="mp-more-refresh mp-border-top" mp-role="moreButton">
          查看剩余报价
          <span class="mp-iconfont">E</span>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  </div>
 </body>
</html>