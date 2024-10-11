<div class='btn-group'>
    @can('role-update')
    <a href="{{ route('admin.roles.edit', $dataTable->id) }}" class='btn btn-sm btn-info'>
        {{ __('Edit') }}
    </a>
    @endcan
    @can('role-delete')
    @if ($dataTable->id > 3)
    <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{$dataTable->id}}" data-original-title="Delete" class="btn btn-sm btn-danger delete">{{ __('Delete') }}</a>
    @endif
    @endcan
    @cannot(['role-update','role-delete'])
    {{ __('No Actiion Permit') }}
    @endcannot
</div>
