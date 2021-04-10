<div class="hr-line-dashed"></div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Title</label>
    <div class="col-sm-6 {{ $errors->has('title') ? 'has-error' : '' }}">
        {!! Form::text('title', null, [ 'class' => 'form-control','required' => 'required' ]) !!}
        @if($errors->has('ttile'))
            <label class="has-error" for="title">{{ $errors->first('title') }}</label>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Description</label>
    <div class="col-sm-6 {{ $errors->has('short_description') ? 'has-error' : '' }}">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        @if($errors->has('description'))
            <label class="has-error" for="description">{{ $errors->first('description') }}</label>
        @endif
    </div>
</div>

<div class="hr-line-dashed"></div>
<div class="form-group row">
    <label class="col-sm-1 col-form-label is_required">Status</label>
    <div class="col-sm-8">
        <div class="i-checks mt-2">
            <label for="active"> {!! Form::radio('status', 1, true, ['id' => 'active']) !!} <i></i> Active </label>
            <label for="inactive"> {!! Form::radio('status', 2, false, ['id' => 'inactive']) !!} <i></i> Inactive </label>
        </div>
    </div>
</div>

