@extends('layouts.app')


@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-9 col-auto">
                    <div class="page-header-title">
                        <h3 class="m-b-10">{{ __('app.users.heading') }}</h3>
                    </div>
                </div>
                <div class="col-sm-3 col">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i>
                                {{ __('app.common.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('app.users.title') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('app.users.title') }}</h5>
                    <div class="card-header-right">
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
                        <table id="datatable-export"
                            class=" table table-striped table-bordered table-hover table-center mb-0">
                            <thead>
                                <tr style="boder:1px solid black;">
                                    <th>{{ __('app.common.name') }}</th>
                                    <th>{{ __('app.common.email') }}</th>
                                    <th>{{ __('app.common.role') }}</th>
                                    <th>{{ __('app.common.created_date') }}</th>
                                    <th class="text-center action-btn">{{ __('app.common.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            @if (!empty($user->avatar))
                                                <span class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img" width="30"
                                                        src="{{ asset('storage/users/' . $user->avatar) }}"
                                                        alt="{{ __('app.products.image_alt') }}">
                                                </span>
                                            @endif
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        @can('update-role')
                                            <td>
                                                @foreach ($user->getRoleNames() as $role)
                                                    {{ $role }}
                                                    <span data-role="{{ $role }}"></span>
                                                @endforeach
                                            </td>
                                        @endcan
                                        <td>{{ date_format(date_create($user->created_at), 'd M,Y') }}</td>

                                        <td class="text-center">
                                            <div class="actions">
                                                <a data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                                    data-avatar="{{ $user->avatar }}"
                                                    data-email="{{ $user->email }}" class="btn btn-sm btn-info editbtn"
                                                    id="edit-user" data-toggle="modal" href="javascript:void(0)">
                                                    <i class="fe fe-pencil"></i> {{ __('app.common.edit') }}
                                                </a>
                                                <a data-id="{{ $user->id }}" href="javascript:void(0);"
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
        </div>
        <div class="col-md-4">
          <div class="card">
              <div class="card-header">
                <h5>{{ __('app.users.add') }}</h5>
                <div class="card-header-right">
                    <a href="{{route('users')}}" class="btn btn-primary float-right">{{ __('app.common.add_new') }}</a>
                </div>
              </div>
              <div class="card-body">
                @include('users.create')
              </div>
          </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="add_user" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('app.users.add') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('app.alerts.close') }}">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('users') }}">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('app.common.full_name') }}</label>
                                    <input type="text" name="name" class="form-control" placeholder="{{ __('app.common.name') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('app.common.email') }}</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('app.common.role') }}</label>
                                    <div class="form-group">
                                        <select class="select2 form-select form-control" name="role">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('app.common.picture') }}</label>
                                    <input type="file" name="avatar">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>{{ __('app.common.password') }}</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>{{ __('app.common.confirm_password') }}</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                    </div>
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
    <div class="modal fade" id="edit_user" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('app.users.edit') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('app.alerts.close') }}">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('users') }}">
                        @csrf
                        @method("PUT")
                        <div class="row form-row">
                            <input type="hidden" name="id" id="edit_id">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('app.common.full_name') }}</label>
                                    <input type="text" name="name" class="form-control edit_name" placeholder="{{ __('app.common.name') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">{{ __('app.common.email') }}</label>
                                    <input type="email" name="email" class="form-control edit_email" id="email">
                                </div>
                            </div>
                            @can('update-role')
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>{{ __('app.common.role') }}</label>
                                        <div class="form-group">
                                            <select class="select2 form-select form-control edit_role" name="role">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="avatar">{{ __('app.users.picture') }}</label>
                                    <input type="file" name="avatar" id="avatar">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>{{ __('app.common.password') }}</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>{{ __('app.common.confirm_password') }}</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                    </div>
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
    <x-modals.delete :route="'users'" :title="__('app.entity.user')" />
    <!-- /Delete Modal -->
@endsection


@push('page-js')
    <!-- Select2 js-->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#avatar').hide();
            $('#datatable-export').on('click', '.editbtn', function() {
                event.preventDefault();
                // jQuery.noConflict();
                // $('#edit_user').modal('show');
                var id = $(this).data('id');
                var name = $(this).data('name');
                var email = $(this).data('email');
                var role = $(this).data('role');
                var avatar = $(this).data('avatar');
                $('#edit_id').val(id);
                $('.edit_name').val(name);
                $('.edit_email').val(email);
                $('.edit_role').val(role).trigger('change');
                $('#avatar').show();
            });
            //


        });
    </script>
@endpush
