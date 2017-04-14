
 <section class="b-slider"> 
            <div id="carousel" class="slide carousel carousel-fade">
                <div class="carousel-inner">
                    @foreach ($slides as $key => $slide)
                    <?php $item_act=""; if($slide->main==1) $item_act = "active"; ?>
                    <div class="item {{ $item_act }}">
                        <img src="{{ asset($slide->image) }}" alt="{{ $slide->title }}" />
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control right" href="#carousel" data-slide="next">
                    <span class="fa fa-angle-right m-control-right"></span>
                </a>
                <a class="carousel-control left" href="#carousel" data-slide="prev">
                    <span class="fa fa-angle-left m-control-left"></span>
                </a>
            </div>
        </section><!--b-slider-->

        <section class="b-search">
            <div class="container">

           {!!Form::open(['route'=>'search.index','method'=>'POST', 'class' => 'b-search__main'])!!}

                    <div class="b-search__main-title wow zoomInUp" data-wow-delay="0.3s">
                        <h2>UNSURE WHICH KEY YOU ARE LOOKING FOR? FIND IT HERE</h2>
                    </div>                  
                    <div class="b-search__main-form wow zoomInUp" data-wow-delay="0.3s">
                      <div class="row">

                          <div class="col-xs-12">
                                 <div class="m-firstSelects">
                                
                                  {{ csrf_field() }}          

                                   <div class="col-xs-3">
                                         {!!Form::select('id_maker', $makers ,null,['class'=>'form-control', 'id' => 'id_maker', 'placeholder'=>'Makers', 'required' => 'required'])!!}
                                         <span class="fa fa-caret-down"></span>                                      
                                     </div>

                                  <div class="col-xs-3">
                                         {!!Form::select('id_model', $models ,null,['class'=>'form-control', 'id' => 'id_model', 'placeholder'=>'Models'])!!}
                                         <span class="fa fa-caret-down"></span>
                                        
                                     </div>

                                   <div class="col-xs-3">
                                        {!!Form::select('id_year', $years ,null,['class'=>'form-control', 'id' => 'id_year', 'placeholder'=>'Years'])!!}
                                         <span class="fa fa-caret-down"></span>
                                     </div>

                                    <div class="col-xs-3 b-search__main-form-submit text-center">
                                       <button type="submit" class="btn m-btn">Search<span class="fa fa-angle-right"></span></button>
                                   </div>
                                   
                             </div>  
                             </div>
                         </div>
                    {!!Form::close()!!}
                    {!!Form::open(['url'=>'index/searchBCM','method'=>'POST'])!!}
                           
                                
                                 <div class="m-firstSelects"> 
                                        <div class="col-md-2">
                                          <img id="logoMini" src="{{ asset('images/logobcm.PNG')}}">
                                        </div>
                                        <div class="col-md-2" align="left">
                                             <label>BCM CALCULATOR</label>
                                        </div>
                                       

                                        <div class="col-md-2">
                                            <input type="text" name="bcm" id="bcm" placeholder="BCM" class="form-control" maxlength="5">      
                                        </div> 
                                        <div class="col-md-2 b-search__main-form-submit text-center">                                
                                          <button type="button" class="btn m-btn" id="botonbcm">Go<span class="fa fa-angle-right"></span></button>
                                        </div>

                                        <div class="col-md-2 text-center">
                                             <label class="control-label old"></label>
                                        </div>

                                        <div class="col-md-2" style="text-align:center">
                                             <label class="control-label new" ></label>
                                        </div>

                                </div> 

                {!!Form::close()!!}
             </div>
          </div>
        </section>