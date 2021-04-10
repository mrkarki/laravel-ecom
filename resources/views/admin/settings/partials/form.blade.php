<div class="form-group  row">

    <label class="col-sm-2 col-form-label is_required">Site Title</label>
    <div class="col-sm-6 {{ $errors->has('site_title') ? 'has-error' : '' }}">
        <?php
            if($data['row']){ ?>
                {!! Form::text('site_title', $data['row']->site_title, [ 'class' => 'form-control' ]) !!}

                <?php  }else{ ?>
                {!! Form::text('site_title', null, [ 'class' => 'form-control' ]) !!}
                <?php   }
        ?>
        @if($errors->has('site_title'))
            <label class="has-error" for="site_title">{{ $errors->first('site_title') }}</label>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Site Email</label>
    <div class="col-sm-6 {{ $errors->has('site_email') ? 'has-error' : '' }}">
        <?php
            if($data['row']){ ?>
        {!! Form::text('site_email', $data['row']->site_email, [ 'class' => 'form-control' ]) !!}
           <?php }else{ ?>
                {!! Form::text('site_email', null, [ 'class' => 'form-control' ]) !!}

          <?php  }
            ?>
        @if($errors->has('site_email'))
            <label class="has-error" for="site_email">{{ $errors->first('site_email') }}</label>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Site Phone</label>
    <div class="col-sm-6 {{ $errors->has('site_phone') ? 'has-error' : '' }}">
        <?php
            if($data['row']){ ?>
        {!! Form::text('site_phone', $data['row']->site_phone, [ 'class' => 'form-control' ]) !!}
        <?php  }else{ ?>
                {!! Form::text('site_phone', null, [ 'class' => 'form-control' ]) !!}

                <?php   }
            ?>
        @if($errors->has('site_phone'))
            <label class="has-error" for="site_phone">{{ $errors->first('site_phone') }}</label>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Site Address</label>
    <div class="col-sm-6 {{ $errors->has('site_address') ? 'has-error' : '' }}">
        <?php
            if($data['row']){ ?>
        {!! Form::text('site_address', $data['row']->site_address, [ 'class' => 'form-control' ]) !!}
        <?php  }else{ ?>
                {!! Form::text('site_address', null, [ 'class' => 'form-control' ]) !!}

                <?php  } ?>
        @if($errors->has('site_address'))
            <label class="has-error" for="site_address">{{ $errors->first('site_address') }}</label>
        @endif
    </div>
</div>




