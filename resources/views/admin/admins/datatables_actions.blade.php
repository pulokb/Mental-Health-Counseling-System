<div class='btn-group'>
    @can('admin-view')
    <a href="{{ route('admin.admins.show', $id) }}" class='btn btn-sm btn-primary'>
        {{ __('View') }}
    </a>
    @endcan
    @can('admin-update')
    <a href="{{ route('admin.admins.edit', $id) }}" class='btn btn-sm btn-info'>
        {{ __('Edit') }}
    </a>
    @endcan
    @can('admin-delete')
    @if($id>2)
    <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{$id}}" data-original-title="Delete" class="btn btn-sm btn-danger delete">{{ __('Delete') }}</a>
    @endif
    @endcan
</div>
