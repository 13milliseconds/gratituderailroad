<article @php(post_class())>
  <div class="thumbnail">
    {!! the_post_thumbnail( 'medium' );  !!}
  </div>
    <h4 class="entry-title">
      <a href="{{ get_permalink() }}">
        {!! $title !!}
      </a>
    </h4>
</article>
