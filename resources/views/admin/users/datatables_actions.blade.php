<div class='btn-group'>
    @can('user-login')
    <a href="{{ route('admin.users.loginAsUser', $id) }}" class='btn btn-sm btn-success'>
        {{ __('Login') }}
    </a>
    @endcan
    @can('user-view')
    <a href="{{ route('admin.users.show', $id) }}" class='btn btn-sm btn-primary'>
        {{ __('View') }}
    </a>
    @endcan
    @can('user-update')
    <a href="{{ route('admin.users.edit', $id) }}" class='btn btn-sm btn-info'>
        {{ __('Edit') }}
    </a>
    @endcan
    @can('user-delete')
     <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{$id}}" data-original-title="Delete" class="btn btn-sm btn-danger delete">{{ __('Delete') }}</a>
     @endcan
</div>
