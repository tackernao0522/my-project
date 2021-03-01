@if ( Auth::id() == $postApp->user_id )
<!-- Dropdown -->
<div class="ml-auto card-text">
  <div class="dropdown">
    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <button type="button" class="btn btn-link text-muted m-0 p-2">
        <i class="fas fa-ellipsis-v"></i>
      </button>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
      <a class="dropdown-item" href="{{ route('app.edit', [$postApp->id]) }}">
        <i class="fas fa-pen mr-1"></i>詳細を更新する
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $postApp->id }}">
        <i class="fas fa-trash-alt mr-1"></i>投稿を削除する
      </a>
    </div>
  </div>
</div>
<!-- Dropdown -->

<!-- modal -->
<div id="modal-delete-{{ $postApp->id }}" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('apps.destroy', [$postApp->id]) }}">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          {{ $postApp->title }}を削除します。よろしいですか？
        </div>
        <div class="modal-footer justify-content-between">
          <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
          <button type="submit" class="btn btn-danger">削除する</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endif