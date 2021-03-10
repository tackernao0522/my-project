<li class="list-group-item card">
  <div class="py-3">
    <form method="POST" action="{{ route('comments.store') }}">
      @csrf

      <div class="form-group row mb-0">
        <div class="col-md-12 p-3 w-100 d-flex">
          <a href="{{ route('users.show', ['name' => Auth::user()->name]) }}" class="text-dark">
            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
              @if (!empty($user->avatar_file_name))
              <img src="{{ Storage::disk('s3')->url("avatars/{$user->avatar_file_name}") }}" class="rounded-circle" style="object-fit: cover; width: 54px; height: 54px;">
              @else
              <i class="fas fa-user-circle fa-3x"></i>
              @endif
            </a>
          </a>
          <div class="ml-2 d-flex flex-column font-weight-bold">
            <a href="{{ route('users.show', ['name' => Auth::user()->name]) }}" class="in-link text-dark">
              <p class="mb-0">{{ Auth::user()->name }}</p>
            </a>
          </div>
        </div>
        <div class="col-md-12">
          @include('error_card_list')
          <input type="hidden" name="post_app_id" value="{{ $app->id }}">
          <textarea class="form-control" name="comment" rows="4" placeholder="コメントを入力してください。">{{ old('comment') }}</textarea>
        </div>
      </div>

      <div class="form-group row mb-0">
        <div class="col-md-12 text-right">
          <p class="mb-4 text-danger">250文字以内</p>
          <button type="submit" class="btn near-moon-gradient" style="color: #fff;">
            コメントする
          </button>
        </div>
      </div>
    </form>
  </div>
</li>
