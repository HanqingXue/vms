<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>系统设置 | 导弹发射车实时状态监测系统</title>
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
                <h2><i class="fa fa-cogs"></i> 系统设置</h2>
            </div> <!-- #content -->
        </div> <!-- #container -->        
    </div> <!-- #wrapper -->
    <!-- Java Script -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo base_url('/assets/js/site.js'); ?>"></script>
</body>
</html>
