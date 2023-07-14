@extends('layouts.admin.app')
@section('title', 'Master Data' . $share['title'])

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/prismjs/themes/prism.min.css') }}">
@endpush

@section('main')
    <meta name="method-delete" content="DELETE">
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Master Data {{ $share['title'] }}</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="activities">
                            @foreach ($data as $activity)
                                <div class="activity">
                                    <div class="activity-detail d-flex align-items-center justify-content-between w-100">
                                        <div class="activity-detail-content d-inline-block">
                                            <div class="mb-2">
                                                <span class="text-job text-primary">
                                                    {{ $activity->created_at->diffForHumans() }}
                                                </span>
                                                <span class="bullet "></span>
                                                {{-- <a class="text-job"
                                                    href="{{ '/admin/booking/' . $activity->subject_id }}">View</a> --}}
                                                <a type="button" class="text-job"
                                                    onclick="goLog({{ $activity->id . ',' . $activity->subject_id . ',' . auth()->user()->id }})">
                                                    View
                                                </a>
                                            </div>
                                            <p>{{ $activity->description }}
                                                @if ($activity->bookings)
                                                    <span>
                                                        {{ '( Fullname :' }}
                                                        <span class="font-weight-bold">
                                                            {{ $activity->bookings->name ?? '' }}
                                                        </span>{{ ' )' }}
                                                    </span>
                                                @endif
                                            </p>
                                            <p></p>
                                            {{-- @foreach ($activity->logStatus as $item)
                                                {{ $item->id }}
                                            @endforeach --}}
                                        </div>
                                        <div class="activity-detail-status">
                                            {!! $activity->userStatus->isNotEmpty() ? '' : '<span class="bullet"></span>' !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
