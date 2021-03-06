@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">新增一篇文章</div>
                <div class="panel-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    
                    @include('vendor.ueditor.assets')

                    <form action="{{ url('admin/article') }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题">
                        <br>
                        <textarea name="body" rows="10" class="form-control" required="required" placeholder="请输入内容"></textarea>
                        <!-- 编辑器容器 -->
                        <script id="container" name="content" type="text/plain"></script>
                        <br>
                        <button class="btn btn-lg btn-info">新增文章</button>
                    </form>
                    
                    <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                        var ue = UE.getEditor('container');
                        ue.ready(function() {
                            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection