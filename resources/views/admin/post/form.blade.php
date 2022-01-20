@extends('layouts.admin')
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview mx-auto">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Post</h2>
                            <nav>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url("/") }}">{{ env('APP_NAME') }}</a></li>
                                    <li class="breadcrumb-item active"><a href="">{{ getPageType() != 'GET'? 'Edit' : 'Add'}} Post</a></li>
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
                                @if(isset($post))
                                {!! Form::model($post, ['id' => 'postsForm', 'route' => ['admin.posts.update', $post->slug ??
                                null],
                                'class'
                                => 'form-validate','autocomplete'
                                => 'off', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                                @method('put')
                                @else
                                {!! Form::model([], ['id' => 'postsForm', 'route' => ['admin.posts.store'], 'class'
                                => 'form-validate', 'autocomplete'
                                => 'off', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                                @method('post')
                                @endif
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
                                                => 'Type slug']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Content *</label>
                                            <div class="form-control-wrap">
                                                {!! Form::textarea('content', null, ['id' => 'summernote', 'class'
                                                => 'form-control' ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Category *</label>
                                            <div class="form-control-wrap">
                                                {!! Form::select('category_id', $categories, null, ['class' =>
                                                'form-control', 'placeholder' => 'Select category' ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Image
                                                <small>(Optional)</small></label>
                                            <div class="form-control-wrap">
                                                {!! Form::file('image', null, ['class' =>
                                                'form-control']) !!}
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Write here!',
            height: 260
        });
    });

    // $(document).on('submit', '#postsForm', function(e) {  
    //     if($('#summernote').summernote('isEmpty')) {
    //         e.preventDefault();
    //         alert('Please enter some content !!')
    //     }
    // })

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