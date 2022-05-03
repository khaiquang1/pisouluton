@extends('admin.layout.master_layout')
@section('title')
    Danh sách tin tức
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
            <h4 class="page-title">Tin Tức</h4>
        </div>
    </div>
    <div class="row mt-3">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="card-title">Tìm kiếm</div>
            <form action="{{route('admin.listNews')}}" method="GET">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label mb-10" for="exampleInputpwd_1"><i
                                                                                      class="fa fa-user" aria-hidden="true"></i>
                          ID tin tức</label>
                        <input class="form-control" type="text" placeholder="ID Tin tức"
                               value="{{request()->input('UserID')}}" name="UserID">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label mb-10" for="exampleInputpwd_1"><i
                                                                                      class="fa fa-users" aria-hidden="true"></i>
                          Tiêu đề</label>
                        <input class="form-control" type="text" placeholder="Tiêu đề"
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
                                    <th>Hình ảnh</th>
                                  	<th>Tiêu đề</th>
                                  	<th>Trạng thái</th>
                                    <th>ngày tạo</th>
                                    <th>Thao tác</th>

                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        <td>1</td>
                                        <td></td>
                                      	<td>Tiêu đề cứng</td>
                                      	<td>
                                            <span class="badge badge-success ma-2">
                                          	    Hiển thị
                                          	</span>
                                        </td>
                                        <td>
                                          	29/4/2022
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                
                            </tbody>
                        </table>
                    </div>
                  
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
