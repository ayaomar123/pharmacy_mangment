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
                        <h3 class="m-b-10">{{ __('app.products.title') }}</h3>
                    </div>
                </div>
                <div class="col-sm-3 col">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i>
                                {{ __('app.common.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('app.products.title') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- Products -->
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('app.products.title') }}</h5>
                    <div class="card-header-right">
                        <a href="{{ route('add-product') }}" class="btn btn-primary float-right">{{ __('app.common.add_new') }}</a>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-export" class="table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>{{ __('app.products.name') }}</th>
                                    <th>{{ __('app.common.category') }}</th>
                                    <th>{{ __('app.common.price') }}</th>
                                    <th>{{ __('app.common.quantity') }}</th>
                                    <th>{{ __('app.common.discount') }}</th>
                                    <th>{{ __('app.common.expiry_date') }}</th>
                                    <th class="action-btn">{{ __('app.common.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)
                                    @if ($product->purchase()->exists())
                                        <tr>
                                            <td>
                                                @if (!empty($product->purchase->image))
                                                    <span class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img" width="30"
                                                            src="{{ asset('storage/purchases/' . $product->purchase->image) }}"
                                                            alt="{{ __('app.products.image_alt') }}">
                                                    </span>
                                                @endif
                                                {{ $product->purchase->name }}
                                            </td>
                                            <td>{{ $product->purchase->category->name }}</td>
                                            <td>{{ AppSettings::get('app_currency', '$') }} {{ $product->price }}
                                            </td>
                                            <td>{{ $product->purchase->quantity }}</td>
                                            <td>{{ $product->discount ?? 0 }}%</td>
                                            <td>
                                                {{ date_format(date_create($product->purchase->expiry_date), 'd M, Y') }}</span>
                                            </td>
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
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Products -->

        </div>
    </div>

    <!-- Delete Modal -->
    <x-modals.delete :route="'products'" :title="__('app.entity.product')" />
    <!-- /Delete Modal -->
@endsection

@push('page-js')
    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
@endpush
