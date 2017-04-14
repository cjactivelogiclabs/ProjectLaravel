 

 <?php $__env->startSection('content'); ?> 


            <div class="title-page">
                <h3>Login</h3>
            </div>
            <div class="login-box-container">
                <div class="container">
                    <ul class="tabs">
                        <li class="item active" rel="tab_1">Login</li>
                        <li class="item" rel="tab_2">Register</li>
                    </ul>
                    <div class="tab-container">
                        <div id="tab_1" class="tab-content active" style="display: block;">
                            <p>If you have an account with us, log in using your email address.</p>
                             <div class="contact-form">
                                <a class="btn link-button link-button-fb" href="#" title="facebook">facebook</a>
                                <a class="btn link-button link-button-gg" href="#" title="google">google</a>
                                <p></p>
                               <form class="form-horizontal"> 
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="inputemail" placeholder="Email adress*" type="text">             
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="inputpass" placeholder="Password*" type="password">                
                                    </div>
                                     <div class="form-group">            
                                        <a class="btn link-button lh-55 hover-white" href="#" title="Login">login<i class="link-icon-white"></i></a>
                                    </div>
                                </form>
                            </div>
                            <!-- End contact form -->
                        </div>
                        <div id="tab_2" class="tab-content" style="display: none;">
                            <p>Creating an account will save you time at checkout and allow you to access your order status and history.</p>
                            <div class="contact-form">
                               <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="name" placeholder="Name*" type="text">             
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="lastaname" placeholder="Lastname*" type="text">            
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="email" placeholder="Email adress*" type="email">             
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="phone" placeholder="Phone*" type="text">            
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="address" placeholder="Address (Line 1)*" type="text">            
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="address2" placeholder="Address (Line 2)" type="text">            
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="password" placeholder="Password*" type="password">             
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="password_2" placeholder="Comfirm password*" type="password">            
                                    </div>
                                     <div class="form-group">  
                                         <button type="submit" class="btn link-button lh-55 hover-white" title="register">
                                            register<i class="link-icon-white"></i>          
                                         </button>   
                                    </div>
                                </form>
                            </div>
                            <!-- End contact form -->
                        </div>
                    </div>
                </div>
                <!-- End container -->
            </div>
            <!-- End cat-box-container -->
        
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>