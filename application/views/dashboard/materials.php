<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>物资调度 | 油田车辆实时状态监测系统</title>
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
                <h2><i class="fa fa-chain"></i> 物资调度</h2>
                <ul id="materials">
                <?php foreach ( $materials as $material ): ?>
                    <li class="material" data-value="<?php echo $material['material_id']; ?>">
                        <div class="header">
                            <h5><span class="material-name"><?php echo $material['material_name']; ?></span> [总计 <?php echo $material['material_total_amount']; ?> 件]</h5>
                            <a href="javascript:void(0)">
                                <i class="fa fa-caret-right"></i>
                            </a>
                        </div> <!-- .header -->
                        <div class="body hide">
                            <p class="loading">
                                <img src="<?php echo base_url('/assets/img/loading.gif'); ?>" alt="loading">
                            </p>
                            <div class="row-fluid dispatch-window hide">
                                <div class="span8">
                                    <h6>物资分配情况</h6>
                                    <ul class="material-allocation"></ul>
                                </div> <!-- .span8 -->
                                <div class="span4">
                                    <h6>物资调度</h6>
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <label for="from-vehicles">从候选车辆:</label>
                                        </div> <!-- .span4 -->
                                        <div class="span8">
                                            <select class="from-vehicles"></select>
                                        </div> <!-- .span8 -->
                                    </div> <!-- .row-fluid -->
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <label for="to-vehicles">到目标车辆:</label>
                                        </div> <!-- .span4 -->
                                        <div class="span8">
                                            <select class="to-vehicles">
                                            <?php foreach ( $vehicles as $vehicle ): ?>
                                                <option value="<?php echo $vehicle['vehicle_id']; ?>"><?php echo $vehicle['vehicle_name']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div> <!-- .span8 -->
                                    </div> <!-- .row-fluid -->
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <label for="dispatch-amount">调度数量:</label>
                                        </div> <!-- .span4 -->
                                        <div class="span8">
                                            <input class="dispatch-amount span12" type="text" maxlength="4" />
                                        </div> <!-- .span8 -->
                                    </div> <!-- .row-fluid -->
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <button class="btn btn-primary btn-block">执行调度</button>
                                        </div> <!-- .span12 -->
                                    </div> <!-- .row-fluid -->
                                </div> <!-- .span4 -->
                            </div> <!-- .row-fluid -->
                        </div> <!-- .body -->
                    </li>
                <?php endforeach; ?>
                </ul>
            </div> <!-- #content -->
        </div> <!-- #container -->        
    </div> <!-- #wrapper -->
    <!-- Java Script -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo base_url('/assets/js/site.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/socket.io-1.4.5.js'); ?>"></script>
    <script type="text/javascript">
        socket = io('http://localhost:3000');
    </script>
    <script type="text/javascript">
        $('a', '.material .header').click(function() {
            var dispatchWindow  = $(this).parent().parent(),
                isBodyVisible   = $('.body', dispatchWindow).is(':visible'),
                materialId      = $(dispatchWindow).attr('data-value');

            if ( isBodyVisible ) {
                $(this).html('<i class="fa fa-caret-right"></i>');
                $('.body', dispatchWindow).slideUp(30);
            } else {
                $(this).html('<i class="fa fa-caret-down"></i>');
                $('.loading', dispatchWindow).removeClass('hide');
                $('.dispatch-window', dispatchWindow).addClass('hide');
                $('.material-allocation', dispatchWindow).empty('');
                $('select.from-vehicles', dispatchWindow).html('');
                $('input', dispatchWindow).val('');
                console.log($('input', dispatchWindow).val(''));
                $('.body', dispatchWindow).slideDown(30);
                displayMaterialAllocation(materialId, dispatchWindow);
            }
        });
    </script>
    <script type="text/javascript">
        function displayMaterialAllocation(materialId, dispatchWindow) {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('/dashboard/get-material-allocation'); ?>',
                data: {
                    'material_id': materialId
                },
                dataType: 'JSON',
                success: function(result) {
                    for ( var index in result ) {
                        var materialAllocation  = result[index],
                            vehicleId           = materialAllocation['vehicle_id'],
                            vehicleName         = materialAllocation['vehicle_name'],
                            materialAmount      = materialAllocation['material_amount'];

                        if ( materialAmount == 0 ) {
                            continue;
                        }
                        $('.material-allocation', dispatchWindow).append(
                            '<li data-value="%s">%s: <span class="material-amount">%s</span> (件)</li>'
                                .format(vehicleId, vehicleName, materialAmount));
                        $('.from-vehicles', dispatchWindow).append(
                            '<option value="%s">%s</option>'.format(vehicleId, vehicleName));
                    }
                    $('.loading', dispatchWindow).addClass('hide');
                    $('.dispatch-window', dispatchWindow).removeClass('hide');
                }
            });
        }
    </script>
    <script type="text/javascript">
        $('.btn-primary', '.dispatch-window').click(function() {
            var dispatchWindow  = $(this).parent().parent().parent().parent().parent().parent(),
                materialId      = $(dispatchWindow).attr('data-value'),
                materialName    = $('.material-name', dispatchWindow).html(),
                fromVehicleId   = $('.from-vehicles', dispatchWindow).val(),
                fromVehicleName = $('.to-vehicles option[value=%s]'.format(fromVehicleId), dispatchWindow).html(),
                materialAmount  = parseInt($('.material-amount', '.material-allocation li[data-value=%s]'.format(fromVehicleId)).html()),
                toVehicleId     = $('.to-vehicles', dispatchWindow).val(),
                toVehicleName   = $('.to-vehicles option[value=%s]'.format(toVehicleId), dispatchWindow).html(),
                dispatchAmount  = parseInt($('.dispatch-amount', dispatchWindow).val());

            if ( fromVehicleId == toVehicleId ) {
                alert('候选车辆和目标车辆不能相同.');
                return;
            } else if ( isNaN(dispatchAmount) || dispatchAmount <= 0 || materialAmount < dispatchAmount ) {
                alert('调度数量无效.');
                return;
            }

            if ( confirm('您确定从 %s 调度 %s 件 %s 至 %s 吗'
                    .format(fromVehicleName, dispatchAmount, materialName, toVehicleName)) ) {
                $('.btn-primary', dispatchWindow).attr('disabled', 'disabled');
                $('.btn-primary', dispatchWindow).html('请稍后...');
                return doDispatchAction(materialId, fromVehicleId, toVehicleId, dispatchAmount, dispatchWindow);
            }
        });
    </script>
    <script type="text/javascript">
        function doDispatchAction(materialId, fromVehicle, toVehicle, dispatchAmount, dispatchWindow) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('/dashboard/do-dispatch-action'); ?>',
                data: {
                    'material_id': materialId,
                    'from_vehicle': fromVehicle,
                    'to_vehicle': toVehicle,
                    'dispatch_amount': dispatchAmount
                },
                dataType: 'JSON',
                success: function(result) {
                    var fromVehicleAllocationItem   = $('.material-amount', '.material-allocation li[data-value=%s]'.format(fromVehicle)),
                        toVehicleAllocationItem     = $('.material-amount', '.material-allocation li[data-value=%s]'.format(toVehicle));

                    // Update the material amount for from vehicle
                    var fromVehicleMaterialAmount   = parseInt($(fromVehicleAllocationItem).html());
                    if ( fromVehicleMaterialAmount - dispatchAmount == 0 ) {
                        $(fromVehicleAllocationItem).parent().remove();
                        $('.from-vehicles option[value=%s]'.format(fromVehicle), dispatchWindow).remove();
                    }  else {
                        $(fromVehicleAllocationItem).html(fromVehicleMaterialAmount - dispatchAmount);
                    }

                    // Update the material amount for to vehicle
                    if ( toVehicleAllocationItem.length == 0 ) {
                        var vehicleName = $('.to-vehicles option[value=%s]'.format(toVehicle), dispatchWindow).html();

                        $('.material-allocation', dispatchWindow).append(
                            '<li data-value="%s">%s: <span class="material-amount">%s</span> (件)</li>'
                                .format(toVehicle, vehicleName, dispatchAmount));
                        $('.from-vehicles', dispatchWindow).append(
                            '<option value="%s">%s</option>'.format(toVehicle, vehicleName));
                    } else {
                        var toVehicleMaterialAmount  = parseInt($(toVehicleAllocationItem).html());
                        $(toVehicleAllocationItem).html(toVehicleMaterialAmount + dispatchAmount);
                    }

                    $('.dispatch-amount', dispatchWindow).val('');
                    $('.btn-primary', dispatchWindow).removeAttr('disabled');
                    $('.btn-primary', dispatchWindow).html('执行调度');

                    var fromVehicleName = $('.to-vehicles option[value=%s]'.format(fromVehicle), dispatchWindow).html(),
                        toVehicleName   = $('.to-vehicles option[value=%s]'.format(toVehicle), dispatchWindow).html(),
                        materialName    = $('.material-name', dispatchWindow).html();
                    socket.emit('new-dispatch-event', {
                        'from-vehicle': fromVehicleName,
                        'to-vehicle': toVehicleName,
                        'material-name': materialName,
                        'number-of-material': dispatchAmount
                    });
                }
            });
        }
    </script>
</body>
</html>