<div class="card-group mt-4 mb-3 mx-auto">
  <div class="card" style="width: 18rem">
    <img src="/storage/item-images/{{ $app->image_file_name }}" class="card-img-top">
    <div class="card-body">
      <h5 class="card-title">{{ $app->title }}</h5>
      <p>{{ $app->description }}</p>
      <a class="btn btn-primary" href="{{ $app->url }}">使用する</a>
