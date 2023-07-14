@extends('layouts.front.front')
@section('title', 'Service')
@section('main')
    <section id="serviceSection">
        <div class="container d-none d-lg-block">
            @foreach ($data as $data3)
                @if ($loop->iteration % 2 == 0)
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="title-service">
                                <h3>{{ $data3->title }}</h3>
                                <p>
                                    @php
                                        echo $data3->body;
                                    @endphp
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset($imageStorage . '/' . $data3->image) }}" class="w-100 h-100 object-fit-cover"
                                alt="">
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="{{ asset($imageStorage . '/' . $data3->image) }}" class="w-100 h-100 object-fit-cover"
                                alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="title-service">
                                <h3>{{ $data3->title }}</h3>
                                <p>
                                    @php
                                        echo $data3->body;
                                    @endphp
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="container d-block d-lg-none">
            @foreach ($data as $data2)
               <div class="row mt-5">
                        <div class="col-lg-6">
                            <img src="{{ asset($imageStorage . '/' . $data2->image) }}" class="w-100 h-100 object-fit-cover"
                                alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="title-service">
                                <h3>{{ $data2->title }}</h3>
                                <p>
                                    @php
                                        echo $data2->body;
                                    @endphp
                                </p>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
        <div class="container">
            <h1 class="mt-5 mb-3 text-center">Personalized and Private Day Tours for an Exquisite Escape</h1>
            <img src="{{asset($imageStorage . '/' . 'files/dayt.jpg')}}" class="img-fluid mb-3">
            <p>Discover Sydney City's breathtaking attractions including:</p><ul><li>The Opera House</li><li>Harbour Bridge&nbsp;</li><li>Bondi Beach&nbsp;</li><li>Centre Point Tower&nbsp;</li><li>Taronga Zoo&nbsp;</li><li>Luna Park&nbsp;</li></ul><p>&nbsp;</p><p>Embark on an extraordinary day tour to the captivating Blue Mountains, where you'll encounter the wonders of:</p><ul><li>Featherdale Wildlife Park</li><li>Sydney Zoo&nbsp;</li><li>Three Sisters&nbsp;</li><li>Echo Point</li><li>Scenic Railway&nbsp;</li><li>Katoomba.&nbsp;</li></ul><p>&nbsp;</p><p>Savor the essence of Hunter Valley's renowned:</p><ul><li>McGuigan Wines</li><li>Tempus Two Wine Tasting</li><li>Cheese Tasting</li><li>Chocolate and Fudge Tasting</li><li>Hunter Valley Garden</li></ul><p>&nbsp;</p><p>Discover the rich heritage and natural beauty of Canberra Capital on a day tour featuring:&nbsp;</p><ul><li>Parliament House</li><li>Australian War Memorial</li><li>Royal Australian Mint</li><li>Black Mountain</li><li>Floriade Festival (Spring Season)&nbsp;</li></ul><p>&nbsp;</p><p>Canberra Capital&nbsp;</p><p>Day Tour</p><ul><li>Parliament House</li><li>Australian War Memorial</li><li>Royal Australian Mint</li><li>Black Mountain</li><li>Floriade Festival (Spring Season)&nbsp;</li></ul>
        </div>
    </section>
@endsection
