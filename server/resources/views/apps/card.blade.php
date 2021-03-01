<div class="card mt-3">
  <div class="card-body d-flex flex-row">
    @if (!empty($user->avatar_file_name))
    <img src="{{ Storage::disk('s3')->url("avatars/{$user->avatar_file_name}") }}" class="rounded-circle" style="object-fit: cover; width: 54px; height: 54px;">
    @else
    <i class="fas fa-user-circle fa-3x"></i>
    @endif
    @include('share.info_02')

    @include('share.modal')
  </div>
  @include('share.info')

</div>
