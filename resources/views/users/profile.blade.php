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
                        <h3 class="m-b-10">{{ __('app.profile.title') }}</h3>
                    </div>
                </div>
                <div class="col-sm-3 col">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i>
                                {{ __('app.common.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('app.profile.title') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card profile-header">
                <div class="card-body row align-items-center">
                    <div class="col-auto profile-image">
                        <a href="#">
                            <img class="rounded-circle" width="90" alt="{{ __('app.users.picture') }}"
                                src="{{ asset('img/medical-team.png') }}">
                        </a>
                    </div>
                    <div class="col ml-md-n2 profile-user-info">
                        <h4 class="user-name mb-0">{{ auth()->user()->name }}</h4>
                        <br>
                        <h6 class="text-muted">{{ auth()->user()->email }}</h6>
                        <br>
                        {{ __('app.profile.timezone') }}: <h5>{{ date_default_timezone_get() }}</h5>
                        <br>
                        {{ __('app.profile.current_date_time') }}: <h5>{{ date('d M,Y h:i:s a', time()) }}</h5>
                    </div>

                </div>
            </div>
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#per_details_tab">{{ __('app.profile.about') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password_tab">{{ __('app.common.password') }}</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content profile-tab-cont">

                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="per_details_tab">

                    <!-- Personal Details -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>{{ __('app.profile.personal_details') }}</h5>
                                    <a class="edit-link" href="#!"><i class="fa fa-edit mr-1"></i>{{ __('app.common.edit') }}</a>
                                    <div class="card-header-right">
                                        <div class="btn-group card-option">
                                            <button type="button" class="btn dropdown-toggle btn-icon"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="feather icon-more-horizontal"></i>
                                            </button>
                                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                                            {{ __('app.card.maximize') }}</span><span style="display:none"><i class="feather icon-minimize"></i>
                                                            {{ __('app.card.restore') }}</span></a>
                                                </li>
                                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> {{ __('app.card.collapse') }}</span><span
                                                            style="display:none"><i class="feather icon-plus"></i>
                                                            {{ __('app.card.expand') }}</span></a></li>
                                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                                        {{ __('app.card.reload') }}</a></li>
                                                <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                                        {{ __('app.card.remove') }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <p class="col-sm-2 text-muted  mb-0 mb-sm-3">{{ __('app.common.name') }}</p>
                                                <p class="col-sm-10">{{ auth()->user()->avatar }}</p>
                                            </div>

                                            <div class="row">
                                                <p class="col-sm-2 text-muted  mb-0 mb-sm-3">{{ __('app.profile.email_id') }}</p>
                                                <p class="col-sm-10">{{ auth()->user()->email }}</p>
                                            </div>

                                            <div class="row">
                                                <p class="col-sm-2 text-muted  mv-0 mb-sm-3">{{ __('app.profile.user_role') }}</p>
                                                <p class="col-sm-10">
                                                    @foreach (auth()->user()->getRoleNames() as $role)
                                                        {{ $role == 'super-admin' ? __('app.profile.super_admin') : $role }}
                                                    @endforeach
                                                </p>
                                            </div>

                                        </div>
                                        <div class="col-md-4 showForm collapse">
                                            <form method="POST" enctype="multipart/form-data"
                                                action="{{ route('profile') }}">
                                                @csrf
                                                <div class="row form-row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>{{ __('app.common.full_name') }}</label>
                                                            <input class="form-control" name="name" type="text"
                                                                value="{{ auth()->user()->name }}" placeholder="{{ __('app.common.full_name') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>{{ __('app.common.email') }}</label>
                                                            <input class="form-control" name="email" type="text"
                                                                value="{{ auth()->user()->email }}" placeholder="{{ __('app.common.email') }}">
                                                        </div>
                                                    </div>
                                                    {{-- @can('update-role')
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{ __('app.common.role') }}</label>
                                            <select class="form-control select edit_role" name="role">
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endcan --}}
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>{{ __('app.users.avatar') }}</label>
                                                            <input type="file" value="{{ auth()->user()->avatar }}"
                                                                class="form-control" name="avatar">
                                                        </div>
                                                    </div>

                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">{{ __('app.common.save_changes') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Personal Details -->

                </div>
                <!-- /Personal Details Tab -->

                <!-- Change Password Tab -->
                <div id="password_tab" class="tab-pane fade">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('app.profile.change_password') }}</h5>
                            <div class="row">
                                <div class="col-md-10 col-lg-6">
                                    <form method="POST" action="{{ route('update-password') }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>{{ __('app.common.old_password') }}</label>
                                            <input type="password" name="old_password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('app.common.new_password') }}</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('app.common.confirm_password') }}</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                        <button class="btn btn-primary" type="submit">{{ __('app.common.save_changes') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Change Password Tab -->

            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <!-- Select2 js-->
    <script src="{{ asset('assetss/assets/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.edit-link').on('click', function() {
                $(".showForm").toggle("collapse");
            })
        })
    </script>
@endpush
