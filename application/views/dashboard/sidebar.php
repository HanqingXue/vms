        <div id="sidebar">
            <div id="logo">
                <a href="<?php echo base_url('/'); ?>">
                    <span style="color: #16a085;">油田车辆</span>实时状态监测系统
                </a>
            </div> <!-- #logo -->
            <div id="sidebar-user">
                <div class="row-fluid">
                    <div class="span3">
                        <img src="<?php echo base_url('assets/img/avatar.jpg'); ?>" alt="avatar">
                    </div> <!-- .span3 -->
                    <div class="offset1 span8">
                        欢迎回来, <br>User <br>
                        <span class="label label-success">Online</span>
                    </div> <!-- .span8 -->
                </div> <!-- .row-fluid -->
            </div> <!-- #sidebar-user -->
            <div id="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item primary-nav-item">
                        <a href="<?php echo base_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> 控制中心</a>
                    </li>
                    <li class="nav-item primary-nav-item">
                        <a href="javascript:void(0)"><i class="fa fa-automobile"></i> 车辆管理</a>
                        <ul class="sub-nav nav">
                            <li class="nav-item secondary-nav-item"><a href="<?php echo base_url('/dashboard/vehicles'); ?>">所有车辆</a></li>
                            <li class="nav-item secondary-nav-item"><a href="<?php echo base_url('/dashboard/manage'); ?>">新建车辆</a></li>
                        </ul>
                    </li>
                    <li class="nav-item primary-nav-item">
                        <a href="javascript:void(0)"><i class="fa fa-automobile"></i>设备管理</a>
                        <ul class="sub-nav nav">
                            <li class="nav-item secondary-nav-item"><a href="<?php echo base_url('/dashboard/all-devices'); ?>">所有设备</a></li>
                            <li class="nav-item secondary-nav-item"><a href="<?php echo base_url('/dashboard/devices'); ?>">新建设备</a></li>
                        </ul>
                    </li>
                </ul>
            </div> <!-- #sidebar-nav -->
        </div> <!-- #sidebar -->
    <script type="text/javascript">
        $('li.primary-nav-item > a').click(function() {
            console.log('click');
            var navItem       = $(this).parent(),
                isSubNavShown = $('ul.sub-nav', navItem).is(':visible');

            if ( isSubNavShown ) {
                $('i.fa-caret-down', navItem).addClass('fa-caret-right');
                $('i.fa-caret-down', navItem).removeClass('fa-caret-down');
                $('ul.sub-nav', navItem).slideUp(120);
            } else {
                $('i.fa-caret-right', navItem).addClass('fa-caret-down');
                $('i.fa-caret-right', navItem).removeClass('fa-caret-right');
                $('ul.sub-nav', navItem).slideDown(120);
            }
        });
    </script>