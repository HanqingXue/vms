<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>系统设置 | 油田车辆实时状态监测系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icon -->
    <link rel="shortcut icon" href="<?php echo base_url('/favicon.ico'); ?>" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/bootstrap-responsive.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/flat-ui.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/font-awesome.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/style.css');?>"/>
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/dashboard/materials.css');?>"/>
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
                <h2><i class="fa fa-cogs"></i> 车辆信息录入</h2>
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
                                    <option value=2>后倾用车</option>
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
                        <div class="row-fluid">
                            <div class="span12">
                                <button class="btn btn-primary btn-block">提交信息</button>
                            </div> <!-- .span12 -->
                        </div> <!-- .row-fluid -->
                    </div>
                </div> <!--#vehicle info -->
            </div> <!-- #content -->
        </div> <!-- #container -->        
    </div> <!-- #wrapper -->
    <!-- Java Script -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo base_url('/assets/js/site.js'); ?>"></script>
    <script>
        function isPassengerNumLegal(vehiclePassengers) {
            var regular =  /^[0-9]*[1-9][0-9]*$/
            return regular.test(vehiclePassengers);
        }
    </script>
    <script>
        function isVehicleDisplacementLegal(vehicleDisplacement)　{
            var regular = /^\d+(\.\d+)?$/
            return regular.test(vehicleDisplacement);
        }
    </script>
    <script>
        function isVehicleNameLegal(vehicleName) {
            var regular = /^[\u4E00-\u9FA5][\da-zA-Z]{6}$/
            return regular.test(vehicleName);
        }
    </script>
    <script>
        $('.btn-primary').click(function() {
            console.log('hello');
            console.log('submit');
            var vehicleName = $('#vehicle-name').val();
                vehiclePassengers =  $('#passengers').val();
                vehicleDriveModeId = $('#drive-model').val();
                vehicleCategoryId  = $('#vehicles-categories').val();
                vehicleDisplacement = $('#displacement').val();
            var errormessage = ''

            if(!isVehicleNameLegal(vehicleName)) {
                errormessage += '请填写有效的车牌号.<br>';
            }

            if(vehicleDriveModeId == -1) {
                errormessage += '请选择车辆驱动模式.<br>';
            }

            if(vehicleCategoryId == -1) {
                errormessage += '请选择车辆种类.<br>'
            }

            if(!isVehicleDisplacementLegal(vehicleDisplacement)) {
                errormessage += '请填写有效的排量.<br>'
            }

            if(!isPassengerNumLegal(vehiclePassengers)) {
                errormessage += '请填写有效的乘客数.<br>';
            }

            if(errormessage == ''){
                doAddVehicleAction(vehicleName, vehiclePassengers, vehicleDriveModeId, vehicleCategoryId, vehicleDisplacement);
                window.location.href = 'vehicles';   
            } else {
                $('.alert-error').html(errormessage);
                $('.alert-error').removeClass('hide');
            }       

        });
    </script>
    <script>
        function doAddVehicleAction(vehicleName, vehiclePassengers, vehicleDriveModeId, vehicleCategoryId, vehicleDisplacement) {
            $.ajax({
                type : "POST",
                url: '<?php echo base_url('/dashboard/do-add-vehicle-action'); ?>',
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
