<div id="section4" class="">
    <div class="container">
        <p class="mini-title text-center mb-2">
            POPULATE RENTAL DEALS
        </p>
        <p class="sub-mini-title text-center">
            Most popular cars rental deals
        </p>
        <div class="row card-container">
            <div class="owl-carousel owl-theme">
                @foreach ($car as $dataCar)
                    <a href="{{ url('/rent') . '/' . $dataCar->slug }}">
                        <div class="item">
                            <div class="card-car-content">
                                <div class="row">
                                    <div class="col-12">
                                        <img class="img-car img-fluid mb-3"
                                            src="{{ asset($imageStorage . '/' . $dataCar->image) }}"" alt="">
                                        {{-- <div class="top-left-price">
                                        <p class="btn-akm btn-card btn-danger price-value">$25<span class="price-term"> / day</span></p>
                                    </div> --}}
                                    </div>
                                    <div class="col-12">
                                        <p class="title-card">
                                            {{ $dataCar->name }}
                                        </p>
                                        {{-- <div class="card-price-card">                           
                                    <div class="d-flex justify-content-between">
                                        <p class="price-value">$25<span class="price-term"> / day</span></p>
                                    </div>
                                </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
