@extends('layouts.app')

@push('page-css')
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assetss/assets/select2/css/select2.min.css') }}">
@endpush


@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-9 col-auto">
                    <div class="page-header-title">
                        <h3 class="m-b-10">{{ __('app.products.edit') }}</h3>
                    </div>
                </div>
                <div class="col-sm-3 col">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i>
                                {{ __('app.common.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('app.products.edit') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('app.products.edit') }}</h5>
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
                    <!-- Edit Medicine -->
                    <form method="post" enctype="multipart/form-data" id="update_service"
                        action="{{ route('edit-product', $product) }}">
                        @csrf
                        <div class="service-fields mb-3">
                            <div class="row">

                                <div class="col-lg-12 col-auto">
                                    <div class="form-group">
                                        <label>{{ __('app.common.medicine') }} <span class="text-danger">*</span></label>
                                        <select class="select2 form-select form-control" name="product">
                                            @foreach ($purchased_products as $purchased_product)
                                                <option @if ($purchased_product->id == $product->purchase->id) selected @endif
                                                    value="{{ $purchased_product->id }}">{{ $purchased_product->name }}
                                                </option>
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
                                        <label>{{ __('app.products.selling_price') }}<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="price"
                                            value="{{ $product->price }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('app.common.discount_percent') }}<span class="text-danger">*</span></label>
                                        <input class="form-control" value="{{ $product->discount }}" type="text"
                                            name="discount" value="{{ old('discount') }}">
                                    </div>
                                </div>

                            </div>
                        </div>



                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>{{ __('app.common.descriptions') }} <span class="text-danger">*</span></label>
                                        <textarea class="form-control service-desc" value="{{ $product->description }}" name="description">{{ $product->description }}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" type="submit" name="form_submit"
                                value="submit">{{ __('app.common.submit') }}</button>
                        </div>
                    </form>
                    <!-- /Edit Medicine -->


                </div>
            </div>
        </div>
    </div>
@endsection


@push('page-js')
    <!-- Select2 JS -->
    <script src="{{ asset('assetss/assets/select2/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2().maximizeSelect2Height();
        });
    </script>
@endpush
