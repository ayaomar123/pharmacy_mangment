@extends('layouts.app')

@push('page-css')
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assetss/assets/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
@endpush


@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-9 col-auto">
                    <div class="page-header-title">
                        <h3 class="m-b-10">{{ __('app.purchases.add') }}</h3>
                    </div>
                </div>
                <div class="col-sm-3 col">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i>
                                {{ __('app.common.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('app.purchases.add') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('app.purchases.add') }}</h5>
                    <div class="card-header-right">
                        <a href="{{ route('products') }}" class="btn btn-primary float-right">{{ __('app.common.back') }}</a>
                        <div class="btn-group card-option">
                            <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="feather icon-more-horizontal"></i>
                            </button>
                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                            {{ __('app.card.maximize') }}</span><span style="display:none"><i class="feather icon-minimize"></i>
                                            {{ __('app.card.restore') }}</span></a>
                                </li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> {{ __('app.card.collapse') }}</span><span style="display:none"><i class="feather icon-plus"></i> {{ __('app.card.expand') }}</span></a></li>
                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                        {{ __('app.card.reload') }}</a></li>
                                <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                        {{ __('app.card.remove') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body custom-edit-service">
                    <!-- Add Medicine -->
                    <form method="post" enctype="multipart/form-data" autocomplete="off"
                        action="{{ route('store-stock') }}">
                        @csrf
                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>{{ __('app.products.name') }}<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>{{ __('app.common.category') }} <span class="text-danger">*</span></label>
                                        <select class="select2 form-select form-control" name="category">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>{{ __('app.common.supplier') }} <span class="text-danger">*</span></label>
                                        <select class="select2 form-select form-control" name="supplier">
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('app.purchases.cost_price') }}<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="price">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('app.common.quantity') }}<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="quantity">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('app.common.expire_date') }}<span class="text-danger">*</span></label>
                                        <input class="form-control" type="date" name="expiry_date">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('app.products.image') }}</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" type="submit">{{ __('app.common.submit') }}</button>
                        </div>
                    </form>
                    <!-- /Add Medicine -->

                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <!-- Datetimepicker JS -->
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Select2 JS -->
    <script src="{{ asset('assetss/assets/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2().maximizeSelect2Height();
        });
    </script>
@endpush
