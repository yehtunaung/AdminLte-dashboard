@extends('layouts.admin')
@section('content')

    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card mb-1">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="card-title">{{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row d-flex justify-content-end mr-1">
                        @can('user_create')
                            <div style="margin-bottom: 10px;" class="row">
                                <div class="col-lg-12">
                                    <a class="btn btn-success" href="{{ route('admin.users.create') }}">
                                        {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                                    </a>
                                </div>
                            </div>
                        @endcan
                    </div>
                    <table class=" table table-bordered table-striped table-hover" id="data-table-1">
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.email') }}
                                </th>

                                <th>
                                    {{ trans('cruds.user.fields.roles') }}
                                </th>
                                <th>
                                    {{ trans('global.action') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr data-entry-id="{{ $user->id }}">
                                    <td>
                                        {{ $user->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $user->email ?? '' }}
                                    </td>
                                    <td>
                                        @foreach ($user->roles as $key => $item)
                                            <span class="badge bg-info my-1 rounded-pill">{{ $item->title }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @can('user_show')
                                            <a class="p-0 glow text-white btn btn-primary"
                                                style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                                title="view" href="{{ route('admin.users.show', $user->id) }}">
                                                Show
                                            </a>
                                        @endcan

                                        @can('user_edit')
                                            <a class="p-0 glow text-white btn btn-success"
                                                style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                                title="edit" href="{{ route('admin.users.edit', $user->id) }}">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('user_delete')
                                            <form id="orderDelete-{{ $user->id }}"
                                                action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden"
                                                    style="width: 60px;display: inline-block;line-height: 36px;"
                                                    class=" p-0 glow text-white " value="{{ trans('global.delete') }}">
                                                <button
                                                    style="width: 60px;display: inline-block;line-height: 36px;border:none;color:grey;"
                                                    class=" p-0 glow text-white btn btn-danger" title="delete"
                                                    onclick="return confirm('{{ trans('global.areYouSure') }}');">
                                                    Delete
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
