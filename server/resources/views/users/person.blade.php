<div class="card mt-3">
  <div class="card-body">
    <div class="d-flex flex-row">
      <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">
        @if (!empty($person->avatar_file_name))
        <img src="{{ Storage::disk('s3')->url("avatars/{$person->avatar_file_name}") }}" class="rounded-circle" style="object-fit: cover; width: 54px; height: 54px;">
        @else
        <i class="fas fa-user-circle fa-3x"></i>
        @endif
      </a>
      @if (Auth::id() !== $person->id)
      <follow-button class="ml-auto" :initial-is-followed-by='@json($person->isFollowedBy(Auth::user()))' :authorized='@json(Auth::check())' endpoint="{{ route('users.follow', ['name' => $person->name]) }}">
      </follow-button>
      @endif
    </div>
    <h2 class="h5 card-title m-0" style="margin-top: 5px !important;">
      <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">{{ $person->name }}</a>
    </h2>
  </div>
</div>