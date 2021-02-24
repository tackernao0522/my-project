<div class="card-group mt-4 mb-3 mx-auto">
  <div class="card" style="width: 18rem">
    <img src="{{ Storage::disk('s3')->url("item-images/{$app->image_file_name}") }}" class="card-img-top">
    <div class="card-body">
      <h5 class="card-title">
        <a class="btn btn-info" href="{{ route('app', ['app' => $app]) }}">{{ $app->title }}</a>
      </h5>
      <p style="margin-left: 10px;">作成者：<a href="#">{{ $app->user->name }}</a></p>
      <p style="margin-left: 10px;">言語：{{ $app->language }}</p>
      <p style="margin-left: 10px;">フレームワーク：{{ $app->framework }}</p>
      <div style="margin-left: 10px; color:red;">説明：</div>
      <p style="margin-left: 10px;">{!! nl2br(e(Str::limit($app->description, 50))) !!}</p>
      <div class="card-body pt-0 pb-2 pl-3">
        <div class="card-text">
          <item-like :initial-is-liked-by='@json($app->isLikedBy(Auth::user()))' :initial-count-likes='@json($app->count_likes)' :authorized='@json(Auth::check())' endpoint="{{ route('apps.like', ['app' => $app]) }}">
          </item-like>
        </div>
      </div>
      <a class="btn btn-primary" href="{{ $app->url }}" style="width: 90px; display: block;">使用する</a>
      @if( Auth::id() === $app->user_id )
      <a class="btn btn-success" href="{{ route('app.edit', ['app' => $app]) }}" style="width: 58px; height: 36px; display: block; margin-left: 169px; margin-top: -43px;">編集</a>
      @endif
