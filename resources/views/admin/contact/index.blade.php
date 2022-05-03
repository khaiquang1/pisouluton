@extends('admin.layout.master_layout')
@section('title')
Danh sách liên hệ
@endsection
@section('css')
	<style>
		.btn-sm{
          padding: 3px 6px;
        }
	</style>
@endsection

@section('content')

    <div class="container-fluid">
      	<div class="row pt-4 pb-2">
            <div class="col-sm-12">
                <h4 class="page-title">@yield('title')</h4>
            </div>
        </div>
        <div class="row mt-3">
          	<div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Tìm kiếm</div>
                        <form action="{{ route('admin.contact.getListContact') }}" method="GET">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label mb-10" for=""> Tên</label>
                                        <input class="form-control" value="{{request()->input('name')}}" type="text" placeholder="Nhập tên người dùng cần tìm" name="name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label mb-10" for=""> Công ty</label>
                                        <input class="form-control" type="text" value="{{request()->input('company')}}" placeholder="Nhập tên công ty cần tìm" name="company">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label mb-10" for=""> Địa chỉ</label>
                                        <input class="form-control" type="text" value="{{request()->input('address')}}" placeholder="Nhập địa chỉ cần tìm" name="address">
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="form-actions mt-10">
                                        <button type="submit" class="btn-filler btn btn-success btn-stk waves-effect">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                            Tìm kiếm
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-table"></i> Danh sách
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dt-dashboard" class="table table-bordered">
                                    <thead>
                                      	<tr>
                                            <th>ID</th>
                                            <th>Tên</th>
                                            <th>Công ty</th>
                                            <th>Địa chỉ</th>
                                            <th>Điện thoại</th>
                                            <th>Email</th>
                                            <th>Ngày gửi</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($list as $l)
                                        <tr>
                                            <td>{{$l->contact_id}}</td>
                                            <td>{{$l->contact_name_user}}</td>
                                            <td>{{$l->contact_name_company}}</td>
                                            <td>{{$l->contact_andress}}</td>
                                            <td>{{$l->contact_phone}}</td>
                                            <td>{{$l->contact_email}}</td>
                                            <td>{{$l->contact_date_create}}</td>
                                            <td>
                                                <span class="badge badge-{{$l->contact_status == 1 ? 'success' : ($l->contact_status == 0 ? 'warning' : 'danger')}} m-1">
                                                  {{$l->contact_status == 1 ? 'Đã xử lý' : ($l->contact_status == -1 ? 'Đã huỷ' : 'Chờ xử lý')}}</span>
                                            </td>
                                            <td>
                                                <div>
                                                  	@if($l->contact_status == 0)
                                                	<a href="{{route('admin.contact.getConfirmContact', $l->contact_id)}}" class="btn mb-1 mt-1 btn-success d-block btn-sm">
                                                      <i class="fa fa-check" aria-hidden="true"></i> Xác nhận
                                                  	</a>
                                                  	@endif
                                                  	@if($l->contact_status != -1)
                                              		<a href="{{route('admin.contact.getDeleteContact', $l->contact_id)}}" class="btn mb-1 mt-1 btn-danger d-block btn-sm">
                                                      <i class="fa fa-times" aria-hidden="true"></i> Huỷ
                                                  	</a>  
                                                  	@endif
                                              	</div>
                                            </td>
                                          	
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                              	<div style="margin-top:15px">
                                  	{{$list->links()}}
                              	</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="editCareer" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInX">

                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                  	<form action="{{ route('admin.career.getEdit') }}" method="POST">
                      	@csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">ID</label>
                                <input type="number" id="career_id" name="id" value="" class="form-control" readonly>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="">Name</label>
                                <input type="text" id="career_name" name="name" value="" class="form-control">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="">Key</label>
                                <input type="text" id="career_key" name="key" value="" class="form-control">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="">Keyword</label>
                                <input type="text" id="career_keyword" name="keyword" value="" class="form-control">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="">Status</label>
                                <select id="career_status" class="form-control" name="status">
                                  <option selected value="1">
                                    Confirm</option>
                                  <option value="0">
                                    Pending</option>
                                  <option value="-1">
                                    Cancel </option>
                                </select>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit"class="btn mb-1 mt-1 btn-success d-inline-block">
                                     Save
                                </button> 
                                <button class="btn mb-1 mt-1 btn-danger d-inline-block" data-dismiss="modal">
                                     Cancel
                                </button> 
                            </div>
                        </div>
                  	</form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script>
	$('.btn_edit').click(function(){
      	_id = $(this).data('id');
      	_name = $(this).data('name');
      	_key = $(this).data('key');
      	_keyword = $(this).data('keyword');
      	_status = $(this).data('status');
      	$('#career_id').val(_id);
      	$('#career_name').val(_name);
      	$('#career_key').val(_key);
      	$('#career_keyword').val(_keyword);
      	$('#career_status').val(_status);
    });
  	
</script>
@endsection
