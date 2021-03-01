@foreach($app->tags as $tag)
@if($loop->first)
<div class="card-body pt-0 pb-4 pl-2">
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
