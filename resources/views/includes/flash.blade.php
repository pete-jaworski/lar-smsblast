    @if ($message = Session::get('status'))
    <div class="row">
      <div class="col-md-4"></div>
         <div class="col-md-4"><div class="alert alert-success"><p><i class="fa fa-bell-o" aria-hidden="true"></i> {{ $message }}</p></div></div>
       <div class="col-md-4"></div>
    </div>    
    @endif