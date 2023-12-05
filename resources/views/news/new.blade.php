
@extends('layouts.app')

@section('content')

    <!-- Main layout -->
    <div class="container">
        @if (isset($news) && count($news) > 0)
            @foreach ($news as $count => $new)
                @if($count == 0)
                    <!-- Section: News of the day -->
                    <section class="border-bottom pb-4 mb-5">
                        <div class="row gx-5">
                            <!-- Main news block -->
                            <div class="col-md-6 mb-4">
                                <div style="width: 100%; height: 300px; overflow: hidden;" class="bg-image hover-overlay ripple shadow-2-strong rounded-5"
                                    data-mdb-ripple-color="light">
                                    <img style="width: 100%; height: 100%; object-fit: cover;" src="{{ pare_url_file($new->a_avatar) }}" class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4"> <a href="{{ route('detailnew', [$new->a_slug, $new->id]) }}">
                                <span class="badge bg-danger px-2 py-1 shadow-1-strong mb-3">News of the day</span>
                                <h4><strong>{{ $new->a_name }}</strong></h4>
                                <p class="text-muted">
                                    {!! \Illuminate\Support\Str::limit($new->a_content, 250, '...') !!}
                                </p>
                                <button type="button" class="btn btn-primary">Read more</button>
                            </a>
                            </div>
                        </div>
                    </section>
                    @elseif (($count % 3) == 0&&($count !=0))
                    <!-- Start a new row for every set of three items -->
                        
                @endif

                <!-- News block -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div style=" height: 200px; overflow: hidden;" class="bg-image hover-overlay shadow-1-strong ripple rounded-5">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="{{ pare_url_file($new->a_avatar) }}" class="img-fluid" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>

                    <!-- Article data -->
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="{{ route('detailnew', [$new->a_slug, $new->id]) }}" class="text-info">
                                
                              <h5><i class="fa-solid fa-newspaper"></i>  {{ $new->a_name }}</h5>
                            </a>
                        </div>

                        <div class="col-6 text-end">
                            <?php
                            $formatted_date = $new->created_at->format('Y-m-d');
                        ?>
                        <u>{{ $formatted_date }}</u>
                        </div>
                    </div>

                    <!-- Article title and description -->
                    <a href="{{ route('detailnew', [$new->a_slug, $new->id]) }}" class="text-dark">
                        <p>
                            {{ $new->a_description }}
                        </p>
                    </a>

                    <hr />
                </div>
                <!-- End News block -->

                @if (($count + 1) % 3 == 0 || $count == count($news) - 1)
                    {{-- </div><!-- Close the row after every set of three items or the last item --> --}}
                @endif
            @endforeach
        @endif
        <div class="col-lg-12 col-md-12 col-sm-12">
        <!-- Pagination -->
        <nav class="my-4" aria-label="...">
            {{ $news->links('components.pagination')  }}
        </nav>
    </div>
    </div>
    <!-- Main layout -->
@stop
