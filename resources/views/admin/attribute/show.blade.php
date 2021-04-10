@extends('admin.layouts.layout')

@push('style')

@endpush

@section('title', 'attribute')

@section('content')

@include('admin.common.breadcrumbs', [
'title' => 'Show',
'panel' => 'attribute',
'id'    => $data['row']->id,
])

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">

                <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="150px">Label</th>
                            <th>Information</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
    <td style="width:35%;">Type</td>
    <td style="width:65%">{{ $data['row']->type }}</td>
</tr>

<tr>
    <td style="width:35%;">Name</td>
    <td style="width:65%">{{ $data['row']->name }}</td>
</tr>
<tr>
    <td style="width:35%;">Status</td>
    <td style="width:65%"> <?php if($data['row']->status=='1'){ echo 'Active'; }else{ echo 'Inactive'; }?></td>
</tr>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

@endpush
