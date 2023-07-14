@extends('layouts.front.front')
@section('main')
    <section id="about">
        <div class="container">
            <h3 class="text-center mb-4">{{ $data['title'] }}</h3>
            <p>
                @php
                    echo $data['body'];
                @endphp
            </p>
        </div>
    </section>
@endsection
