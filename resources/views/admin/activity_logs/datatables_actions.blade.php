<div class='btn-group'>

    @can('log-activity-delete')

    <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{$dataTable->id}}" data-original-title="Delete" class="btn btn-sm btn-danger delete">{{ __("Delete") }}</a>
    @endcan


</div>
