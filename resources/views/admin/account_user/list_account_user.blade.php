@extends('admin.layout.master_layout')
@section('title')
    Danh sách tài khoản
@endsection
@section('css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css" rel="stylesheet" />
	<style>
		.btn-sm{
          padding: 5px 15px!important;
        }
    .select-admin option{
      background-color: #fff ;
    }
	</style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection


@section('content')
<div class="container-fluid">
    <div class="row pt-2 pb-2">
        <div class="col-sm-12">
            <h4 class="page-title">Tài khoản</h4>
        </div>
    </div>
    <div class="row mt-3">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="card-title">Tìm kiếm</div>
            <form action="{{ route('admin.account_user') }}" method="GET">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label mb-10" for="exampleInputpwd_1"><i
                                                                                      class="fa fa-user" aria-hidden="true"></i> User
                          ID</label>
                        <input class="form-control" type="text" placeholder="User ID"
                               value="{{request()->input('UserID')}}" name="UserID">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label mb-10" for="exampleInputpwd_1"><i
                                                                                      class="fa fa-users" aria-hidden="true"></i>
                          Email</label>
                        <input class="form-control" type="text" placeholder="Email"
                               value="{{request()->input('Email')}}" name="Email">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label mb-10" for="exampleInputpwd_1"><i
                                                                                      class="fa fa-users" aria-hidden="true"></i> Ngày tạo</label>
                        <input type="text" class="form-control" placeholder="Ngày tạo"
                               name="datetime" id="datetime"
                               value="{{request()->input('datetime')}}" />
                      </div>
                    </div>
                    
                    
                </div>
                <div class="">
                  <div class="form-group">
                    <div class="form-actions mt-10">
                      <button type="submit"
                              class="btn-filler btn btn-success btn-stk waves-effect"><i
                                                                                     class="fa fa-search" aria-hidden="true"></i>
                        Tìm kiếm
                      </button>
                      
                        
                    </div>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                  	<i class="fa fa-table"></i> Danh sách
                </div>
              	
                <div class="card-body">
                    <div class="table-responsive" style="margin-top:20px;">
                        <table id="dt-dashboard" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                  	<th>Quyền</th>
                                    
                                  	<th>Ngày đăng ký</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getAccount as $item)
                                    <tr>
                                        <td>{{ $item->User_ID }}</td>
                                        <td>{{ $item->User_Email }}</td>
                                      	<td>
                                          	<span class="badge badge-success r-3">
                                          	Admin
                                          	</span>
                                        
                                      	<td>{{ $item->User_Created_At }}</td>
                                        <td>
                                          	<span class="badge badge-{{$item->User_Active == 0 ? 'warning' : 'success'}} ma-2">
                                          	{{$item->User_Active == 1 ? 'Actived' : 'No-Actived'}}
                                          	</span>
                                          	<span class="badge badge-{{$item->User_Block == 1 ? 'danger' : 'light'}} ma-2">
                                          	{{$item->User_Block == 1 ? 'Blocked' : 'UnBlock'}}
                                          	</span>
                                        </td>
                                        <td>
                                          	
                                          	
                                           
                                        </td>

                                    </tr>
                                @endforeach	
                            </tbody>
                        </table>
                    </div>
                  {{$getAccount->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js'></script>
    <script>
        $('#datetime').bootstrapMaterialDatePicker({ format : 'YYYY-MM-DD', clearButton: true, time: false });
    </script>
    <script type='text/javascript' src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
@endsection
