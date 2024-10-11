<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="{{$icon}} icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>{{$title}}</div>
        </div>

        @isset($permission)
        @can($permission)
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="{{$url}}" class="btn-shadow btn btn-alternate">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                    </span>
                    {{ __('Back To The List') }}
                </a>
            </div>
        </div>
        @endcan
        @else
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="{{$url}}" class="btn-shadow btn btn-alternate">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                    </span>
                    {{ __('Back To The List') }}
                </a>
            </div>
        </div>
        @endisset
    </div>
</div>
