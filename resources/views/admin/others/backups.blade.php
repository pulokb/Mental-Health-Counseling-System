@extends('layouts.admin')
@section('title',__('Backup'))
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-cloud icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>{{ __('All Backups') }}</div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block">
                <a class="btn btn-info" href="{{route('admin.backup')}}">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fas fa-plus-circle fa-w-20"></i>
                    </span>
                    {{ __('Create Database Backup') }}
                </a>
                <button onclick="event.preventDefault();
                document.getElementById('new-backup-form').submit();" class="btn-shadow btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fas fa-plus-circle fa-w-20"></i>
                    </span>
                    {{ __('Create Full Backup') }}
                </button>
                <form id="new-backup-form" action="{{ route('admin.backups.store') }}" method="POST"
                    style="display: none;">
                    @csrf
                </form>
                <button onclick="event.preventDefault();
                          document.getElementById('clean-old-backups').submit();" class="btn-shadow btn btn-danger">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fas fa-trash fa-w-20"></i>
                    </span>
                    {{ __('Clean Old Backups') }}
                </button>
                <form id="clean-old-backups" action="{{ route('admin.backups.clean') }}" method="POST"
                    style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>



            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="table-responsive">
                <table id="datatable" class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('Sl') }}</th>
                            <th class="text-center">{{ __('File Name') }}</th>
                            <th class="text-center">{{ __('Size') }}</th>
                            <th class="text-center">{{ __('Created At') }}</th>
                            <th class="text-center">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($backups as $key=>$backup)
                        <tr>
                            <td class="text-center text-muted">{{ $key + 1 }}</td>
                            <td class="text-center">
                                <code>{{ $backup['file_name'] }}</code>
                            </td>
                            <td class="text-center">{{ $backup['file_size'] }}</td>
                            <td class="text-center">{{ $backup['created_at'] }}</td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm"
                                    href="{{ route('admin.backups.download',$backup['file_name']) }}"><i
                                        class="fas fa-download"></i>
                                    <span>{{ __('Download') }}</span>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="if (confirm('{{ __('Are you sure to delete') }} ?')){document.getElementById('delete-form-{{$key}}').submit();}else{event.preventDefault()}">
                                    <i class="fas fa-trash-alt"></i>
                                    <span>{{ __('Delete') }}</span>
                                </button>
                                <form id="delete-form-{{ $key }}"
                                    action="{{ route('admin.backups.destroy',$backup['file_name']) }}" method="POST"
                                    style="display: none;">
                                    @csrf()
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
