 @extends('website.layout')

 @section('content') 

  <!-- From our Blog -->
            <div class="contact-us">
                <div class="container">

                    <div class="col-md-offset-2 col-md-8 col-md-offset-2 contact-form contact-form-bg">
                        <i class="icon icon-paper-plane "></i>
                        <h3 class="space-30">Contact Us</h3>
                        <p>TO RECEIVE UPDATES</p>
                        <form class="form-horizontal">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputfname" placeholder="First Name">                        
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputlname" placeholder="Last name">                   
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputphone" placeholder="Phone number">                   
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputEmail" placeholder="Email address">                   
                            </div>
                            <div class="form-group col-md-12">
                                 <textarea class="form-control" id="message" name="message" placeholder="Message"></textarea> 
                                <div class="checkbox space-10">
                                </div>
                                <button class="btn button1 hover-white" type="submit">Submit <i class="link-icon-white"></i></button>
                            </div>
                        </form>
                    </div>
                  
                </div>
                <!-- End container -->
            </div>
            <!-- End contact-us -->
 @endsection