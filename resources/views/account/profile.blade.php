@extends('layouts.app')
@section('content')
<style>
    body {
        margin-top: 20px;
        background-color: #f2f6fc;
        color: #69707a;
    }

</style>
@if(isset($message))
    <div class="alert alert-danger">
        {{ $message }}
    </div>
@endif
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="index.html">Quản lý tài khoản</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>Thông tin cá nhân</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="{{ route('accountmanager') }}">Profile</a>
            <a class="nav-link" href="{{ route('billing') }}">Billing</a>
            <a class="nav-link" href="{{ route('changepasss') }}">Security</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <form action="{{ route('saveprofile') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <!-- Profile picture image-->
                        @if(isset($user->avatar))
                        <img id="out_img" src="{{ pare_url_file($user->avatar) }}" style="width: 100%" height="300px" alt="">
                    @else
                        <img id="out_img" src="{{ asset('img/cropping.jpg') }}" style="width: 100%" height="300px" alt="">
                    @endif
                      
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <input type="file" id="input_img" name="avatar" class="form-control">


                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Thông tin tài khoản</div>
                    <div class="card-body">
                       
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (Sẽ hiển thị khi bình luận hoặc
                                    mua hàng)</label>
                                <input class="form-control" id="inputUsername" type="text"
                                    placeholder="Enter your username" name ="name" value="{{ $user->name }}">
                            </div>
                            <!-- Form Row-->



                            <div class="row gx-3 mb-3 form-group">
                                <label class="small mb-1"> address</label>
                                <div class="col-md-4">

                                    <select id="city" class="form-select form-select-lg">
                                        <option value="" selected>Chọn tỉnh thành</option>
                                    </select>
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-4">
                                    <select id="district" class="form-select form-select-lg">
                                        <option value="" selected>Chọn quận huyện</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select id="ward" class="form-select form-select-lg">
                                        <option value="" selected>Chọn phường xã</option>
                                    </select>
                                </div>
                            </div>


                            <div class="mb-3">

                                <input class="form-control" name="location" id="result" type="text" value="{{ $user->location }}">
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="Note">Note</label>
                                    <textarea class="form-control" name="note" id="Note" rows="3">{{ $user->note }}</textarea>
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" name ="email"id="inputEmailAddress" type="email"
                                    placeholder="Enter your email address" value="{{ $user->email }}">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" name="phone" id="inputPhone" type="tel"
                                        placeholder="Enter your phone number" value="{{ $user->phone }}">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                    <input class="form-control" id="inputBirthday" type="date" min="1918-01-01"
                                        max="2118-12-31" name="birthday" value="{{ $user->birthdate }}">
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    const host = "https://provinces.open-api.vn/api/";
    var callAPI = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data, "city");
            });
    }
    callAPI('https://provinces.open-api.vn/api/?depth=1');
    var callApiDistrict = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.districts, "district");
            });
    }
    var callApiWard = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.wards, "ward");
            });
    }

    var renderData = (array, select) => {
        let row = ' <option disable value="">Chọn</option>';
        array.forEach(element => {
            row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
        });
        document.querySelector("#" + select).innerHTML = row
    }

    $("#city").change(() => {
        callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
        printResult();
    });
    $("#district").change(() => {
        callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
        printResult();
    });
    $("#ward").change(() => {
        printResult();
    })

    var printResult = () => {
        if ($("#district").find(':selected').data('id') != "" && $("#city").find(':selected').data('id') != "" &&
            $("#ward").find(':selected').data('id') != "") {
            let result = $("#city option:selected").text() +
                " | " + $("#district option:selected").text() + " | " +
                $("#ward option:selected").text();
            $("#result").val(result)
        }

    }

</script>
{{-- <script>
      function readURL(input) {
   if(input.files && input.files[0]){
    var reader = new FileReader();
    reader.onload = function (e) {
            $('#out_img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
   }
    }

    $("#input_img").change(function(){
        readURL(this);
    });
  
    </script> --}}
@stop
