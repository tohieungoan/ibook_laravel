<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8 col-md-offset-2">
            <div class="form-group">
                <label for="a_name">Tên bài viết:</label>
                <input type="text" class="form-control" placeholder="Tên bài viết:" value="{{ old('a_name', $article->a_name ?? '') }}" name="a_name">
                @if($errors->has('a_name'))
                    <span class="error-text">
                        {{$errors->first('a_name')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Mô tả:</label>
                <textarea name="a_description" class="form-control" id="" cols="30" rows="3" placeholder="Mô tả bài viết">{{ old('a_description', $article->a_description ?? '') }}</textarea>
                @if($errors->has('a_description'))
                    <span class="error-text">
                        {{$errors->first('a_description')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Nội dung:</label>
                <textarea id="a_content" name="a_content" class="form-control" id="" cols="30" rows="3" placeholder="Nội dung">{{ old('a_content', $article->a_content ?? '') }}</textarea>
                @if($errors->has('a_content'))
                    <span class="error-text">
                        {{$errors->first('a_content')}}
                    </span>
                @endif
            </div>

            
            <div class="form-group">
                <label for="name">Meta Title:</label>
                <input type="text" class="form-control" placeholder="Meta Title" value="{{ old('a_title_seo', $article->a_title_seo ?? '') }}" name="a_title_seo">
            </div>
            <div class="form-group">
                <label for="name">Meta Description:</label>
                <input type="text" class="form-control" placeholder="Meta Description" value="{{ old('a_description_seo', $article->a_description_seo ?? '') }}" name="a_description_seo">
                @if($errors->has('a_description_seo'))
                    <span class="error-text">
                        {{$errors->first('a_description_seo')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Avatar:</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
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
          .create( document.querySelector( '#a_content' ) )
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