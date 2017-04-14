<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NecTech Dashboard</title>

<link href="<?php echo e(asset('lumino/css/bootstrap.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('lumino/css/datepicker3.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('lumino/css/bootstrap-table.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('lumino/css/styles.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('css/dropUploader.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/select2.min.css')); ?>">
<!--Icons-->

<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
<!--Icons-->
<script src="<?php echo e(asset('lumino/js/lumino.glyphs.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/jquery-1.11.1.min.js')); ?>"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
 <script src="<?php echo e(asset('lumino/js/jquery-1.11.1.min.js')); ?>"></script>


    <script src="<?php echo e(asset('lumino/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lumino/js/chart.min.js')); ?>"></script>
   
    <script src="<?php echo e(asset('lumino/js/easypiechart.js')); ?>"></script>
    
    <script src="<?php echo e(asset('lumino/js/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('lumino/js/bootstrap-table.js')); ?>"></script>
    <script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>

</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo e(url('/dashboard')); ?>"><span>NecTech</span>Dashboard</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                             <?php echo e(Auth::user()->name); ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">                            
                            <li>
                                <a href="<?php echo e(url('/logout')); ?>"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                   <?php echo e(csrf_field()); ?>

                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
                            
        </div><!-- /.container-fluid -->
    </nav>
        
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
       

        <ul class="nav menu">
            <li class="active"><a href="<?php echo e(url('/dashboard')); ?>"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
            <li><a href="<?php echo e(url('/user')); ?>"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Clients</a></li>
            <li><a href="<?php echo e(url('/maker')); ?>"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></use></svg> Makers</a></li>
            <li><a href="<?php echo e(url('/model')); ?>"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></use></svg> Models</a></li>
            <li><a href="<?php echo e(url('/product')); ?>"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Products</a></li>
            <li><a href="<?php echo e(url('/slide')); ?>"><svg class="glyph stroked camera"><use xlink:href="#stroked-camera"></use></svg> Slide image</a></li>
            <li><a href="#"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Orders</a></li>
            <li> <a href="<?php echo e(url('/logout')); ?>"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    
                                <svg class="glyph stroked chevron left"><use xlink:href="#stroked-chevron-left"></use></svg> Logout</a></li>
            
        </ul>

    </div><!--/.sidebar-->

     <?php echo $__env->yieldContent('content'); ?>
 

   
    <script src="<?php echo e(asset('js/drop_uploader.js')); ?>"></script>
    <script>
        $('#calendar').datepicker({
        });

        !function ($) {
            $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
                $(this).find('em:first').toggleClass("glyphicon-minus");      
            }); 
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
          if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
          if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>

</body>

</html>