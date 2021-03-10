<div class="card-body pt-0 pb-2">
  <a href="{{ route('app', [$postApp->id]) }}">
    <img src="{{ Storage::disk('s3')->url("item-images/{$postApp->image_file_name}") }}" class="card-img-top" style="object-fit: cover; width: 153px; height: 153px;">
  </a>
  <h3 class="h4 card-title mt-2" style="margin-left: -4px; color:crimson;">
    {{ $postApp->title }}
  </h3>
  @foreach($postApp->tags as $tag)
  @if($loop->first)
  <div class="card-body pt-0 pb-4" style="margin-left: -25px;">
    <div class="card-text line-height">
      @endif
      <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted" style="display: inline-block;">
        {{ $tag->hashtag }}
      </a>
      @if($loop->last)
    </div>
  </div>
  @endif
  @endforeach
  <div class="card-text" style="font-size: 15px; margin-left: -4px;">
    {!! nl2br(e( $postApp->description )) !!}
  </div>
  <div class="card-body pt-0 pb-2 pl-3">
    <div class="card-text mt-3" style="margin-left: -22px;">
      <item-like :initial-is-liked-by='@json($postApp->isLikedBy(Auth::user()))' :initial-count-likes='@json($postApp->count_likes)' :authorized='@json(Auth::check())' endpoint="{{ route('apps.like', [$postApp->id]) }}">
      </item-like>
      <div class="d-flex align-items-center" style="margin-left: 60px; margin-top: -32px;">
        <a class="in-link p-1" href="{{ route('app', [$postApp->id]) }}"><i class="far fa-comment fa-fw fa-lg"></i></a>
        <p class="mb-0">{{ count($postApp->comments) }}</p>
      </div>
    </div>
  </div>
  <div style="margin-left: -10px;">
    <a class="btn btn-primary" href="{{ $postApp->url }}">使用する</a>
  </div>
</div>
