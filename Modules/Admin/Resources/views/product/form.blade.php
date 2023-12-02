<form action="" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
      <div class="col-sm-8">
          <div class="form-group">
              <label for="pro_name">Tên sản phẩm:</label>
              <input type="text" class="form-control" placeholder="Tên sản phẩm:" value="{{ old('pro_name', $product->pro_name ?? '') }}" name="pro_name">
              @if($errors->has('pro_name'))
                  <span class="error-text">
                      {{$errors->first('pro_name')}}
                  </span>
              @endif
          </div>
          <div class="form-group">
              <label for="name">Mô tả:</label>
              <textarea name="pro_description" class="form-control"  cols="30" rows="3" placeholder="Mô tả ngắn sản phẩm">{{ old('pro_description', $product->pro_description ?? '') }}</textarea>
              @if($errors->has('pro_description'))
                  <span class="error-text">
                      {{$errors->first('pro_description')}}
                  </span>
              @endif
          </div>
          <div class="form-group">
              <label for="name">Nội dung:</label>
              <textarea name="pro_content" class="form-control"  cols="30" rows="3" id="pro_content" placeholder="Nội dung">{{ old('pro_content', $product->pro_content ?? '') }}</textarea>
              @if($errors->has('pro_content'))
                  <span class="error-text">
                      {{$errors->first('pro_content')}}
                  </span>
              @endif
          </div>
          <div class="form-group">
              <label for="name">Meta Title:</label>
              <input type="text" class="form-control" placeholder="Meta Title" value="{{ old('pro_title_seo', $product->pro_title_seo ?? '') }}" name="pro_title_seo">
          </div>
          <div class="form-group">
              <label for="name">Meta Description:</label>
              <input type="text" class="form-control" placeholder="Meta Description" value="{{ old('pro_description_seo', $product->pro_description_seo ?? '') }}" name="pro_description_seo">
              @if($errors->has('pro_description_seo'))
                  <span class="error-text">
                      {{$errors->first('pro_description_seo')}}
                  </span>
              @endif
          </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="name">Loại sản phẩm:</label>
          <select name="pro_category_id" class="form-control">
              <option value="">-- Chọn loại sản phẩm --</option>
              @if(isset($categories))
                  @foreach($categories as $category)
                      <option value="{{$category->id}}" {{ old('pro_category_id', $product->pro_category_id ?? '') == $category->id ? 'selected' : '' }}>{{$category->c_name}}</option>
                  @endforeach
              @endif
          </select>
          @if($errors->has('pro_category_id'))
              <span class="error-text">
                  {{$errors->first('pro_category_id')}}
              </span>
          @endif
      </div>
          <div class="form-group">
              <label for="pro_price">Giá sản phẩm:</label>
              <input type="number" name="pro_price" value="{{ old('pro_price', $product->pro_price ?? '') }}" placeholder="Giá sản phẩm" class="form-control" id="">
              @if($errors->has('pro_price'))
                  <span class="error-text">
                      {{$errors->first('pro_price')}}
                  </span>
              @endif
          </div>
          <div class="form-group">
              <label for="pro_sale">% Khuyến mãi:</label>
              <input type="number" value="{{ old('pro_sale', $product->pro_sale ?? '') }}" name="pro_sale" placeholder="% giảm giá" class="form-control" id="" value="0">
          </div>
          <div class="form-group">
        <img id="out_img" src="{{ asset('img/cropping.jpg') }}" style="width: 100%" height="300px" alt="">
        </div>
          <div class="form-group">
              <label for="name">Avatar:</label>
              <input type="file" id="input_img" name="avatar" class="form-control">
          </div>
          <div class="form-group">
              <div class="checkbox">
                  <label><input type="checkbox" name="hot">Nổi bật</label>
              </div>
          </div>
      </div>

      <div class="col-sm-12">
          <button type="submit" class="btn btn-primary">Lưu</button>
      </div>
  </div>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('script')
<script src="{{ asset('ckeditor5-build-classic/ckeditor.js') }}"></script>



<script>
    ClassicEditor
        .create( document.querySelector( '#pro_content' ) )
        .then( editor => {
            // Thêm plugin Image vào trình soạn thảo
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = function( loader ) {
                return {
                    upload: function() {
                        return loader.file
                            .then( file => new Promise( ( resolve, reject ) => {
                                // Tạo một URL đến file ảnh tải lên
                                const reader = new FileReader();
                                reader.onload = function() {
                                    resolve( { default: reader.result } );
                                };
                                reader.onerror = function( error ) {
                                    reject( error );
                                };
                                reader.readAsDataURL( file );
                            } ) );
                    }
                };
            };
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
@stop