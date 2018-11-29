@extends('admins.app') 

@section('css')
    {!! editormd_css() !!}
@stop

@section('title', '教程分类') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-white">
            <p class="text-muted">
                @isset($category)
                    编辑教程分类
                @else
                    创建教程分类
                @endisset                
            </p>
        </div>
        <div class="card-body p-4 text-muted">
            <form method="POST" action="{{ isset($category) ? route('admins.categories.update', $category->id) : route('admins.categories.store') }}">

                @csrf
                @isset($category)
                    <input type="hidden" name="_method" value="PUT">
                @endisset

                <div class="form-group">
                    <label for="name">分类名称</label>

                    <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', isset($category) ? $category->name : '') }}" required autofocus placeholder="输入名称">

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">描述</label>
                    
                    <textarea  class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="5" required>{{ old('description', isset($category) ? $category->description : '') }}</textarea>
                    <small class="text-info">这个用于列表显示的内容</small>

                    @if ($errors->has('description'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="title">排序</label>

                    <input type="number" class="form-control {{ $errors->has('sort') ? ' is-invalid' : '' }}" name="sort" value="{{ old('sort', isset($category) ? $category->sort : '') }}" placeholder="输入整形数字">

                    @if ($errors->has('sort'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('sort') }}</strong>
                        </span>
                    @endif
                </div>
                        
                        
                <div class="form-group my-3">
                    <button type="submit" class="btn btn-success pull-right">
                        <i class="fa fa-save mr-2"></i>保存
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('script')
<script type="text/javascript">
    $('.js-btn-del').on('click',function(){
        var obj = $(this).children('form');
        swal_delete(function(){
            console.log(obj);
            obj.submit();
        });
    });

</script>
@stop