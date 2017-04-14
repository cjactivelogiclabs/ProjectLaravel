@extends('layouts.app')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{url('/dashboard')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Slide images</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Slide images</h1>
        </div>
    </div><!--/.row-->      

         @if(Session::has('message'))

        <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         {{Session::get('message')}}
          </div>

        @endif

        @if(Session::has('message-error'))

        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             {{Session::get('message-error')}}
              </div>
        @endif  
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new Slide</div>
                    <div class="panel-body">
                                <div class="col-md-8">
                                    {!! Form::open(array('method'=>'POST','route' => ['slide.store'],'enctype'=>'multipart/form-data')) !!}
                                    
                                        <div class="form-group">
                                            <label>Slide title</label>
                                            <input name="title" class="form-control" placeholder="Title" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label>Slide description</label>
                                            <input name="description" class="form-control" placeholder="Description" >
                                        </div>                               
                                        <hr>
                                        <div class="checkbox">                                        
                                            <label>
                                                <input type="checkbox" name="main" value="1" <?php if($main>0){?> disabled="true" <?php }?> >Main? - (Disable if already exist a main image for the slider.)
                                            </label>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label >Slide image</label>
                                            <input type="file" class="form-control" id="ImageFile" name="ImageFile" required accept="image/*">
                                        </div>     
                                        <div class="pull-right">    
                                            <button type="submit" class="btn btn-success">Save</button>
                                            <button type="reset" class="btn btn-warning">Reset Button</button>
                                            <a class="btn btn-default" href="{{ route('slide.index') }}"> Back</a>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </div>
                                    {!! Form::close() !!}    
                                </div>
                    
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->
  
    <script type="text/javascript">


    $(document).ready(function(){

            $('input[type=file]').drop_uploader({
                uploader_text: 'Arrastre la imagen o ',
                browse_text: 'Seleccionela',
                browse_css_class: 'button button-primary',
                browse_css_selector: 'file_browse',
                uploader_icon: '<i class="pe-7s-cloud-upload"></i>',
                file_icon: '<i class="pe-7s-file"></i>',
                time_show_errors: 5,
                layout: 'thumbnails'
            });
    });

</script>
@endsection