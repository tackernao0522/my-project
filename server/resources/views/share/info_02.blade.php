<div style="margin-left: 5px;">
  <div class="font-weight-bold">
    {{ $postApp->user->name }}
  </div>
  <div class="font-weight-lighter">
    {{ $postApp->created_at->format('Y/m/d H:i') }}
  </div>
</div>
