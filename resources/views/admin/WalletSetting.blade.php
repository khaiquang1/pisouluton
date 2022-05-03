@extends('admin.layout.master_layout')
@section('title', 'Admin-Wallet')
@section('css')

<style>
    .dtp-btn-cancel {
        background: #9E9E9E;
    }

    .dtp-btn-ok {
        background: #009688;
    }

    .dtp-btn-clear {
        color: black;
    }

    .btn-filler {
        margin-bottom: 10px;
    }

    .pagination {
        float: right;
    }
  .select2-container--default .select2-selection--multiple,.select2-dropdown{
    background:#000!important;
    color:#fff!important;
  }
  .select2-container--default .select2-selection--multiple .select2-selection__rendered,.select2-container--default .select2-search--inline .select2-search__field{
    background:#000!important;
    color:#fff!important;
  }
  select.select-status{
      background-color:#000 ;
  }
  select.select-status option{
      background-color:#000 ;
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        border-radius: 0 !important;
        color: #fff !important;
        padding: 8px 10px !important;
        margin-bottom: 10px !important;
        margin-right: 5px !important;
        display: inline-block !important;
        text-align: center !important;
        vertical-align: baseline !important;
        white-space: nowrap !important;
        background: #4aa23c !important;
        border: none !important;
        line-height: 10px !important;
        font-size: 12px !important;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="container-fluid">
            <!-- /Title -->
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('admin.wallet.postAdminWalletSetting')}}" id="">
                        @csrf
                        <div class="card">
                            <div class="">
                                <div class="card-body">
                                    <div class="form-wrap">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="exampleInputpwd_1">Phí rút(Fee/100)</label>
                                                        <input type="number" name="fee_withdraw" step="0.0001" class="form-control"
                                                            placeholder="Enter ID"
                                                            value="{{$setting->fee_withdraw}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="exampleInputpwd_1"><i
                                                                class="fa fa-user" aria-hidden="true"></i> Phí chuyển (Fee/100)</label>
                                                        <input type="number" step="0.0001" name="fee_transfer" class="form-control"
                                                            placeholder="Enter User ID"
                                                            value="{{$setting->fee_transfer}}">
                                                    </div>
                                                </div>
                                                <!--/span-->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10 text-left"><i
                                                                class="fa fa-calendar" aria-hidden="true"></i>
                                                            Số rút nhỏ nhất(USD)</label>
                                                        <input type='number' step="0.0001" name="min_withdraw" id=""
                                                            class="form-control"
                                                            value="{{$setting->min_withdraw}}" />
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10 text-left"><i
                                                                class="fa fa-calendar" aria-hidden="true"></i>
                                                            Số chuyển nhỏ nhất(USD)</label>
                                                        <input type='number' step="0.0001" name="min_transfer" id=""
                                                            class="form-control"
                                                            value="{{$setting->min_transfer}}" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="exampleInputuname_1"><i
                                                                class="fa fa-chevron-down" aria-hidden="true"></i>
                                                            Trạng thái rút</label>
                                                        <div class="form-group">
                                                            <select name="setting_withdraw" class="form-control select-status">
                                                                <option value="1" {{$setting->setting_withdraw === 1 ? 'selected' : ''}}>Bật </option>
                                                                <option value="0" {{$setting->setting_withdraw === 0 ? 'selected' : ''}}>Tắt</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="exampleInputuname_1"><i
                                                                class="fa fa-chevron-down" aria-hidden="true"></i>
                                                            Trạng thái chuyển</label>
                                                        <div class="form-group">
                                                            <select name="setting_transfer" class="form-control select-status">
                                                                <option value="1" {{$setting->setting_transfer === 1 ? 'selected' : ''}}>Bật </option>
                                                                <option value="0" {{$setting->setting_transfer === 0 ? 'selected' : ''}}>Tắt</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="form-actions mt-10">
                                                            <button type="submit"
                                                                class="btn-filler btn btn_search btn-lg1 btn-primary"><i
                                                                    class="fa fa-search" aria-hidden="true"></i>
                                                                Lưu
                                                            </button>
                                                            <a href="{{ route('admin.wallet.getAdminWallet') }}"
                                                                class="btn-filler btn btn-danger mr-10">Hủy</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
				
              <div class="col-md-12">
                	<div class="card">
                            <div class="">
                                <div class="card-body">
                                    <div class="form-wrap">
                                        <div class="form-body">
                                            <div class="row">
                                              	<div class="col-md-12">
                                                  <h4>
                                                      TÀI KHOẢN NGÂN HÀNG NHẬN TIỀN
                                                  </h4>
                                              	</div>
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                        <label class="control-label mb-10" for="exampleInputpwd_1">Ngân hàng </label>
                                                        <input type="text" name="bank_info_name" class="form-control"
                                                            placeholder="Nhập tên ngân hàng ..."
                                                            value="{{$bank->bank_info_name}}">
                                                    </div>
                                              	</div>
                                              	<div class="col-md-6">
                                                  <div class="form-group">
                                                        <label class="control-label mb-10" for="exampleInputpwd_1">Tên </label>
                                                        <input type="text" name="bank_info_account_name" class="form-control"
                                                            placeholder="Nhập tên tài khoản ngân hàng ..."
                                                            value="{{$bank->bank_info_account_name}}">
                                                    </div>
                                              	</div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                        <label class="control-label mb-10" for="exampleInputpwd_1">Số tài khoản </label>
                                                        <input type="text" name="bank_info_account_number" class="form-control"
                                                            placeholder="Nhập số tài khoản ..."
                                                            value="{{$bank->bank_info_account_number}}">
                                                    </div>
                                              	</div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                        <label class="control-label mb-10" for="exampleInputpwd_1">Chi nhánh </label>
                                                        <input type="text" name="bank_info_branch" class="form-control"
                                                            placeholder="Nhập số tài khoản ..."
                                                            value="{{$bank->bank_info_branch}}">
                                                    </div>
                                              	</div>
                                              <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="form-actions mt-10">
                                                            <button class="btn-filler btn btn-primary btn-save-bank"><i
                                                                    class="fa fa-search" aria-hidden="true"></i>
                                                                Lưu
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                      </div>
              </div><!-- col-sm-12-->
              	
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
  $('.btn-save-bank').on('click',function(){
    	bank_info_name = $('input[name="bank_info_name"]').val() ; 
      	bank_info_account_name = $('input[name="bank_info_account_name"]').val() ;
     	bank_info_account_number = $('input[name="bank_info_account_number"]').val() ;
    	bank_info_branch = $('input[name="bank_info_branch"]').val() ;
    	
    	$.ajax({
          url: '{{route('admin.wallet.editBank')}}' ,    
          type: 'POST',
          dataType:'json',
          data: {
          	  "_token": "{{ csrf_token() }}",
              'bank_info_name' : bank_info_name ,
              'bank_info_account_name' : bank_info_account_name , 
           	  'bank_info_account_number' : bank_info_account_number , 
           	  'bank_info_branch' : bank_info_branch ,  
          } ,
          success: function(data) {
              if(data.status == true){
                  toastr.success(data.message, 'Success!', {timeOut: 3500});
              }
              else{
                  toastr.error(data.message, 'Error!', {timeOut: 3500});
              }
          }
      });
  })
</script>
@endsection