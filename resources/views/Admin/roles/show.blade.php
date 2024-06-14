@extends('layouts.admin')
@section('content')
     <!-- Main content -->
 <section class="content-header">
    <div class="container-fluid">
        <div class="card mb-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="card-title">  {{ trans('global.show') }} {{ trans('cruds.role.title') }}
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
                <table id="example1" class="table table-bordered table-striped">
                    <tbody >
                        <tr>
                            <th class="col-3 ">
                                {{ trans('cruds.role.fields.id') }}
                            </th>
                            <td>
                                {{ $role->id }}
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3 ">
                                {{ trans('cruds.role.fields.title') }}
                            </th>
                            <td>
                                {{ $role->title }}
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3 ">
                                {{ trans('cruds.role.fields.permissions') }}
                            </th>
                            <td style="white-space: normal;">
                                @foreach ($role->permissions as $key => $permissions)
                                    <span class="label label-info badge bg-info my-1 rounded-pill">{{ $permissions->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group mt-3">
                    <a class="btn btn-secondary" href="{{ route('admin.roles.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>
@endsection
