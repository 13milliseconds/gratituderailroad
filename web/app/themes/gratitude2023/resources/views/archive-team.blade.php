@extends('layouts.app')

@section('content')
  <div class="container">
    @php 
    $page = get_page_by_path( 'team' );
  echo apply_filters( 'the_content', get_post_field( 'post_content', $page ) );
  @endphp

  <h1>Team</h1>

    <div class="row">
      <div class="col-md-2">
        Filters
      </div>
      <div class="col-md-10">
        <div class="row">
        @while(have_posts()) @php(the_post())
          <div class="col-md-4">
            @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
          </div>
          @endwhile
        </div>
      </div>
    </div>
  </div>
@endsection
