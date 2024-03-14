@extends('layout')

@section('page_title')
    {{ $product->name }}
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2> {{ $product->name }}</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Product Details</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                @foreach (json_decode($product->images) as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ Voyager::image($image) }}" alt="{{ $product->name }}">
                                    </div>
                                @endforeach

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="portfolio-info">
                            <h3>Product information</h3>
                            <ul>
                                <li><strong>SKU</strong>: {{ $product->sku }}</li>
                                <li><strong>Category</strong>: {{ $product->category->name }}</li>
                                <li><strong>Product date</strong>: {{ $product->created_at->format('d F, Y') }}</li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            {!! $product->description !!}


                            {{-- <h2>This is an example of portfolio detail</h2>
                            <p>
                                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore
                                quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim.
                                Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi
                                nulla at esse enim cum deserunt eius.
                            </p> --}}
                            <?php $link = json_decode($product->document)[0]; ?>
                            <a href="{{ Voyager::image($link->download_link ?? null) }}"
                                download="{{ $link->original_name ?? null }}" class="btn btn-warning">Download Document</a>

                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->
@endsection
