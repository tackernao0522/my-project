<div class="row">
  <div class="col-8 mt-3 offset-2" style="text-align: center;">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @endif
  </div>
</div>
