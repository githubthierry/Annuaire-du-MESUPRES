@if(session('notification.type') == 'success')
    <?php  $alert = "#check-circle-fill"; ?>
@elseif (session('notification.type') == 'warning')
    <?php  $alert = "#exclamation-triangle-fill"; ?>
@elseif (session('notification.type') == 'info')
    <?php  $alert = "#info-fill"; ?>
@elseif(session('notification.type') == 'danger')
    <?php  $alert = "#exclamation-triangle-fill"; ?>
@endif

@if (Session::has('notification.message'))
    <div class="col-sm-12 alert alert-{{ session('notification.type') }} alert-dismissible fade show p-4 shadow rounded d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="{{ session('notification.type') }}:"><use xlink:href="{{ $alert }}" /></svg>
        <strong class="ml-3">{{ session('notification.message') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
