<div class="card mt-3">
  <div class="card-body">
    <div class="d-flex flex-row">
      @if (!empty($user->avatar_file_name))
      <img src="{{ Storage::disk('s3')->url("avatars/{$user->avatar_file_name}") }}" class="rounded-circle" style="object-fit: cover; width: 54px; height: 54px;">
      @else
      <i class="fas fa-user-circle fa-3x"></i>
      @endif
      @if (Auth::id() !== $user->id)
      <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))' :authorized='@json(Auth::check())' endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
      </follow-button>
      @endif
    </div>
    <h2 class="h5 card-title m-0" style="margin-top: 5px !important;">
      {{ $user->name }}
    </h2>
  </div>
  <div class="card-body">
    <div class="card-text">
      <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="text-muted">
        {{ $user->count_followings }} フォロー
      </a>
      <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-muted">
        {{ $user->count_followers }} フォロワー
      </a>
      <div style="width: 70px; margin-top: 10px; margin-bottom: 5px; color:crimson; border-style: ridge; text-align: center;">自己紹介</div>
      <p>{!! nl2br(e($user->body)) !!}</p>
    </div>
  </div>
</div>
