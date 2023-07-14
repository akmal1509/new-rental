<div id="section4" class="">
    <div class="container">
        <p class="mini-title text-center mb-2">
            POPULATE RENTAL DEALS
        </p>
        <p class="sub-mini-title text-center">
            What people say about us?
        </p>
        <div class="row card-container">
            @foreach ($dataCar as $dataCar)
                <div class="col-lg-3 card-car">
                    <div class="card-car-content">
                        <div class="row">
                            <div class="col-12">
                                <img class="img-car img-fluid mb-3" src="{{ asset($imageStorage) }}/files/gray-car.jpg"
                                    alt="">
                            </div>
                            <div class="col-12">
                                <p class="title-card mb-3">
                                    Jaguar K5 the 2022 f-Type
                                </p>
                                <div class="feature-card">
                                    <div class="feature-content-card">
                                        <div class="inner-feature-card">
                                            <i class="fas fa-user"></i> 2 <span
                                                class="font-weight-normal">Capacity</span>
                                        </div>
                                        <div class="inner-feature-card">
                                            <i class="fas fa-user"></i> 2 <span
                                                class="font-weight-normal">Capacity</span>
                                        </div>
                                    </div>
                                    <div class="feature-content-card">
                                        <div class="inner-feature-card">
                                            <i class="fas fa-user"></i> 2 <span
                                                class="font-weight-normal">Capacity</span>
                                        </div>
                                        <div class="inner-feature-card">
                                            <i class="fas fa-user"></i> 2 <span
                                                class="font-weight-normal">Capacity</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
