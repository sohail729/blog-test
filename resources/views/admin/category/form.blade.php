@extends('layouts.admin')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview mx-auto">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Category</h2>
                            <nav>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url("/") }}">{{ env('APP_NAME') }}</a></li>
                                    <li class="breadcrumb-item active"><a href="">{{ getPageType() != 'GET'? 'Edit' : 'Add'}} Category</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div><!-- .nk-block-head -->

                    <!-- main alert @s -->
                    @include('admin.partials.alerts')
                    <!-- main alert @e -->

                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                {!! Form::model([], ['route' => ['admin.categories.store'], 'class' => 'form-validate',
                                'autocomplete' => 'off']) !!}
                                @method('post')
                                <div class="row g-gs">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Title *</label>
                                            <div class="form-control-wrap">
                                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'
                                                => 'Type title' ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Slug *</label>
                                            <div class="form-control-wrap">
                                                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder'
                                                => 'Type slug' ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Parent Category
                                                <small>(Optional)</small></label>
                                            <div class="form-control-wrap">
                                                {!! Form::select('parent_id', $categories, null, ['class' =>
                                                'form-control', 'placeholder' => 'Select parent category' ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">In Header?</label>
                                            <div class="form-control-wrap">
                                                <div class="custom-control custom-control-lg custom-switch">
                                                <input type="checkbox" name="in_header" value="1" class="custom-control-input" id="in-header">
                                                <label class="custom-control-label" for="in-header"></label>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">In Footer?</label>
                                            <div class="form-control-wrap">
                                            <div class="custom-control custom-control-lg custom-switch">
                                                <input type="checkbox" name="in_footer"  value="1" class="custom-control-input" id="in-footer">
                                                <label class="custom-control-label" for="in-footer"></label>
                                            </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Description
                                                <small>(Optional)</small></label>
                                            <div class="form-control-wrap">
                                                {!! Form::textarea('description', null, ['class' => 'form-control',
                                                'placeholder' => 'Write category description!' ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::button('<em class="icon ni ni-save"></em>', ['type' => 'submit',
                                            'class' => 'btn btn-success']) !!}
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: function () {
                $(this).data('placeholder');
            },
        });
    });

    $(document).on('keyup', 'input[name="title"]', function(e){
        let slug = convertToSlug($(this).val())
        $('input[name="slug"]').val(slug)
    })

</script>
@endpush