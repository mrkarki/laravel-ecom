@php
    $base = strtolower($panel);
    $panel = ucwords(str_replace('-', ' ',  $panel));
    $title = ucfirst($title);
@endphp
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-6">
        <h2>{{ $panel }} Management</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                {{-- <a href="{{ route('admin.dashboard') }}">Home</a> --}}
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('admin.'.$base.'.index') }}">{{ $panel }}</a>
            </li>

            <li class="breadcrumb-item">
                <strong>{{ $title }}</strong>
            </li>
        </ol>
    </div>

    <div class="col-lg-6" style="padding-top: 30px;">
        {{-- <div class="btn-toolbar pull-right">
            @if (is_active("admin.{$base}.index") || is_active("admin.{$base}.show") || is_active("admin.{$base}.edit"))
                <a href="{{ route('admin.'.$base.'.create') }}" class="btn btn-sm btn-success pull-right m-t-n-xs mr-3">
                    <i class="fa fa-plus"></i><strong> Create</strong>
                </a>
            @endif

            @if (is_active("admin.{$base}.create") || is_active("admin.{$base}.show") || is_active("admin.{$base}.edit"))
                <a href="{{ route('admin.'.$base.'.index') }}" class="btn btn-sm btn-success pull-right m-t-n-xs mr-3">
                    <i class="fa fa-list"></i><strong> List</strong></a>
            @endif

            @if (is_active("admin.{$base}.show"))
                <a href="{{ route('admin.'.$base.'.edit', $id) }}" class="btn btn-sm btn-success pull-right m-t-n-xs mr-3">
                    <i class="fa fa-edit"></i><strong> Edit </strong></a>
            @endif

            @if (is_active("admin.{$base}.edit"))
                <a href="{{ route('admin.'.$base.'.show', $id) }}" class="btn btn-sm btn-success pull-right m-t-n-xs mr-3">
                    <i class="fa fa-eye"></i><strong> View </strong></a>
            @endif
        </div> --}}
    </div>

</div>

@if(app()->environment('local') && $errors->any())
    <br>
    <pre style="color: red;">{!! implode('', $errors->all('<code>:message</code> <br>')) !!}</pre>
@endif
