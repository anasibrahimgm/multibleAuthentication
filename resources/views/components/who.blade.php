@if (Auth::guard('web')->check())
<!--if sb is logged in as an admin and not as a user,
this will be false for this guard but true for the admin guard -->
  <p class="text-success"> You are LOGGED IN as a <strong>USER</strong></p>
@else
  <p class="text-danger"> You are LOGGED OUT as a <strong>USER</strong></p>
@endif

@if (Auth::guard('admin')->check())
<!--if sb is logged in as a user and not as an admin, this will be false for this guard -->
  <p class="text-success"> You are LOGGED IN as an <strong>ADMIN</strong></p>
@else
  <p class="text-danger"> You are LOGGED OUT as an <strong>ADMIN</strong></p>
@endif
