<div class='btn-group'>
    @can('DoctorFeedback-update')
    <a href="{{ route('admin.doctorFeedbacks.edit', $id) }}" class='btn btn-sm btn-info'>
       {{ __('Reply') }}
    </a>
    @endcan
    @can('DoctorFeedback-view')
    <a href="{{ route('admin.doctorFeedbacks.show', $id) }}" class='btn btn-sm btn-primary'>
        {{ __('View') }}
    </a>
    @endcan
    @can('DoctorFeedback-delete')
     <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{$id}}" data-original-title="Delete" class="btn btn-sm btn-danger delete">{{ __('Delete') }}</a>
     @endcan
</div>
