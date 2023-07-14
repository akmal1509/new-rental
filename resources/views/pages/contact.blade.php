@extends('layouts.front.front')
@section('title', 'Contact Us')
@section('main')
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-12">
                    <form action="" id="form-contact" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Full name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Your email address"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea type="text" name="message" class="form-control contact-text" placeholder="Message to us" required></textarea>
                        </div>
                        <button type="submit" id="submit" class="btn btn-akm bg-danger">Submit</button>
                    </form>
                </div>
                <div class="col-lg-5 col-12">
                    <p class="title-footer">
                        Contact Us
                    </p>
                    <p>Email : {{ $general['setting']->email }}</p>
                    {{-- <p>Email:  admin@vvip69luxlimo.com</p> --}}
                    <p>Phone : {{ $general['setting']->phone }}</p>
                    <p>Address : 40 Macquarie Rd, Springwood NSW 2777, Australia</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $('#form-contact').on('submit', function(e) {
            e.preventDefault();
            console.log($(this).serialize())
            $.ajax({
                type: 'POST',
                url: '/send-email-contact',
                data: $(this).serialize(),
                success: function(data) {
                    console.log(data)
                }
            })
        })
    </script>
@endpush
