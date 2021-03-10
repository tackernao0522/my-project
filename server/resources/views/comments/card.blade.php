@forelse ($comments as $comment)
<li class="list-group-item">
  <div class="py-3 w-100 d-flex">
    <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class="text-dark">
      @if (!empty($comment->user->avatar_file_name))
      <img src="{{ Storage::disk('s3')->url("avatars/{$comment->user->avatar_file_name}") }}" class="rounded-circle" style="object-fit: cover; width: 54px; height: 54px;">
      @else
      <i class="fas fa-user-circle fa-3x"></i>
      @endif
    </a>
    <div class="ml-2 d-flex flex-column">
      <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class="in-link text-dark">
        <p class="font-weight-bold mb-0">
          {{ $comment->user->name }}
        </p>
      </a>
    </div>
    <div class="d-flex justify-content-end flex-grow-1">
      <p class="mb-0 font-weight-lighter">
        {{ $comment->created_at->format('Y-m-d H:i') }}
      </p>
    </div>
  </div>
  <div class="py-3">
    {!! nl2br(e($comment->comment)) !!}
  </div>
</li>
@empty
<li class="list-group-item text-center">
  <p class="mb-0 text-muted">コメントはまだありません。</p>
</li>
@endforelse
