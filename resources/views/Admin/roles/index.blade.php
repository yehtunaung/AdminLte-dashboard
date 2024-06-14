@extends('layouts.admin')
@section('content')


    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card mb-1">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="card-title">{{ trans('cruds.role.title_singular') }} {{ trans('global.list') }}
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row d-flex justify-content-end mr-1">
                        @can('permission_create')
                            <div style="margin-bottom: 10px;" class="row">
                                <div class="col-lg-12">
                                    <a class="btn btn-success" href="{{ route('admin.roles.create') }}">
                                        {{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}
                                    </a>
                                </div>
                            </div>
                        @endcan
                    </div>
                    <table id="data-table-1" class="table table-bordered table-hover table-striped">
                        <thead>
                            
                            <th class="col-2">
                                {{ trans('cruds.role.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.role.fields.permissions') }}
                            </th>
                            <th>
                                {{ trans('global.action') }}
                            </th>
                            
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                            <tr data-entry-id="{{ $role->id }}">
                                <td>
                                    {{ $role->title ?? '' }}
                                </td>
                                <td style="white-space: normal;width:750px;">

                                    @foreach ($role->permissions as $key => $item)
                                        <span class="badge h2 bg-info my-1 rounded-pill" style="height: 23px; padding:5px;">{{ $item->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('role_show')
                                        <a class="p-0 glow btn btn-primary text-white"
                                            style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                            title="view" href="{{ route('admin.roles.show', $role->id) }}"> Show
                                        </a>
                                    @endcan

                                    @can('role_edit')
                                        <a class="p-0 glow btn btn-success text-white"
                                            style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                            title="edit" href="{{ route('admin.roles.edit', $role->id) }}"> Edit
                                        </a>
                                    @endcan

                                    @can('role_delete')
                                        <form id="orderDelete-{{ $role->id }}"
                                            action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden"
                                                style="width: 26px;height: 36px;display: inline-block;line-height: 36px;"
                                                class=" p-0 glow" value="{{ trans('global.delete') }}">
                                            <button style="width: 60px;display: inline-block;line-height: 36px;border:none;"
                                                class=" p-0 glow btn btn-danger text-white"
                                                onclick="return confirm('{{ trans('global.areYouSure') }}');"
                                                document.getElementById('orderDelete-{{ $role->id }}').submit();"> Delete
                                            </button>
                                        </form>
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
@endsection
@section('scripts')
    @parent
    
@endsection
