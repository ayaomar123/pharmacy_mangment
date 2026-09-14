@extends('layouts.app')

@push('page-css')
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
@endpush

@push('page-header')
    <div class="col-sm-12">
        <h3 class="page-title">{{ __('app.products.expired_title') }}</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('products') }}">{{ __('app.nav.medicines') }}</a></li>
            <li class="breadcrumb-item active">{{ __('app.nav.expired') }}</li>
        </ul>
    </div>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">

            <!-- Recent Orders -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-export"
                            class="table table-striped table-bordered table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>{{ __('app.products.brand_name') }}</th>
                                    <th>{{ __('app.common.category') }}</th>
                                    <th>{{ __('app.common.price') }}</th>
                                    <th>{{ __('app.common.quantity') }}</th>
                                    <th>{{ __('app.common.discount') }}</th>
                                    <th>{{ __('app.common.expire') }}</th>
                                    <th class="action-btn">{{ __('app.common.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                @if (!empty($product->image))
                                                    <span class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img"
                                                            src="{{ asset('storage/products/' . $product->image) }}"
                                                            alt="{{ __('app.products.image_alt') }}">
                                                    </span>
                                                @endif
                                                {{ $product->name }}
                                            </h2>
                                        </td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ AppSettings::get('app_currency', '$') }}{{ $product->price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->discount }}%</td>
                                        <td><span class="btn btn-sm btn-danger">{{ __('app.products.expired_badge') }}</span></td>
                                        <td>
                                            <div class="actions">
                                                <a class="btn btn-sm btn-info"
                                                    href="{{ route('edit-product', $product) }}">
                                                    <i class="fe fe-pencil"></i> {{ __('app.common.edit') }}
                                                </a>
                                                <a data-id="{{ $product->id }}" href="javascript:void(0);"
                                                    class="btn btn-sm btn-danger deletebtn" data-toggle="modal">
                                                    <i class="fe fe-trash"></i> {{ __('app.common.delete') }}
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Recent Orders -->

        </div>
    </div>

    <!-- Delete Modal -->
    <x-modals.delete :route="'products'" :title="__('app.entity.expired_product')" />
    <!-- /Delete Modal -->
@endsection

@push('page-js')
    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
@endpush
