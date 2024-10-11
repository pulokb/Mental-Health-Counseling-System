<div class='btn-group'>
    @can('Notification-mark-read')
    @if ($dataTable->read_status == 0)
    <a href="{{ route('admin.notifications.markRead', $dataTable->id) }}" class='btn btn-sm btn-primary'>
        {{ __('Mark Read') }}
    </a>
    @endif
    @endcan
    @if ($dataTable->link)
    <a href="{{ $dataTable->link }}" class='btn btn-sm btn-success'>
        {{ __('Visit') }}
    </a>
    @endif
    @can('Notification-delete')
     <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{$dataTable->id}}" data-original-title="Delete" class="btn btn-sm btn-danger delete">{{ __('Delete') }}</a>
     @endcan
</div>
