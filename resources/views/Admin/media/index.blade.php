@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="card mb-2">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="card-title">Media List
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-end mr-1">
                        @can('user_create')
                            <div style="margin-bottom: 10px;" class="row">
                                <div class="col-lg-12">
                                    <a class="btn btn-success" href="{{ route('admin.media.create') }}">
                                        Add Media
                                    </a>
                                </div>
                            </div>
                        @endcan
                    </div>
                    <table id="data-table-1" class="table table-bordered table-hover table-striped">
                        <thead>

                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Media
                                </th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($media as $key => $photo)
                                <tr data-entry-id="{{ $photo->id }}">
                                    <td>
                                        {{ $photo->name ?? '' }}
                                    </td>
                                    <td>
                                        @if ($photo->photo)
                                            <a href="{{ $photo->photo->getUrl() }}" target="_blank">
                                                <img src="{{ $photo->photo->getUrl('preview') }}">
                                            </a>
                                        @endif
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
