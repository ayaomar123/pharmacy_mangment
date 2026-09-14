@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-9 col-auto">
                <div class="page-header-title">
                    <h3 class="m-b-10">{{ __('app.permissions.title') }}</h3>
                </div>
            </div>
            <div class="col-sm-3 col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i>
                            {{ __('app.common.dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('app.permissions.title') }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('app.permissions.title') }}</h5>
                    <div class="card-header-right">
                        <a href="#add_permission" data-toggle="modal" class="btn btn-primary float-right">{{ __('app.permissions.add') }}</a>
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
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> {{ __('app.card.collapse') }}</span><span style="display:none"><i class="feather icon-plus"></i> {{ __('app.card.expand') }}</span></a>
                                </li>
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
                        <table id="perm-table"
                            class="datatable table table-striped table-bordered table-hover table-center mb-0">
                            <thead>
                                <tr style="boder:1px solid black;">
                                    <th>{{ __('app.common.name') }}</th>
                                    <th>{{ __('app.common.created_date') }}</th>
                                    <th class="text-center action-btn">{{ __('app.common.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>
                                            {{ $permission->name }}
                                        </td>

                                        <td>{{ date_format(date_create($permission->created_at), 'd M,Y') }}</td>

                                        <td class="text-center">
                                            <div class="actions">
                                                @can('update-permission')
                                                    <a data-id="{{ $permission->id }}"
                                                        data-permission="{{ $permission->name }}"
                                                        class="btn btn-sm btn-info editbtn" data-toggle="modal"
                                                        href="javascript:void(0)">
                                                        <i class="fe fe-pencil"></i> {{ __('app.common.edit') }}
                                                    </a>
                                                @endcan
                                                @can('destroy-permission')
                                                    <a data-id="{{ $permission->id }}" data-toggle="modal"
                                                        href="javascript:void(0)" class="btn btn-sm btn-danger deletebtn">
                                                        <i class="fe fe-trash"></i> {{ __('app.common.delete') }}
                                                    </a>
                                                @endcan
                                            </div>
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

    <!-- Add Modal -->
    <div class="modal fade" id="add_permission" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('app.permissions.add') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('app.alerts.close') }}">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('permissions') }}">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('app.permissions.singular') }}</label>
                                    <input type="text" name="permission" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">{{ __('app.common.save_changes') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /ADD Modal -->

    <!-- Edit Details Modal -->
    <div class="modal fade" id="edit_permission" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('app.permissions.edit') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('app.alerts.close') }}">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('permissions') }}">
                        @csrf
                        @method("PUT")
                        <div class="row form-row">
                            <div class="col-12">
                                <input type="hidden" name="id" id="edit_id">
                                <div class="form-group">
                                    <label>{{ __('app.permissions.singular') }}</label>
                                    <input type="text" class="form-control edit_permission" name="permission">
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary btn-block">{{ __('app.common.save_changes') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Details Modal -->

    <!-- Delete Modal -->
    <x-modals.delete :route="'permissions'" :title="__('app.entity.permission')" />
    <!-- /Delete Modal -->
@endsection


@push('page-js')
    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#perm-table').on('click', '.editbtn', function() {
                event.preventDefault();
                $('#edit_permission').modal('show');
                var id = $(this).data('id');
                var permission = $(this).data('permission');
                $('#edit_id').val(id);
                $('.edit_permission').val(permission);
            });
            //
        });
    </script>

@endpush
