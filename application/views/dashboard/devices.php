<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>系统设置 | 油田实时状态监测系统</title>
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
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/dashboard/materials.css');?>"/>
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
                <h2><i class="fa fa-cogs"></i>设备信息录入</h2>
                <div class="alert alert-error hide"></div>
                <div id='device-info'> 
                    <div id='based-info' class='section'> </div>
                        <div >
                        <div class="row-fluid">
                            <div class='span4'>
                                <label for="device-name">设备名称</label>
                            </div>
                            <div class="span8">
                                <input id="device-name" class="span12" type="text"  maxlength="10" />
                            </div>
                        </div><!---row-fluid-->
                        <div class="row-fluid">
                            <div class='span4'>
                                <label for="device-number">设备编号</label>
                            </div>
                            <div class="span8">
                                <input id="device-number" class="span12" type="text"  maxlength="8" />
                            </div>
                        </div><!---row-fluid-->
                        <div class="row-fluid">
                            <div class='span4'>
                                <label for="device-phone">设备手机号</label>
                            </div>
                            <div class="span8">
                                <input id="device-phone" class="span12" type="text"  maxlength="11" />
                            </div>
                        </div><!---row-fluid-->

                        <div class="row-fluid">
                            <div class="span4">
                                <label for="phone-operator">运营商</label>
                            </div> <!-- .span4 -->
                            <div class="span8">
                                <select id="phone-operator" class="from-vehicles">
                                    <option value=-1></option>
                                    <option value=0>移动</option>
                                    <option value=1>联通</option>
                                    <option value=2>电信</option>
                                </select>
                            </div> <!-- .span8 -->
                        </div> <!-- .row-fluid -->
                        <div class="row-fluid">
                                <div class="span4">
                                    <label for="install-time">安装时间</label>   
                                </div>
                                <div class="controls input-append date form-datetime span8" data-date-format="yyyy-mm-dd hh:ii">
                                    <input id="install-time" class="span12" type="text" value="" readonly>
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div> <!-- .input-append -->
                        </div> <!-- .row-fluid -->
                        <div class="row-fluid">
                            <div class="span4">
                                <label for="message-send">信息发送方式</label>
                            </div> <!-- .span4 -->
                            <div class="span8">
                                <select id="message-send" class="to-vehicles">
                                    <option value=-1></option>
                                    <option value=1>短信</option>
                                    <option value=2>联网</option>
                                </select>
                            </div> <!-- .span8 -->
                        </div> <!-- .row-fluid -->
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
    <script type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.datetimepicker.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.datetimepicker.zh-CN.js'); ?>"></script>
    <script type="text/javascript">
        $(function() {
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
    </script> 
    <script type="text/javascript">
        $('.btn-primary').click(function() {
            console.log('hello');
            console.log('submit');
            var deviceName   =  $('#device-name').val(),
                deviceNumber =  $('#device-number').val(),
                devicePhoneNumber  = $('#device-phone').val(),
                devicePhoneOperate = $('#phone-operator').val(),
                deviceMessageCategory = $('#message-send').val(),
                deviceInstallTime     = $('#install-time').val(),
                errorMessage = '';
            if(!isDeviceNameLegal(deviceName)) {
                errorMessage += '请输入正确的设备名(设备+8位编号):如设备11111111</br>';
            }

            if (!isDeviceNumberLegal(deviceNumber)) {
                errorMessage += '请输入8位设备编号如：88888888<br>';
            }

            if(!isDevicePhoneNumberLegal(devicePhoneNumber)) {
                errorMessage += '请输入正确的手机号码<br>';
            }

            if(devicePhoneOperate == -1 || deviceMessageCategory == -1 ) {
                errorMessage += '请选择设备手机运营商或信息发送方式<br>';
            }

            if( errorMessage == '') {
                doAddDeviceAction(deviceName, deviceNumber, devicePhoneNumber, devicePhoneOperate, deviceMessageCategory, deviceInstallTime);
                window.location.href='all-devices';
            } else {
                $('.alert-error').html(errorMessage);
                $('.alert-error').removeClass('hide');
            }
        });
    </script>
    <script type="text/javascript">
        function doAddDeviceAction(deviceName, deviceNumber, devicePhoneNumber, devicePhoneOperate, deviceMessageCategory, deviceInstallTime) {
            $.ajax({
                type : "POST",
                url: '<?php echo base_url('/dashboard/do-add-device-action'); ?>',
                data: {
                    'device_name': deviceName,
                    'device_number': deviceNumber,
                    'device_phone_num': devicePhoneNumber,
                    'device_phone_category': devicePhoneOperate,
                    'device_message_category': deviceMessageCategory,
                    'device_install_time': deviceInstallTime
                },
                dataType :'JSON',
                success: function(result) {
                    console.log(result);
                }
            });
        }
    </script>
    <script type="text/javascript">
        function isDeviceNumberLegal(deviceName) {
            var regular = /^[0-9]\d*$/
            return regular.test(deviceName);
        }
    </script>
    <script type="text/javascript">
        function isDevicePhoneNumberLegal(devicePhoneNumber) {
            var regular = /(13\d|14[57]|15[^4,\D]|17[678]|18\d)\d{8}|170[059]\d{7}/
            return regular.test(devicePhoneNumber);
        }
    </script>
    <script type="text/javascript">
        function isDeviceNameLegal(deviceName) {
            var regular = /^[\u4e00-\u9fa5]{2}\d{8}$/
            return regular.test(deviceName);

        }
    </script>
</body>
</html>