<a href="https://api.whatsapp.com/send?phone=61424124324"
    class="float-whatsapp d-flex align-items-center justify-content-center">
    <i class="fa-brands fa-whatsapp"></i>
</a>
<div id="footer" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <img src="{{ asset('') . config('app.imageStorage') . $general['setting']->flatLogo }}" alt=""
                    class="logo-footer mb-3">
                <p class="mb-3">
                    At VVIP69, we specialize in exceptional Airport & Cruise Transfers and unforgettable experiences for
                    special occasions
                </p>
                <div class="social-container d-flex">
                    <div class="social-footer-content d-flex align-items-center justify-content-center">
                        <i class="fab fa-facebook-f"></i>
                    </div>
                    <div class="social-footer-content d-flex align-items-center justify-content-center">
                        <i class="fab fa-twitter"></i>
                    </div>
                    <div class="social-footer-content d-flex align-items-center justify-content-center">
                        <i class="fab fa-instagram"></i>
                    </div>


                </div>
            </div>
            <div class="col-lg-3">
                <p class="title-footer">
                    Contact Us
                </p>
                <p>Email : {{ $general['setting']->email }}</p>
                {{-- <p>Email:  admin@vvip69luxlimo.com</p> --}}
                <p>Phone : {{ $general['setting']->phone }}</p>
                {{-- <p>Phone: +61424 124 324 </p> --}}
            </div>
            <div class="col-lg-5">
                <div class="footer-gmaps">
                    <p class="title-footer" style="color: black">
                        .
                    </p>
                    <p>Authorisation No: BSP-436914 <br>
                        Speed Package Solutions Pty Ltd ABN: 22627230228</p>
                </div>
            </div>
        </div>
    </div>
</div>
