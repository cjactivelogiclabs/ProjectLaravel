 @if(Session::has('message-error'))

    <div class="alert alert-dismissable alert bg-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         {{Session::get('message-error')}}
          </div>
    @endif