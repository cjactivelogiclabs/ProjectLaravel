   @if(Session::has('message'))

    <div class="alert alert-dismissable alert bg-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     {{Session::get('message')}}
      </div>

    @endif
