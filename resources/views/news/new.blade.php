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

                            <div class="col-md-6 mb-4">
                                <span class="badge bg-danger px-2 py-1 shadow-1-strong mb-3">News of the day</span>
                                <h4><strong>{{ $new->a_name }}</strong></h4>
                                <p class="text-muted">
                                    {{ $new->a_description }}
                                </p>
                                <button type="button" class="btn btn-primary">Read more</button>
                            </div>
                        </div>
                    </section>
                @elseif(($count - 1) % 3 == 0)
                    <!-- Start a new row for every set of three items -->
                    <div class="row mb-4">
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
                            <a href="#" class="text-info">
                                <i class="fas fa-plane"></i>
                                Travels
                            </a>
                        </div>

                        <div class="col-6 text-end">
                            <u> 15.07.2020</u>
                        </div>
                    </div>

                    <!-- Article title and description -->
                    <a href="#" class="text-dark">
                        <h5>{{ $new->a_name }}</h5>
                        <p>
                            {{ $new->a_description }}
                        </p>
                    </a>

                    <hr />
                </div>
                <!-- End News block -->

                @if(($count + 1) % 3 == 0 || $count == count($news) - 1)
                    </div><!-- Close the row after every set of three items or the last item -->
                @endif
            @endforeach
        @endif

        <!-- Pagination -->
        <nav class="my-4" aria-label="...">
            <ul class="pagination pagination-circle justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Main layout -->
@stop