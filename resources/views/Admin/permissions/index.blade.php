@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    {{-- <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}</h1>
                </div>
                <div class="col-sm-6">
                    @can('permission_create')
                        <div style="margin-bottom: 10px;" class="row">
                            <div class="col-lg-12">
                                <a class="btn btn-success" href="{{ route('admin.permissions.create') }}">
                                    {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
                                </a>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div> --}}
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card mb-2">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="card-title">{{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{-- <div class="row d-flex justify-content-end mr-1 mt-2">
                            @can('permission_create')
                                <div style="margin-bottom: 10px;" class="row">
                                    <div class="col-lg-12">
                                        <a class="btn btn-success" href="{{ route('admin.permissions.create') }}">
                                            {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
                                        </a>
                                    </div>
                                </div>
                            @endcan
                    </div> --}}
                    <table id="data-table-1" class="table table-bordered table-hover table-striped">
                        <thead>

                            <tr>
                                <th style="width: 40px;">
                                    No
                                </th>
                                <th>
                                    {{ trans('cruds.permission.fields.title') }}
                                </th>
                                <th>
                                    {{ trans('global.action') }}
                                </th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($permissions as $key => $permission)
                                <tr data-entry-id="{{ $permission->id }}">
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td>
                                        {{ $permission->title ?? '' }}
                                    </td>
                                    <td>

                                        @can('permission_show')
                                            <a class="p-0 glow btn btn-primary text-white"
                                                style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                                title="view" href="{{ route('admin.permissions.show', $permission->id) }}">
                                                Show
                                            </a>
                                        @endcan
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
    {{-- <div class="card">
        <div class="custom-header">
            <h5 class=" font-weight-bold "> {{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}</h5>

            @can('permission_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('admin.permissions.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                    <thead>
                        <tr>
                            <th>
                                {{ trans('cruds.permission.fields.title') }}
                            </th>
                            <th>
                                {{ trans('global.action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $key => $permission)
                            <tr data-entry-id="{{ $permission->id }}">
                                <td>
                                    {{ $permission->title ?? '' }}
                                </td>
                                <td>

                                    @can('permission_show')
                                        <a class="p-0 glow btn btn-primary text-white"
                                            style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                            title="view" href="{{ route('admin.permissions.show', $permission->id) }}">
                                            Show
                                        </a>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3" style="float:right;">
                  
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@section('scripts')
    @parent
@endsection
