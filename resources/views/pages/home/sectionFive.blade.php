<div id="section5">
    <div class="container">
        <p class="mini-title text-center mb-2">
            TESTIMONIAL
        </p>
        <p class="sub-mini-title text-center">
            What people say about us?
        </p>
        <div id="carouselExampleControls" class="carousel slide testimonial-carousel" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($testimonial as $testimonial)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6 text-center">
                                        <img src="{{ asset($imageStorage . '/' . $testimonial->image) }}" alt=""
                                            class="img-testimonial">
                                    </div>
                                    <div class="col-lg-6 testimonial-content">
                                        <div class="">
                                            <p class="testimonial-text">
                                                @php
                                                    echo $testimonial->body;
                                                @endphp
                                            </p>
                                            <p class="testimonial-name">
                                                {{ $testimonial->name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls"
                data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls"
                data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>

    </div>
</div>
