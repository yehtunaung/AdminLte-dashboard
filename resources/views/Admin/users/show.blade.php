@extends('layouts.admin')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="card mb-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="card-title"> {{ trans('global.show') }} {{ trans('cruds.user.title') }}
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
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.id') }}
                            </th>
                            <td>
                                {{ $user->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.name') }}
                            </th>
                            <td>
                                {{ $user->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.email') }}
                            </th>
                            <td>
                                {{ $user->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.email_verified_at') }}
                            </th>
                            <td>
                                {{ $user->email_verified_at }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.roles') }}
                            </th>
                            <td>
                                @foreach($user->roles as $key => $roles)
                                    <span class="label label-info badge bg-info my-1 rounded-pill">{{ $roles->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group mt-3">
                    <a class="btn btn-secondary"  href="{{ route('admin.users.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>

@endsection
