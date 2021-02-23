<a class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $app->id }}" style="display: block; margin-left: 7rem; margin-top: -44px; color: #fff; width: 90px;">削除する</a>
<!-- modal -->
<div id="modal-delete-{{ $app->id }}" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('apps.destroy', ['app' => $app]) }}">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          {{ $app->title }}を削除します。よろしいですか？
        </div>
        <div class="modal-footer justify-content-between">
          <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
          <button type="submit" class="btn btn-danger">削除する</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- modal -->
