@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m12 l12 xl12 mt-20">
                <div>
                <h4 class="center grey-text text-darken-2 card-title">Create New Employee</h4>
                </div>
                <hr>
                <div class="card-content">
                    <form action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col s12 m6 l6 xl4 offset-xl2">
                                <i class="material-icons prefix">person</i>
                                <input type="text" name="name" id="name" value="{{Request::old('name') ? : ''}}">
                                <label for="name">Họ tên</label>
                                <span class="{{$errors->has('name') ? 'helper-text red-text' : ''}}">{{$errors->first('name')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl8 offset-xl2">
                                <i class="material-icons prefix">email</i>
                                <input type="email" name="email" id="email" value="{{Request::old('email') ? : ''}}">
                                <label for="email">Email</label>
                                <span class="{{$errors->has('email') ? 'helper-text red-text' : ''}}">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4 offset-xl2">
                                <i class="material-icons prefix">perm_identity</i>
                                <input type="number" name="age" id="age" value="{{Request::old('age') ? : ''}}">
                                <label for="age">Tuổi</label>
                                <span class="{{$errors->has('age') ? 'helper-text red-text' : ''}}">{{$errors->has('age') ? $errors->first('age') : ''}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4">
                                <i class="material-icons prefix">contact_phone</i>
                                <input type="number" name="phone" id="phone" value="{{Request::old('phone') ? : ''}}">
                                <label for="phone">Số điện thoại</label>
                                <span class="{{$errors->has('phone') ? 'helper-text red-text' : ''}}">{{$errors->has('phone') ? $errors->first('phone') : ''}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl8 offset-xl2">
                                <i class="material-icons prefix">add_location</i>
                                <textarea name="address" id="address" class="materialize-textarea" >{{Request::old('address') ? : ''}}</textarea>
                                <label for="address">Địa chỉ</label>
                                <span class="{{$errors->has('address') ? 'helper-text red-text' : ''}}">{{$errors->has('address') ? $errors->first('address') : ''}}</span>
                            </div>

                            <div class="input-field col s12 m6 l6 xl4 offset-xl2">
                                <i class="material-icons prefix">person_outline</i>
                                <select name="gender">
                                    <option value="" disabled {{ old('gender')? '' : 'selected' }}>Giới tính</option>
                                    @foreach($genders as $gender)
                                        <option value="{{$gender->id}}" {{ old('gender')? 'selected' : '' }}>{{$gender->gender_name}}</option>
                                    @endforeach
                                </select>
                                <label>Gender</label>
                            </div>
                            <div class="input-field col s12 m12 l12 xl8 offset-xl2">
                            <i class="material-icons prefix">business</i>
                                <select name="department">
                                    <option value="" disabled {{ old('department') ? '' : 'selected' }}>Chọn đơn vị</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}" {{ old('department') ? 'selected' : '' }}>{{$department->dept_name}}</option>
                                    @endforeach
                                </select>
                                <label>Đơn vị</label>
                            </div>
                            <div class="input-field col s12 m12 l12 xl8 offset-xl2">
                                <i class="material-icons prefix">business</i>
                                <select name="division">
                                    <option value="" disabled {{ old('division') ? '' : 'selected' }}>Chọn phòng ban</option>
                                    @foreach($divisions as $division)
                                        <option value="{{$division->id}}" {{ old('division') ? 'selected' : '' }}>{{$division->division_name}}</option>
                                    @endforeach
                                </select>
                                <label>Phòng ban</label>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4">
                                <i class="material-icons prefix">location_city</i>
                                <select name="city">
                                    <option value="" disabled {{ old('city') ? '' : 'selected' }}>Chọn tỉnh thành</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{ old('city') ? 'selected' : '' }} >{{$city->city_name}}</option>
                                    @endforeach
                                </select>
                                <label>Tỉnh thành</label>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4">
                                <i class="material-icons prefix">location_city</i>
                                <select name="district">
                                    <option value="" disabled {{ old('district') ? '' : 'selected' }}>Chọn quận huyện</option>
                                    @foreach($districts as $district)
                                        <option value="{{$district->id}}" {{ old('district') ? 'selected' : '' }} >{{$district->district_name}}</option>
                                    @endforeach
                                </select>
                                <label>Quận huyện</label>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4">
                                <i class="material-icons prefix">location_city</i>
                                <select name="ward">
                                    <option value="" disabled {{ old('ward') ? '' : 'selected' }}>Chọn xã phường</option>
                                    @foreach($wards as $ward)
                                        <option value="{{$ward->id}}" {{ old('ward') ? 'selected' : '' }} >{{$ward->ward_name}}</option>
                                    @endforeach
                                </select>
                                <label>Quận huyện</label>
                            </div>
                            <div class="input-field col m6 l6 xl4 offset-xl2">
                                <i class="material-icons prefix">date_range</i>
                                <input type="text" name="join_date" id="join_date" class="datepicker" value="{{old('join_date') ? : ''}}">
                                <label for="join_date">Ngày vào Đảng</label>
                                <span class="{{$errors->has('join_date') ? 'helper-text red-text' : ''}}">{{$errors->has('join_date') ? $errors->first('join_date') : ''}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4">
                                <i class="material-icons prefix">date_range</i>
                                <input type="text" name="birth_date" id="birth_date" class="datepicker" value="{{Request::old('birth_date') ? : ''}}">
                                <label for="birth_date">Ngày sinh</label>
                                <span class="{{$errors->has('birth_date') ? 'helper-text red-text' : ''}}">{{$errors->has('birth_date') ? $errors->first('birth_date') : '' }}</span>
                            </div>                            
                            <div class="file-field input-field col s12 m12 l12 xl8 offset-xl2">
                                <div class="btn">
                                    <span>Picture</span>
                                    <input type="file" name="picture">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" value="{{old('picture') ? : '' }}">
                                    <span class="{{$errors->has('picture') ? 'helper-text red-text' : ''}}">{{$errors->has('picture') ? $errors->first('picture') : ''}}</span>
                                </div>
                            </div>
                        </div>
                        @csrf()
                        <div class="row">
                            <button type="submit" class="btn waves-effect waves-light col s8 offset-s2 m4 offset-m4 l4 offset-l4 xl4 offset-xl4">Add</button>
                        </div>
                    </form>
                </div>
                <div class="card-action">
                    <a href="/employees">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection