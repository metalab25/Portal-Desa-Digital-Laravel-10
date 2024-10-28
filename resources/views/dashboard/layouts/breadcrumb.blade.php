<div class="app-content-header font-outfit">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0 pt-1">{{ $page }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    @if (request()->segment(1) != 'dashboard')
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
