@extends('admin.layouts.master')

@section('content')

    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-lg wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-between g-3">
                                <div class="nk-block-head-content">
                                    <h3 class="nk-block-title page-title">Backups</h3>
                                </div>
                                <div class="nk-block-head-content">
                                    <button onclick="event.preventDefault();
                                        document.getElementById('clean-old-backup').submit();" type="submit" class="btn btn-danger d-none d-sm-inline-flex"><span>Clean old Backup</span>
                                    </button>
                                    <button onclick="event.preventDefault();
                                        document.getElementById('clean-old-backup').submit();" type="submit" class="btn btn-icon btn-danger d-inline-flex d-sm-none"><span>Clean old Backup</span>
                                    </button>
                                    <button onclick="event.preventDefault();
                                        document.getElementById('new-backup-form').submit();" type="submit" class="btn btn-primary d-none d-sm-inline-flex"><span>Create Backup</span>
                                    </button>
                                    <button onclick="event.preventDefault();
                                        document.getElementById('new-backup-form').submit();" type="submit" class="btn btn-icon btn-primary d-inline-flex d-sm-none"><span>Create Backup</span>
                                    </button>
                                </div>
                                <form id="clean-old-backup" action="{{ route('backups.clean') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <form id="new-backup-form" action="{{ route('backups.store') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            <br>
                            @if(Session::has('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            @endif
                            @if(Session::has('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{ session('error') }}</strong>
                                </div>
                            @endif
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                        <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">#</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">File name</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Size</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Created at</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Download</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Remove</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($backups as $key=>$backup)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{$key +1}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                    <code>{{$backup['file_name']}}</code>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span>{{$backup['file_size']}}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg">
                                                    <span>{{$backup['created_at']}}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <a class="btn btn-info btn-sm" href="{{ route('backups.download',$backup['file_name']) }}"><em class="icon ni ni-download"></em>
                                                        <span>Download</span>
                                                    </a>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <form id="delete-form-{{ $key }}"
                                                          action="{{ route('backups.destroy',$backup['file_name']) }}" method="POST">
                                                        @csrf()
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are You Confirm to Delete?')" class="btn btn-sm btn-danger" type="submit">Remove</button>
                                                    </form>
                                                </td>
                                            </tr><!-- .nk-tb-item  -->
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection
