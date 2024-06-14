@extends('layouts.admin')
@section('styles')
    <style>
         .title_error {
            color: red;
            font-size: 13px;
            font-style: italic;
        }

        .required:after {
            content: " *";
            color: red;
        }
    </style>
@endsection

@section('content')
    

    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card mb-1">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="card-title">{{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" id="myForm">
                        @csrf
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ' ' }}" type="text"
                                        name="name" id="name" value="{{ old('name', '') }}" >
                                    <span class="name_error"></span>
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="" for="email">{{ trans('cruds.user.fields.email') }}</label>
                                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                        name="email" id="email" value="{{ old('email', '') }}" >
                                    <span class="email_error"></span>
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                        name="password" id="password">
                                    <span class="password_error"></span>
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                                </div>
                            </div>
        
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="required" for="roles">{{ trans('cruds.role.title') }}</label>
                                    <div style="padding-bottom: 4px">
                                        <span class="btn btn-info btn-xs select-all"
                                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                        <span class="btn btn-info btn-xs deselect-all"
                                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                    </div>
                                    <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}"
                                        name="roles[]" id="roles" multiple >
                                        @foreach ($roles as $id => $role)
                                            <option value="{{ $id }}"
                                                {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $role }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="role_error"></span>
                                    @if ($errors->has('roles'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('roles') }}
                                        </div>
                                    @endif
                                    {{-- <span class="help-block">{{ trans('cruds.role.fields.roles_helper') }}</span> --}}
                                </div>
                            </div>
        
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex">
                                <div class="form-group mt-2 mr-3">
                                    <button class="btn btn-success" type="submit" id="save">
                                        <div class="spinner-border  spinner-border-sm text-white d-none" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <span id="saveText">{{ trans('global.save') }}</span>
                                    </button>
                                </div>
                                <div class="form-group mt-2 ms-2">
                                    <a onclick=history.back() class="btn btn-secondary text-white">
                                        {{ trans('global.cancel') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
@endsection
