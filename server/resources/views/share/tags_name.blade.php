@foreach($app->tags as $tag)
@if($loop->first)
<div class="card-body pt-0 pb-4 pl-2">
  <div class="card-text line-height">
    @endif
    <a href="" class="border p-1 mr-1 mt-1 text-muted">
      {{ $tag->name }}
    </a>
    @if($loop->last)
  </div>
</div>
@endif
@endforeach
