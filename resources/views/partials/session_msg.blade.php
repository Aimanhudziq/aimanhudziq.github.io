@if(Session::has('errMsg'))
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-info-circle"></i> {{ Session::get('errMsg') }}
    </div>
@endif
@if(Session::has('infoMsg'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-window-close-o"></i> {{ Session::get('infoMsg') }}
    </div>
@endif

@if(Session::has('successMsg'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-window-close-o"></i> {{ Session::get('successMsg') }}
    </div>
@endif

@if(Session::has('delMsg'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-window-close-o"></i> {{ Session::get('delMsg') }}
    </div>
@endif

@if(Session::has('createMsg'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-window-close-o"></i> {{ Session::get('createMsg') }}
    </div>
@endif