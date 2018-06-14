<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>登录 | 导弹发射车实时状态监测系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icon -->
    <link rel="shortcut icon" href="<?php echo base_url('/favicon.ico'); ?>" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/bootstrap-responsive.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/flat-ui.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/font-awesome.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('/assets/css/accounts/login.css');?>"/>
    <!-- Java Script -->
    <script type="text/javascript" src="<?php echo base_url('/assets/js/jquery-1.11.1.min.js'); ?>" > </script>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.min.js'); ?>" > </script> 
    <script type="text/javascript" src="<?php echo base_url('/assets/js/flat-ui.min.js'); ?>" > </script> 
    <script type="text/javascript" src="<?php echo base_url('/assets/js/md5.min.js'); ?>" ></script>
    <!--[if lte IE 9]>
        <script type="text/javascript" src="/assets/jquery-placeholder.min.js"></script>    
    <![endif]-->
    <!--[if lte IE 7]>
        <link rel="stylesheet"  href="<?php echo base_url('/asset/font-awesome-ie7.min.css'); ?>" />
    <![endif]-->
    <!--[if lte IE 6]>
        <script type="text/javascript">
             window.location.href='<?php echo site_url(array('errors', 'not-supported')); ?>';
        </script>
    <![endif]-->
</head>
<body>
    <div id="content">
        <div id="logo">
            <img src="<?php echo base_url('/assets/img/logo-dark.png')?>" alt="logo">
        </div> <!-- #logo -->
        <div id="login">
            <div class="alert alert-error hide"></div>
            <form id="login-form" method="POST" onsubmit="onSubmit(); return false;">
                <p class="row-fluid">
                    <label for="username">用户名和电子邮件</label>
                    <input id="usename" name="usename" class="span12" type="text" maxlength="32">
                </p> 
                <P class="row-fluid">
                    <label for="password">
                        密码
                    </label>
                    <input id="password" usename="password" type="text" class="span12" maxlength="16" >
                </P>
                <p>
                    <label class="checkbox" for="remember-me">
                        <input id="remember-me" type="checkbox" data-toggle="checkbox" /> 保持登录状态
                    </label>
                </p>
                <p>
                    <button class="btn btn-primary btn-block" type="submit">登录</button>
                </p>
            </form> <!-- #login-form -->
        </div> <!-- #login -->
    </div> <!-- #content -->  
    <!-- Java Script -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
        function onSubmit() {

        }
    </script>
</body>
</html>