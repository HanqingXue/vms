<!DOCTYPE html>
<!-- saved from url=(0035)http://m.elong.com/?t=1528875383064 -->
<html>
  
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>92农家乐移动版</title>
    <meta name="full-screen" content="yes">
    <meta name="browsermode" content="application">
    <link rel="icon shortcut bookmark" href="data:;base64,iVBORw0KGgo=">
    <link rel="apple-touch-icon" href="data:;base64,iVBORw0KGgo=">
    <link rel="dns-prefetch" href="http://m.elongstatic.com/">
    <link rel="preconnect" href="http://m.elongstatic.com/">
    <meta name="x5-orientation" content="portrait">
    <meta name="x5-fullscreen" content="true">
    <meta name="x5-page-mode" content="app">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet"  href=" <?php echo base_url('/assets/css/bootstrap3.css'); ?>">
    <link rel="stylesheet"  href=" <?php echo base_url('/assets/css/homepage.css'); ?>">
    <link rel="stylesheet"  href=" <?php echo base_url('/assets/css/idangerous.swiper.css'); ?>">
    <link rel="stylesheet"  href=" <?php echo base_url('/assets/css/styles.css'); ?>">
    <link rel="stylesheet"  href=" <?php echo base_url('/assets/css/layout.min.css'); ?>">
    <link rel="stylesheet"  href=" <?php echo base_url('/assets/css/scs.min.css'); ?>">
    <style type="text/css">.validate-code-by-intercept{position:absolute;top:50%;left:50%;margin-top:-120px;margin-left:-153px;padding-top:10px;height:220px;width:306px;z-index:15000;background-color:#fff;text-align:center;font-size:16px;font-weight:700;color:#353535}.validate-code-by-intercept .form-li{clear:both;height:44px;line-height:44px;margin:3px 12px}.validate-code-by-intercept .form-li2{overflow:hidden;border-radius:5px;border:1px solid #ddd;background-clip:padding-box;margin-bottom:10px}.validate-code-by-intercept input.txt{width:100%;padding:11px 10px 11px 13px;display:block;margin:0;border:0;background:0;font:16px/1.4 Helvetica Neue,HelveticaNeue,Helvetica,Arial,sans-serif}.validate-code-by-intercept .submit{font-size:1.1rem;width:100%;height:40px;line-height:40px;text-align:center;color:#fff;border-radius:5px;border-width:0;background-color:#e65749;margin:0 0 10px}</style>
    <script src =" <?php echo base_url('/assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
    <script src =" <?php echo base_url('/assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
    <script src =" <?php echo base_url('/assets/js/fs-modal.min.js'); ?>" type="text/javascript"></script>
    <script src =" <?php echo base_url('/assets/js/moment.js'); ?>" type="text/javascript"></script>
    <script src =" <?php echo base_url('/assets/js/bootstrap-datetimepicker.js'); ?>" type="text/javascript"></script>
    <script src =" <?php echo base_url('/assets/js/CNAddrArr.min.js'); ?>" type="text/javascript"></script>
    <script src =" <?php echo base_url('/assets/js/jquery.scs.min.js'); ?>" type="text/javascript"></script>
  </head>
  
  <body>
    <div class="pages">
      <div class="page page-on-center" >
        <div class="page-content page-search">
          <span class="logo"></span>
            <div class="swiper-slide swiper-slide-duplicate" style="background-image: url('<?php echo base_url('/assets/img/title.jpg'); ?>'); width: 100%">
            </div>
          <div class="search-wrap">
            <div class="search-lb">
              <ul class="search-list">
                <li class="addr">
                  <i class="addr"></i>
                  <p class="cityname tjclick" city-id="0101" >
                    <input type="text" readonly placeholder="Click me to pick an address" id="myAddrs" name="addr" data-key="4-84-1298" value="北京市 海淀区">
                  </p>
                  <i class="icon-left"></i>
                  <b class="right isnearby tjclick" >
                    <i class="icon-nearby"></i>
                    <span>附近</span></b>
                </li>
                <li class="date">
                  <i class="icon-time"></i>
                  <div class="d1 tjclick">
                    <p class="type">入住
                      <span class="night" style="display: none;">深夜</span></p>
                    <p>
                      <span class="indate" data-value="2018-06-13">
                        <div class="iDate date">
                          <input type="text" class="addOn" style="padding-left: 0px;width:100%; ">
                        </div>
                      </span>
                  </div>
                  <div class="d2"></div>
                  <div class="d3 tjclick">
                    <p class="type">离店</p>
                    <p>
                      <span class="outdate" >
                        <div class="iDate date">
                          <input type="text" class="addOn" style="padding-left: 0px;width:100%; ">
                        </div>
                      </span>
                  </div>
                  <div class="d4 total">1晚</div>
                  <i class="icon-left"></i>
                </li>
                <li class="name">
                  <!--输入内容添加on-->
                  <div class="sea-box">
                    <i class="name"></i>
                    <input type="input" value="" placeholder="酒店名称/位置不限" readonly="readonly">
                    <i class="icon-left"></i>
                  </div>
                  <span class="close">
                    <i class="icon-cross"></i>
                  </span>
                </li>
                <li class="pri">
                  <div class="price-star-btn tjclick">
                    <i class="pri"></i>
                    <input class="title-phone" type="input" value="" placeholder="价格星级不限" readonly="readonly" data-toggle="modal" data-target="#modalSmall" id='s'>
                    <i class="icon-left"></i>
                  </div>
                  <span class="close">
                    <i class="icon-cross"></i>
                  </span>
                </li>
              </ul>
              <div class="search-btn tjclick" >
                <i>
                </i>搜索</div>
            </div>
          </div>
          <div class="search-nav">
            <ul class="search-nav-list">
              <li class="tjclick">
                <a href="dashboard/hotels">
                  <i class="icon-nav5"></i>
                  <span>农家民宿</span></a>
              </li>
              <li class="tjclick" >
                <a href="dashboard/notes">
                  <i class="icon-nav7"></i>
                  <span>景点</span></a>
              </li>
              <li class="tjclick" >
                <a href="dashboard/travels">
                  <i class="icon-nav6"></i>
                  <span>攻略美文</span></a>
              </li>
              <li class="tjclick" >
                <a class="search-nav-hi"  href="dashboard/tickets">
                  <i class="icon-nav11"></i>
                  <span>门票</span></a>
              </li>
              <li class="tjclick" >
                <a href="">
                  <i class="icon-nav2"></i>
                  <span>农家特产</span></a>
              </li>
            </ul>
          </div>
          <div class="search-tool">
            <div class="search-tool-tit">
              <i class="search-tool-i3"></i>我的</div>
            <ul class="search-tool-list">
              <li class="tjclick">
                <a href="/vms/accounts">
                  <i class="search-tool-i1"></i>账户</a>
              </li>
              <li class="tjclick">
                <a href="/vms/accounts/order">
                  <i class="search-tool-i2"></i>订单</a>
              </li>
              <li class="tjclick">
                <a href="">
                  <i class="search-tool-i3"></i>电话</a>
              </li>
            </ul>
          </div>
          <div class="search-city">
            <div class="search-city-title">
              <p>热门城市</p>
            </div>
            <ul class="search-city-list">
              <!-- 延迟加载 -->
              <li class="city1">
                <div  city-name="北京">
                  <h2>北京</h2>
                  <p>共有
                    <span>6410</span>家酒店</p>
                  <i class="icon-left"></i>
                </div>
              </li>
              <li class="city2">
                <div  city-name="上海">
                  <h2>上海</h2>
                  <p>共有
                    <span>4160</span>家酒店</p>
                  <i class="icon-left"></i>
                </div>
              </li>
              <li class="city3">
                <div city-name="广州">
                  <h2>广州</h2>
                  <p>共有
                    <span>4271</span>家酒店</p>
                  <i class="icon-left"></i>
                </div>
              </li>
            </ul>
          </div>

          <div class="modal fade " id="modalSmall" tabindex="-1" role="dialog" aria-labelledby="modalSmallLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">

                      <div class="modal-body">
                        <p style="margin-bottom: 1px;">星级</p>
                        <div class="btn-group" style="margin-bottom: 10px;">
                            <button type="button" class="btn btn-default">不限</button>
                            <button type="button" class="btn btn-default">经济</button>
                            <button type="button" class="btn btn-default">三星</button>
                            <button type="button" class="btn btn-default">四星</button>
                            <button type="button" class="btn btn-default">五星</button>
                        </div>
                        <p style="margin-bottom: 1px;">价格</p>
                        <div class="btn-group" style="margin-bottom: 10px;">
                            <button type="button" class="btn btn-default">不限</button>
                            <button type="button" class="btn btn-default">0-150</button>
                            <button type="button" class="btn btn-default">150-300</button>
                            <button type="button" class="btn btn-default">300-700</button>
                            <button type="button" class="btn btn-default">700以上</button>
                        </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                          <button type="button" id="btnTestSaveSmall" class="btn btn-default btn-primary" data-glyphicon="glyphicon-ok">保存</button>
                      </div>
                  </div>
              </div>
          </div>
          <footer>©2018
            <br></a></footer>
        </div>
      </div>
    </div>
    
      <script>
        $('#btnTestSaveSmall').on('click', function() {
          $(this).parents('.modal').modal('hide');
        });
      </script>

      <script type="text/javascript">
        $(document).ready(function(){
            // date time picker
            if($(".iDate.full").length>0){
                $(".iDate.full").datetimepicker({
                    locale: "zh-cn",
                    format: "YYYY-MM-DD a hh:mm",
                    dayViewHeaderFormat: "YYYY年 MMMM"
                });
            }
            if($(".iDate.date").length>0){
                $(".iDate.date").datetimepicker({
                    locale:"zh-cn",
                    format:"YYYY-MM-DD",
                    dayViewHeaderFormat:"YYYY年 MMMM"
                });
            }
        })
    </script>

          <script>
    $(function() {
        /**
         * 通过数组id获取地址列表数组
         *
         * @param {Number} id
         * @return {Array} 
         */ 
        function getAddrsArrayById(id) {
            var results = [];
            if (addr_arr[id] != undefined)
                addr_arr[id].forEach(function(subArr) {
                    results.push({
                        key: subArr[0],
                        val: subArr[1]
                    });
                });
            else {
                return;
            }
            return results;
        }
        /**
         * 通过开始的key获取开始时应该选中开始数组中哪个元素
         *
         * @param {Array} StartArr
         * @param {Number|String} key
         * @return {Number} 
         */         
        function getStartIndexByKeyFromStartArr(startArr, key) {
            var result = 0;
            if (startArr != undefined)
                startArr.forEach(function(obj, index) {
                    if (obj.key == key) {
                        result = index;
                        return false;
                    }
                });
            return result;
        }

        //bind the click event for 'input' element
        $("#myAddrs").click(function() {
            var PROVINCES = [],
                startCities = [],
                startDists = [];
            //Province data，shall never change.
            addr_arr[0].forEach(function(prov) {
                PROVINCES.push({
                    key: prov[0],
                    val: prov[1]
                });
            });
            //init other data.
            var $input = $(this),
                dataKey = $input.attr("data-key"),
                provKey = 1, //default province 北京
                cityKey = 36, //default city 北京
                distKey = 37, //default district 北京东城区
                distStartIndex = 0, //default 0
                cityStartIndex = 0, //default 0
                provStartIndex = 0; //default 0

            if (dataKey != "" && dataKey != undefined) {
                var sArr = dataKey.split("-");
                if (sArr.length == 3) {
                    provKey = sArr[0];
                    cityKey = sArr[1];
                    distKey = sArr[2];

                } else if (sArr.length == 2) { //such as 台湾，香港 and the like.
                    provKey = sArr[0];
                    cityKey = sArr[1];
                }
                startCities = getAddrsArrayById(provKey);
                startDists = getAddrsArrayById(cityKey);
                provStartIndex = getStartIndexByKeyFromStartArr(PROVINCES, provKey);
                cityStartIndex = getStartIndexByKeyFromStartArr(startCities, cityKey);
                distStartIndex = getStartIndexByKeyFromStartArr(startDists, distKey);
            }
            var navArr = [{//3 scrollers, and the title and id will be as follows:
                title: "省",
                id: "scs_items_prov"
            }, {
                title: "市",
                id: "scs_items_city"
            }, {
                title: "区",
                id: "scs_items_dist"
            }];
            SCS.init({
                navArr: navArr,
                onOk: function(selectedKey, selectedValue) {
                    $input.val(selectedValue).attr("data-key", selectedKey);
                }
            });
            var distScroller = new SCS.scrollCascadeSelect({
                el: "#" + navArr[2].id,
                dataArr: startDists,
                startIndex: distStartIndex
            });
            var cityScroller = new SCS.scrollCascadeSelect({
                el: "#" + navArr[1].id,
                dataArr: startCities,
                startIndex: cityStartIndex,
                onChange: function(selectedItem, selectedIndex) {
                    distScroller.render(getAddrsArrayById(selectedItem.key), 0); //re-render distScroller when cityScroller change
                }
            });
            var provScroller = new SCS.scrollCascadeSelect({
                el: "#" + navArr[0].id,
                dataArr: PROVINCES,
                startIndex: provStartIndex,
                onChange: function(selectedItem, selectedIndex) { //re-render both cityScroller and distScroller when provScroller change
                    cityScroller.render(getAddrsArrayById(selectedItem.key), 0);
                    distScroller.render(getAddrsArrayById(cityScroller.getSelectedItem().key), 0);
                }
            });
        });
    });
    </script>
  </body>

</html>