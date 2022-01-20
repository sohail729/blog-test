{!! Form::model($category, ['route' => ['admin.categories.update', $category->slug ?? null], 'class' =>
'form-validate','autocomplete' => 'off']) !!}
@method('put')
<div class="row g-gs">
  <div class="col-md-6">
    <div class="form-group">
      <label class="form-label" for="fv-full-name">Title *</label>
      <div class="form-control-wrap">
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Type title', 'required' =>
        'required' ]) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="form-label" for="fv-full-name">Slug *</label>
      <div class="form-control-wrap">
        {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Type slug', 'required' =>
        'required']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="form-label" for="fv-full-name">Parent Category <small>(Optional)</small></label>
      <div class="form-control-wrap">
        {!! Form::select('parent_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Select
        parent category' ]) !!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label class="form-label" for="fv-full-name">In Header?</label>
      <div class="form-control-wrap">
        <div class="custom-control custom-control-lg custom-switch">
          <input type="checkbox" name="in_header" value="1" {{  $category->in_header == 1 ? "checked" : "" }} class="custom-control-input" id="in-header">
          <label class="custom-control-label" for="in-header"></label>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label class="form-label" for="fv-full-name">In Footer?</label>
      <div class="form-control-wrap">
        <div class="custom-control custom-control-lg custom-switch">
          <input type="checkbox" name="in_footer" value="1" {{  $category->in_footer == 1 ? "checked" : "" }} class="custom-control-input" id="in-footer">
          <label class="custom-control-label" for="in-footer"></label>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      <label class="form-label" for="fv-full-name">Description <small>(Optional)</small></label>
      <div class="form-control-wrap">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Write category description!' ]) !!}
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      {!! Form::button('<em class="icon ni ni-cross"></em>', ['type' => 'button', 'data-dismiss' => "modal",
      'class' => 'btn btn-light']) !!}
      {!! Form::button('<em class="icon ni ni-save"></em>', ['type' => 'submit', 'class' => 'btn btn-success'])
      !!}
    </div>
  </div>

</div>
{!! Form::close() !!}