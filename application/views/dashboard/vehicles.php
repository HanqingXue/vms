<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>车辆管理 | 油田车辆实时状态监测系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icon -->
    <link rel="shortcut icon" href="<?php echo base_url('/favicon.ico'); ?>" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/bootstrap-responsive.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/flat-ui.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/bootstrap.datetimepicker.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/font-awesome.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/style.css');?>"/>
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/dashboard/vehicles.css');?>"/>
    <!-- Java Script -->
    <script type="text/javascript" src="<?php echo base_url('/assets/js/jquery-1.11.1.min.js'); ?>" > </script>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.min.js'); ?>" > </script>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/flat-ui.min.js'); ?>" > </script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/pace.min.js'); ?>"></script>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
       <?php include_once('sidebar.php') ?>
        <div id="container">
            <!-- Header -->
            <?php include_once('header.php') ?>
            <!-- Content -->
            <div id="content">
                <h2><i class="fa fa-automobile"></i> 车辆管理</h2>
                <table id="vehicles" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="vehicle-id">#</th>
                            <th class="vehicle-name">车牌号</th>
                            <th class="vehicle-drive-mode">驱动形式</th>
                            <th class="vehicle-category">车辆种类</th>
                            <th class="vehicle-passengers">乘员人数</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ( $vehicles as $vehicle ): ?>
                        <tr data-value="<?php echo $vehicle['vehicle_id']; ?>">
                            <td class="vehicle-id"><?php echo $vehicle['vehicle_id']; ?></td>
                            <td class="vehicle-name"><?php echo $vehicle['vehicle_name']; ?></td>
                            <td class="vehicle-drive-mode"><?php echo $vehicle['vehicle_drive_mode_name']; ?></td>
                            <td class="vehicle-catrgory"><?php echo $vehicle['vehicle_catrgories_name']; ?></td>
                            <td class="vehicle-passengers"><?php echo $vehicle['vehicle_passengers']; ?></td>
                            <td>
                                <a href="javascript:void(0);" class="view">[查看]</a>
                                <a href="javascript:void(0);" class="edit">[编辑]</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div> <!-- #content -->
        </div> <!-- #container -->
    </div> <!-- #wrapper -->
    <div id="vehicle-modal" class="modal fade hide" data-value="0">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h5><i class="fa fa-automobile"></i> 车辆轨迹回放</h5>
        </div> <!-- .modal-header -->
        <div class="modal-body">
            <div class="row-fluid">
                <div class="span6">
                    <label for="start-time">起始时间</label>
                    <div class="controls input-append date form-datetime" data-date-format="yyyy-mm-dd hh:ii">
                        <input id="start-time" class="span12" type="text" value="" readonly>
                        <span class="add-on"><i class="icon-th"></i></span>
                    </div> <!-- .input-append -->
                </div> <!-- .span6 -->
                <div class="span6">
                    <label for="end-time">结束时间</label>
                    <div class="controls input-append date form-datetime" data-date-format="yyyy-mm-dd hh:ii">
                        <input id="end-time" class="span12" type="text" value="" readonly>
                        <span class="add-on"><i class="icon-th"></i></span>
                    </div> <!-- .input-append -->
                </div> <!-- .span6 -->
            </div> <!-- .row-fluid -->
            <div class="row-fluid">
                <div class="span12">
                    <div id="map-container">
                        <div id="amap"></div> <!-- #amap -->
                    </div> <!-- #map-container -->
                </div> <!-- .span12 -->
            </div> <!-- .row-fluid -->
        </div> <!-- .modal-body -->
        <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">关闭</button>
        </div> <!-- .modal-footer -->
    </div>
    <div id="edit-modal" class="modal fade hide" data-value="0">
        <div class="modal-header">
            <button type="button" class="close" data-dismise="modal" aria-hidden="true" >&times;</button>
            <h2><i class="fa fa-cogs"></i> 车辆信息编辑</h2>
        </div>
        <div class="modal-body">
            <div class="alert alert-error hide"></div>
            <div id='vehicle-info'> 
                <div id='based-info' class='section'> </div>
                    <div >
                    <div class="row-fluid">
                        <div class='span4'>
                            <label for="vehicle-name">车牌号</label>
                        </div>
                        <div class="span8">
                            <input id="vehicle-name" class="span12" type="text"  maxlength="7" />
                        </div>
                    </div><!---row-fluid-->
                    <div class="row-fluid">
                        <div class="span4">
                            <label for="vehicles-categories">车辆种类</label>
                        </div> <!-- .span4 -->
                        <div class="span8">
                            <select id="vehicles-categories" class="from-vehicles">
                                <option value=-1></option>
                                <option value=0>管理用车</option>
                                <option value=1>生产用车</option>
                                <option value=2>后勤用车</option>
                            </select>
                        </div> <!-- .span8 -->
                    </div> <!-- .row-fluid -->
                    <div class="row-fluid">
                        <div class="span4">
                            <label for="drive-model">驱动形式</label>
                        </div> <!-- .span4 -->
                        <div class="span8">
                            <select id="drive-model" class="to-vehicles">
                                <option value=-1></option>
                                <option value=1>四轮驱动</option>
                                <option value=2>双轮驱动</option>                                      
                            </select>
                        </div> <!-- .span8 -->
                    </div> <!-- .row-fluid -->
                    <div class="row-fluid">
                        <div class="span4">
                            <label for="displacement">汽车排量</label>
                        </div> <!-- .span4 -->
                        <div class="span8">
                            <input id="displacement" class="span12" type="text" maxlength="4" />
                        </div> <!-- .span8 -->
                    </div> <!-- .row-fluid -->
                    <div class="row-fluid">
                        <div class='span4'>
                            <label for="passengers">乘员人数</label>
                        </div>
                        <div class="span8">
                            <input id="passengers" class="span12" type="text"  maxlength="4" />
                        </div>
                    </div><!---row-fluid-->
                </div>
            </div> <!--#vehicle info -->
        </div><!--#modal-body-->
        <div class="modal-footer">
            <div class="row-fluid">
                <div class="span12">
                    <button id="editSubmitButton" class="btn btn-primary" aria-hidden="true">提交信息</button>
                </div> <!-- .span12 -->
            </div> <!-- .row-fluid -->

        </div>
    </div>
    <!-- Java Script -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo base_url('/assets/js/site.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/socket.io-1.4.5.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.datetimepicker.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.datetimepicker.zh-CN.js'); ?>"></script>
    <script type="text/javascript">
        $(function() {
            resizeMapContainer();

            $('.form-datetime').datetimepicker({
                language:  'zh-CN',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                endDate: '<?php echo date('Y-m-d H:i'); ?>',
                forceParse: 0,
                showMeridian: 1
            });
        });

        $(window).resize(function() {
            resizeMapContainer();
        });
    </script>
    <script type="text/javascript">
        function resizeMapContainer() {
            var windowHeight    = $(window).height(),
                preservedHeight = 400;

            $('#map-container').css('height', windowHeight - preservedHeight);
        }
    </script>
    <script type="text/javascript" src="//webapi.amap.com/maps?v=1.3&key=69d6b9d730573496ee94af33e8ab1b7a&callback=initMapObjects"></script>
    <script type="text/javascript">
        function initMapObjects() {
            mapObject = new AMap.Map('amap', {
                resizeEnable: true,
                zoom: 11,
                center: [125.01432, 46.597942]
            });
            mapObject.setLang('zh');
            mapObject.setCity('北京');
            mapObject.plugin(["AMap.OverView"],function(){  //
                var overView = new AMap.OverView({
                    visible: true //初始化显示鹰眼
                });
                mapObject.addControl(overView);
                overView.open(); //展开鹰眼
            });

            mapObject.plugin(['AMap.ToolBar'], function() {
                 var toolBar = new AMap.ToolBar();
                 mapObject.addControl(toolBar);
            });

            mapObject.plugin(['AMap.Scale'],function() {
                var scale  = new AMap.Scale();
                mapObject.addControl(scale);
            });
        }
    </script>
    <script type="text/javascript">
        $('.btn-info', '.section').click(function() {
            var container   = $(this).parent().parent(),
                isBodyShown = $('.body', $(container)).is(':visible');
            if ( isBodyShown ) {
                $(this).html('展开');
                $('.body', $(container)).slideUp();
            } else {
                $(this).html('收起');
                $('.body', $(container)).slideDown();
            }
        });
    </script>
    <script type="text/javascript">
        $('input[type=checkbox]', '#columns-filter').change(function() {
            var columnName = $(this).attr('id').substr(7),
                isChecked  = $(this).parent().hasClass('checked');

            if ( isChecked ) {
                $('.' + columnName).removeClass('hide');
            } else {
                $('.' + columnName).addClass('hide');
            }
        });
    </script>
    <script type="text/javascript">
        $('.view').click(function() {
            var vehicleRow  = $(this).parent().parent();
                vehicleId   = $(vehicleRow).attr('data-value'),
                vehicleName = $('.vehicle-name', vehicleRow).html();

            $('#start-time').val('');
            $('#end-time').val('');
            mapObject.clearMap();
            $('#vehicle-modal').attr('data-value', vehicleId);
            $('#vehicle-modal').modal();
        });
    </script>
    <script type="text/javascript">
        $('.edit').click(function() {
            console.log('click');
            var vehicleRow  = $(this).parent().parent();
                vehicleId   = $(vehicleRow).attr('data-value'),
                vehicleName = $('.vehicle-name', vehicleRow).html();

            $('#edit-modal').attr('data-value', vehicleId);
            $.ajax({
                type: 'GET',
                async: false,
                url: '<?php echo base_url('/dashboard/get-vehicle'); ?>',
                data: {
                    'vehicle_id': vehicleId
                },
                dataType: 'JSON',
                success: function(result){
                    var vehicle = result['vehicle'],
                        vehicleName = vehicle['vehicle_name'],
                        vehiclePassengers = vehicle['vehicle_passengers'],
                        vehicleDriveModeId = vehicle['vehicle_drive_mode_id'],
                        vehicleCategoryId = vehicle['vehicle_category_id'],
                        vehicleDisplacement = vehicle['vehicle_displacement'];
                    console.log(vehicle['vehicle_displacement']);
                    
                    $('#vehicle-name').attr('disabled', true);
                    $('#vehicle-name').val(vehicleName);
                    $('#displacement').val(vehicle['vehicle_displacement']);
                    $('#passengers').val(vehiclePassengers);
                    $('#drive-model').val(vehicleDriveModeId);
                    $('#vehicles-categories').val(vehicleCategoryId);
                    
                }
            });
            $('.alert-error').addClass('hide');
            $('#edit-modal').modal();
        });
    </script>
    <script type="text/javascript">
        function isPassengerNumLegal(vehiclePassengers) {
            var regular =  /^[0-9]*[1-9][0-9]*$/
            return regular.test(vehiclePassengers);
        }
    </script>
    <script type="text/javascript">
        function isVehicleDisplacementLegal(vehicleDisplacement)　{
            var regular = /^\d+(\.\d+)?$/
            return regular.test(vehicleDisplacement);
        }
    </script>
    <script type="text/javascript">
        function isVehicleNameLegal(vehicleName) {
            var regular = /^[\u4E00-\u9FA5][\da-zA-Z]{6}$/
            return regular.test(vehicleName);
        }
    </script>
    <script type="text/javascript">
        $('.btn-primary').click(function(){
            console.log('submit');
            var vehicleName = $('#vehicle-name').val();
                vehiclePassengers =  $('#passengers').val();
                vehicleDriveModeId = $('#drive-model').val();
                vehicleCategoryId  = $('#vehicles-categories').val();
                vehicleDisplacement = $('#displacement').val();
            var errorMessage = ''

            if(!isVehicleNameLegal(vehicleName)) {
                errorMessage += '请填写有效的车牌号.<br>';
            }

            if(vehicleDriveModeId == -1) {
                errorMessage += '请选择车辆驱动模式.<br>';
            }

            if(vehicleCategoryId == -1) {
                errorMessage += '请选择车辆种类.<br>'
            }

            if(!isVehicleDisplacementLegal(vehicleDisplacement)) {
                errorMessage += '请填写有效的排量.<br>'
            }

            if(!isPassengerNumLegal(vehiclePassengers)) {
                errorMessage += '请填写有效的乘客数.<br>';
            }

            if(errorMessage == ''){
                doUpdateVehicleAction(vehicleName, vehiclePassengers, vehicleDriveModeId, vehicleCategoryId, vehicleDisplacement);
                window.location.href = 'vehicles';   
            } else {
                $('.alert-error').html(errorMessage);
                $('.alert-error').removeClass('hide');
            }

        });
    </script>
    <script type="text/javascript">
        $('#start-time').change(function() {
            return getTrack();
        });

        $('#end-time').change(function() {
            return getTrack();
        });
    </script>
    <script type="text/javascript">
        function getTrack() {
            var vehicleId = $('#vehicle-modal').attr('data-value'),
                startTime = $('#start-time').val(),
                endTime   = $('#end-time').val();

            if ( startTime == '' || endTime == '' ) {
                return;
            }

            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('/dashboard/get-track-of-vehicle'); ?>',
                data: {
                    'vehicle_id': vehicleId,
                    'start_time': startTime,
                    'end_time': endTime
                },
                dataType: 'JSON',
                success: function(result){
                    var linearr = []
                    for( index in result ){
                        linearr.push([result[index]['longitude'], result[index]['latitude']]);
                    }
                    displayTrack(linearr,mapObject);
                }
            });
        }
    </script>
    <script type="text/javascript">
        /**
         * 全局变量声明.
         *
         * vehicleNameMapper： 存储车辆名称和车辆ID的对应关系
         */
        vehicleNameMapper = {
        <?php foreach ( $vehicles as $vehicle ): ?>
            '<?php echo $vehicle['vehicle_name'] ?>': <?php echo $vehicle['vehicle_id'] ?>,
        <?php endforeach; ?>
        };
        vehicleCatrgoryDic = ['其他车辆', '管理用车',　'生产用车',　 '后勤用车'];
    </script>
    <script type="text/javascript">
        var socket = io('http://localhost:3000');

        // Received welcome message from server
        socket.on('established', function (message) {
            console.log(message);
        });
        // Receive real-time attributes from server
        socket.on('notify-attributes', function (attributes) {
            var attributes          = JSON.parse(attributes);

            // Update attribute and map markers
            for ( var vehicleName in attributes ) {
                var attribute   = attributes[vehicleName],
                    vehicleId   = vehicleNameMapper[vehicleName],
                    vehicleRow  = $('tr[data-value=%s]'.format(vehicleId));

                for ( attributeName in attribute ) {
                    $('.%s'.format(attributeName), vehicleRow).html(attribute[attributeName]);
                }
            }
        });
    </script>
    <script type='text/javascript'>
        function displayTrack(tarcebackLine, mapObject) {
            var speed = 500,
                tracebackMaker = new AMap.Marker({
                    icon: "http://webapi.amap.com/images/car.png",
                    offset: new AMap.Pixel(-26, -13),
                    autoRotation: true
                }),
                polyline = new AMap.Polyline({
                    map: mapObject,
                    path: tarcebackLine,
                    strokeColor: "#FF0000",  // 线颜色
                    strokeOpacity: 1,     // 线透明度
                    strokeWeight: 3,      // 线宽
                    strokeStyle: "dashed"  // 线样式
                 });

            tracebackMaker.setMap(mapObject);
            polyline.setMap(mapObject);
            tracebackMaker.moveAlong(tarcebackLine, speed);
        }
    </script>
    <script type="text/javascript">
        function doUpdateVehicleAction(vehicleName, vehiclePassengers, vehicleDriveModeId, vehicleCategoryId, vehicleDisplacement) {
            $.ajax({
                type : "POST",
                url: '<?php echo base_url('/dashboard/do-update-vehicle-action'); ?>',
                data: {
                    'vehicle_name': vehicleName,
                    'vehicle_passengers': vehiclePassengers,
                    'vehicle_drive_mode_id': vehicleDriveModeId,
                    'vehicle_category_id': vehicleCategoryId,
                    'vehicle_displacement': vehicleDisplacement
                },
                dataType :'JSON',
                success: function(result) {
                    console.log(result);
                }
            });
        }
    </script>
</body>
</html>
