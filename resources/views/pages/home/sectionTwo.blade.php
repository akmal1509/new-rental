<div id="searchBar" class="d-flex justify-content-center py-3">
    <div class="container">
        <form action="/booking" method="get">
            <div class="row">
                <div class="col-lg-12">
                    <div class="searchBar-content bg-white">
                        <div class="row">
                            <div class="col-lg-10 col-sm-12">
                                <div class="row fc-black">
                                    <div class="col-lg-3 pb-4 pb-lg-0">
                                        <p class="font-weight-bold text-uppercase">Location</p>
                                        <div class="home-select">
                                            <input name="location" type="text" class="form-control"
                                                placeholder="Pickup address">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pb-4 pb-lg-0">
                                        <div class="home-select">
                                            <p class="font-weight-bold text-uppercase">Type Of Car</p>
                                            <select name="type" id="car" class="form-control select2">
                                                @foreach ($type as $types)
                                                    <option value="{{ $types }}">{{ $types }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pb-4 pb-lg-0">
                                        <p class="font-weight-bold text-uppercase">How many passengers?</p>
                                        <div class="home-select">
                                            <input name="passenger" type="text" class="form-control"
                                                placeholder="Number of passengers">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pb-4 pb-lg-0">
                                        <div class="home-select">
                                            <p class="font-weight-bold text-uppercase">PickUp Date</p>
                                            <input type="text" name="pickUp" class="form-control datepicker">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-12">
                                <button type="submit" class="btn btn-akm bg-danger w-100"
                                    href="">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="section2" class="">
    <div class="container">
        <p class="text-center mini-title">HOW IT WORK</p>
        <div class="row content-section-2 ">
            <div class="col-lg-4 text-center content-section2-item">
                <i class="fas fa-map-marker-alt icon-section2"></i>
                <p class="fc-gray1">
                    Choose your location
                </p>
            </div>
            <div class="col-lg-4 text-center content-section2-item">
                <i class="fas fa-car icon-section2 active"></i>
                <p class="fc-gray1">
                    Find your best car
                </p>
            </div>
            <div class="col-lg-4 text-center content-section2-item">
                <i class="ci-calendar-bold icon-section2"></i>
                <p class="fc-gray1">
                    Select a pick-up date
                </p>
            </div>
        </div>
    </div>
</div>
