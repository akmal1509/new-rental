@extends('layouts.admin.app')
@section('title', 'Master Data' . $share['title'])

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
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
                        <div class="card">
                            <div class="card-header">
                                <a href="/admin/{{ $share['slugData'] }}/create" class="btn btn-primary">Create New</a>
                            </div>
                            <div class="card-body pt-0">
                                @include('components.admin.typedata')
                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-1">
                                        <thead>
                                            <tr>
                                                <th width="5%" class="text-center">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                            data-checkbox-role="dad" class="custom-control-input"
                                                            id="checkbox-all">
                                                        <label for="checkbox-all"
                                                            class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Main Menu</th>
                                                <th>Order</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $data)
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup"
                                                                class="custom-control-input akm-check-box"
                                                                id="checkbox-{{ $loop->iteration }}" name="number_check[]"
                                                                value="{{ $data->id }}" data-id="{{ $data->id }}">
                                                            <label for="checkbox-{{ $loop->iteration }}"
                                                                class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td>{{ $data->name }}</td>
                                                    <td>{{ $data->slug }}</td>
                                                    <td>{{ $data->mainMenu ?? '0' }}</td>
                                                    <td>{{ $data->sort }}</td>
                                                    <td>
                                                        @if ($type == 'index')
                                                            <a href="/admin/{{ $share['slugData'] }}/{{ $data->id }}/edit"
                                                                class="btn btn-primary btn-action mr-1"
                                                                data-toggle="tooltip" title="Edit">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        @endif
                                                        @if ($type == 'index')
                                                            <a class="btn btn-danger btn-action" data-toggle="tooltip"
                                                                title="Delete"
                                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                                data-confirm-yes="deleteData({{ $data->id }},'{{ $share['model'] }}','{{ $share['slugData'] }}')">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        @else
                                                            <a class="btn btn-danger btn-action" data-toggle="tooltip"
                                                                title="Delete Permanent"
                                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                                data-confirm-yes="forceDeleteData({{ $data->id }},'{{ $share['model'] }}', '{{ $share['slugData'] }}')">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>


    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('js/admin/bulkAction.js') }}"></script>
@endpush
