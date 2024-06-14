@extends('layouts.admin')
@section('styles')
    <style>
        .title_error,
        .permission_error {
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
                            <h3 class="card-title">{{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.roles.store') }}" enctype="multipart/form-data"
                        id="myForm">
                        @csrf
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                        type="text" name="title" id="title" value="{{ old('title', '') }}">
                                    <span class="title_error"></span>
                                    @if ($errors->has('title'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="required"
                                        for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
                                    <div style="padding-bottom: 4px">
                                        <span class="btn btn-info btn-xs select-all"
                                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                        <span class="btn btn-info btn-xs deselect-all"
                                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                    </div>
                                    <select
                                        class="form-control select2  {{ $errors->has('permissions') ? 'is-invalid' : '' }} "
                                        name="permissions[]" id="permissions" multiple="multiple"  style="width: 100%;">
                                        @foreach ($permissions as $id => $permission)
                                            <option value="{{ $id }}"
                                                {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>
                                                {{ $permission }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="permission_error"></span>
                                    @if ($errors->has('permissions'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('permissions') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
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

