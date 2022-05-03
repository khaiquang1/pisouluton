@extends('admin.layout.master_login')

@section('content')
<style>
.logo-login{
  margin-top:5em;
  margin-bottom:1.5em;
}
</style>
<div class="logo-login text-center">
	<img style="width:5%;" src="data:image/png;base64,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" width="180" alt="">
</div>
<div class="card card-authentication1 mx-auto">
  <div class="card-body">
    <div class="card-content p-2">
      <div class="card-title text-uppercase text-center py-3">Đăng nhập</div>
      <form action="{{route('admin.auth.postLogin')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="exampleInputUsername" class="sr-only">Tên tài khoản</label>
          <div class="position-relative has-icon-right">
            <input type="text" id="exampleInputUsername" name="user_email" class="form-control input-shadow"
                   placeholder="Nhập tên tài khoản">
            <div class="form-control-position">
              <i class="icon-user"></i>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword" class="sr-only">Mật khẩu</label>
          <div class="position-relative has-icon-right">
            <input type="password" id="exampleInputPassword" name="user_password"
                   class="form-control input-shadow" placeholder="Nhập mật khẩu">
            <div class="form-control-position">
              <i class="icon-lock"></i>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-light btn-block">Đăng nhập</button>
      </form>
    </div>
  </div>
  @if (Session::has('error'))
    <div class="alert alert-success">
        <ul>
            <li>{!! Session::get('error') !!}</li>
        </ul>
    </div>
@endif
</div>
@endsection