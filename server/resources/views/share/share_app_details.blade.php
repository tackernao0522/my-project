<div class="card-group mt-4 mb-3 mx-auto">
  <div class="card" style="width: 18rem">
    <img src="{{ Storage::disk('s3')->url("item-images/{$app->image_file_name}") }}" class="card-img-top">
    <div class="card-body">
      <h5 class="card-title">{{ $app->title }}</h5>
      <p>{!! nl2br(e( $app->description )) !!}</p>
        <div class="card-body pt-0 pb-2 pl-3">
          <div class="card-text">
            <item-like
              :initial-is-liked-by='@json($app->isLikedBy(Auth::user()))'
              :initial-count-likes='@json($app->count_likes)'
              :authorized='@json(Auth::check())'
              endpoint="{{ route('apps.like', ['app' => $app]) }}"
            >
            </item-like>
          </div>
        </div>
      <a class="btn btn-primary" href="{{ $app->url }}">使用する</a>
