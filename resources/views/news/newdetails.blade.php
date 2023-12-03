
@extends('layouts.app')

@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="{{ route('returnview') }}">Tin tức</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>{{ $newDetail->a_name }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane active" id="home">
            <div class="product-tab-content">
                <div id="editorContent">	</div>
                
            
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var ckeditorContent = "{!! addslashes($newDetail->a_content) !!}"; // Sử dụng addslashes để xử lý các ký tự đặc biệt

    // Gán nội dung CKEditor vào phần tử HTML
    $('#editorContent').html(ckeditorContent);
</script>
@stop
