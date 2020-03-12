<aside class="col-md-4 blog-sidebar">
    <div class="p-4 mb-3 bg-light rounded">
      <h4 class="font-italic">About</h4>
      <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>

    <div class="p-4">
      <h4 class="font-italic">Все теги</h4>
      <ol class="list-unstyled mb-0">
        @foreach ($tagsCloud as $tag)
          <li><a class="text-info" href="/articles?tag={{ $tag->name }}">{{ $tag->name }}</a></li>
        @endforeach
      
      </ol>
    </div>
  </aside><!-- /.blog-sidebar -->