<div class='btn-group'>
    @can('Language-translate')
        <a href="{{ route('admin.languages.translatePage', $id) }}" class='btn btn-sm btn-success'>
            {{ __('Translate') }}
        </a>
    @endcan
    @can('Language-view')
        <a href="{{ route('admin.languages.show', $id) }}" class='btn btn-sm btn-primary'>
            {{ __('View') }}
        </a>
    @endcan
    @can('Language-update')
        @if ($id > 1)
            <a href="{{ route('admin.languages.edit', $id) }}" class='btn btn-sm btn-info'>
                {{ __('Edit') }}
            </a>
        @endcan
        @if ($id != 1 && $id !=2)
            @can('Language-delete')
                <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{ $id }}"
                    data-original-title="Delete" class="btn btn-sm btn-danger delete">{{ __('Delete') }}</a>
            @endcan
        @endif
    @endif
</div>
