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
                <h2><i class="fa fa-automobile"></i> 设备管理</h2>
                <table id="vehicles" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="device-id">#</th>
                            <th class="device-name">设备名称</th>
                            <th class="device-number">设备编号</th>
                            <th class="device-phone">设备手机号</th>
                            <th class="device-phone-operate">设备手机运营商</th>
                            <th class="device-install-time">设备安装时间</th>
                            <th class="message-send">信息发送方式</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ( $devices as $device ): ?>
                        <tr data-value="<?php echo $device['device_id']; ?>">
                            <td class="device-id"><?php echo $device['device_id']; ?></td>
                            <td class="device-name"><?php echo $device['device_name']; ?></td>
                            <td class="device-number"><?php echo $device['device_number']; ?></td>
                            <td class="device-phoneber"><?php echo $device['device_phone_num']; ?></td>
                            <td class="device-phone-operate"><?php echo $device['device_phone_name']; ?></td>
                            <td class="device-install-time"><?php echo $device['device_install_time']; ?></td>
                            <td class="device-install-time"><?php echo $device['message_send_name']; ?></td>
                            <td>
                                <a href="javascript:void(0);" class="edit">[编辑]</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div> <!-- #content -->
        </div> <!-- #container -->
    </div> <!-- #wrapper -->
    <div id="edit-modal" class="modal fade hide" data-value="0">
        <div class="modal-header">
            <button type="button" class="close" data-dismise="modal" aria-hidden="true" >&times;</button>
            <h2><i class="fa fa-cogs"></i> 设备信息编辑</h2>
        </div>
        <div class="modal-body">
            <div class="alert alert-error hide"></div>
            <div id='device-info'> 
                    <div >
                    <div class="row-fluid">
                        <div class='span4'>
                            <label for="device-name">设备名称</label>
                        </div>
                        <div class="span8">
                            <input id="device-name" class="span12" type="text"  maxlength="7" />
                        </div>
                    </div><!---row-fluid-->
                    <div class="row-fluid">
                        <div class='span4'>
                            <label for="device-number">设备编号</label>
                        </div>
                        <div class="span8">
                            <input id="device-number" class="span12" type="text"  maxlength="7" />
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
                            <label for="phone-carrier">运营商</label>
                        </div> <!-- .span4 -->
                        <div class="span8">
                            <select id="phone-carrier">
                                <option value=-1></option>
                                <option value=0>移动</option>
                                <option value=1>联通</option>
                                <option value=2>电信</option>
                            </select>
                        </div> <!-- .span8 -->
                    </div> <!-- .row-fluid -->
                    <div class="row-fluid">
                            <div class="span4">
                                <label for="start-time">安装时间</label>   
                            </div>
                            <div class="span8" data-date-format="yyyy-mm-dd hh:ii">
                                <input id="install-time" class="span12" type="text">
                            </div> <!-- .input-append -->
                    </div> <!-- .row-fluid -->
                    <div class="row-fluid">
                        <div class="span4">
                            <label for="message-send">信息发送方式</label>
                        </div> <!-- .span4 -->
                        <div class="span8">
                            <select id="message-send">
                                <option value=-1></option>
                                <option value=1>短信</option>
                                <option value=2>联网</option>
                            </select>
                        </div> <!-- .span8 -->
                    </div> <!-- .row-fluid -->
                </div>
            </div> <!--#vehicle info -->
        </div><!--#modal-body-->
        <div class="modal-footer">
            <div class="row-fluid">
                <div class="span12">
                    <button id="edit-submit" class="btn btn-primary" aria-hidden="true">提交信息</button>
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
    <script>
        $('.edit').click(function() {
            var deviceRow  = $(this).parent().parent(),
                deviceId   = $(deviceRow).attr('data-value'),
                deviceName = $('.device-name', deviceRow).html();

            $('#edit-modal').attr('data-value', deviceId);
            $.ajax({
                type: 'GET',
                async: false,
                url: '<?php echo base_url('./dashboard/get-device')?>',
                data: {
                    'device_id': deviceId
                },
                dataType: 'JSON',
                success: function(result) {
                    var device = result['device'];

                    $('#device-name').val(device['device_name']);
                    $('#device-number').val(device['device_number']);
                    $('#device-phone').val(device['device_phone_num']);
                    $('#install-time').val(device['device_install_time']);
                    $('#phone-carrier').val(device['device_phone_category_id']);
                    $('#message-send').val(device['device_message_category']);
                }
            });

            $('.alert-error').addClass('hide');
            $('#device-number').attr('disabled', true);
            $('#device-name').attr('disabled', true)
            $('#install-time').attr('disabled', true);
            $('#edit-modal').modal();
        });
    </script>
    <script>
        $('.btn-primary').click(function() {
            var deviceName            = $('#device-name').val(),
                deviceNumber          = $('#device-number').val(),
                devicePhoneNumber     = $('#device-phone').val(),
                devicePhoneOperate    = $('#phone-carrier').val(),
                deviceMessageCategory = $('#message-send').val(),
                deviceInstallTime     = $('#install-time').val(),
                errorMessage          = '';
            
            if ( !isDeviceNameLegal(deviceName) ) {
                errorMessage += '请输入正确的设备名(设备+8位编号):如设备11111111</br>';
            }

            if ( !isDeviceNumberLegal(deviceNumber) ) {
                errorMessage += '请输入8位设备编号如：88888888<br>';
            }

            if ( !isDevicePhoneNumberLegal(devicePhoneNumber) ) {
                errorMessage += '请输入正确的手机号码<br>';
            }

            if ( devicePhoneOperate == -1 || deviceMessageCategory == -1 ) {
                errorMessage += '请选择设备手机运营商或信息发送方式<br>';
            }

            if ( errorMessage == '' ) {
                doUpdateDeviceAction(deviceName, deviceNumber, devicePhoneNumber, devicePhoneOperate, deviceMessageCategory, deviceInstallTime);
                window.location.href = 'all-devices';
            } else {
                $('.alert-error').html(errorMessage);
                $('.alert-error').removeClass('hide');
            }
        });
    </script>
    <script>
        function doUpdateDeviceAction(deviceName, deviceNumber, devicePhoneNumber, devicePhoneOperate, deviceMessageCategory, deviceInstallTime) {
            $.ajax({
                type : "POST",
                url: '<?php echo base_url('/dashboard/do-update-device-action'); ?>',
                data: {
                    'device_name': deviceName,
                    'device_number': deviceNumber,
                    'device_phone_num': devicePhoneNumber,
                    'device_phone_category': devicePhoneOperate,
                    'device_message_category': deviceMessageCategory,
                    'device_install_time': deviceInstallTime
                },
                dataType :'JSON'
            });
        }
    </script>
    <script>
        function isDeviceNumberLegal(deviceName) {
            var regular = /^[0-9]\d*$/;
            return regular.test(deviceName);
        }
    </script>
    <script>
        function isDevicePhoneNumberLegal(devicePhoneNumber) {
            var regular = /(13\d|14[57]|15[^4,\D]|17[678]|18\d)\d{8}|170[059]\d{7}/;
            return regular.test(devicePhoneNumber);
        }
    </script>
    <script>
        function isDeviceNameLegal(deviceName) {
            var regular = /^[\u4e00-\u9fa5]{2}\d{8}$/;
            return regular.test(deviceName);
        }
    </script>
</body>
</html>
