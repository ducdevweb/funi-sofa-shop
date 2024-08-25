@extends('layout');
@section('tieude')
Thanh toán
@endsection
@section('noidung')
<form action="/payment" method="post" enctype="multipart/form-data">
	@csrf

<div class="untree_co-section">
		    <div class="container">
		      <div class="row">
		        <div class="col-md-6 mb-5 mb-md-0">
		          <h2 class="h3 mb-3 text-black">Chi tiết thanh toán</h2>
		          <div class="p-3 p-lg-5 border bg-white">
		            <div class="form-group row">
		              <div class="col-md-6">
		                <label for="c_fname" class="text-black">Tên <span class="text-danger">*</span></label>
		                <input required type="text" class="form-control" id="c_fname" name="last_name">
		              </div>
		              <div class="col-md-6">
		                <label for="c_lname" class="text-black">Họ <span class="text-danger">*</span></label>
		                <input required type="text" class="form-control" id="c_lname" name="first_name">
		              </div>
					  
		            </div>
					<div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_address" class="text-black">Số điện thoại <span class="text-danger">*</span></label>
		                <input required type="text" class="form-control" id="c_address" name="phone" placeholder="Số điện thoại người nhận">
		              </div>
		            </div>
		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_address" class="text-black">Địa chỉ <span class="text-danger">*</span></label>
		                <input required type="text" class="form-control" id="c_address" name="address" placeholder="Địa chỉ đường">
		              </div>
		            </div>

		            <div class="form-group mt-3">
					<label for="c_home" class="text-black">Số nhà hoặc căn hộ <span class="text-danger">*</span></label>
		              <input required type="text" class="form-control" name="home" placeholder="Căn hộ, suite, đơn vị vv. (tùy chọn)">
		            </div>

		            <div class="form-group row">
									<div class="col-md-6">
					<label for="province" class="text-black">Tỉnh/Thành phố <span class="text-danger">*</span></label>
					<select id="province" required name="province" class="form-control">
						<option value="">Chọn tỉnh/thành phố</option>
					</select>
				</div>

				<div class="col-md-6">
					<label for="district" class="text-black">Quận/Huyện <span class="text-danger">*</span></label>
					<select id="district" required name="district" class="form-control">
						<option value="">Chọn quận/huyện</option>
					</select>
				</div>

		            </div>

		           

		            <div class="form-group">
		              <label for="c_order_notes" class="text-black">Ghi chú đơn hàng</label>
		              <textarea name="note" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Ghi chú về đơn hàng của bạn, ví dụ như ghi chú giao hàng đặc biệt."></textarea>
		            </div>

		          </div>
		        </div>
		        <div class="col-md-6">
				@if (isset($check_out) && !empty($check_out))
				
					
						<div class="row mb-5">
							<div class="col-md-12">
								<h2 class="h3 mb-3 text-black">Đơn hàng của bạn</h2>
								<div class="p-3 p-lg-5 border bg-white">
									<table class="table site-block-order-table mb-5">
										<thead>
											<tr>
												<th>Sản phẩm</th>
												<th>Hình</th>
												<th>Giá</th>
												<th>Thành tiền</th>
												
											</tr>
										</thead>
										<tbody>
											@foreach ($check_out as $item)
												<tr>
													<td>				
													{{$item['ten_sp']}}<strong class="mx-2">x</strong>{{$item['soluong']}}
													<input type="hidden" name="items[{{$loop->index}}][ten_sp]" value="{{$item['ten_sp']}}">
													<input type="hidden" name="items[{{$loop->index}}][hinh]" value="{{$item['hinh']}}">
													<input type="hidden" name="items[{{$loop->index}}][gia_sp]" value="{{$item['gia_sp']}}">
													<input type="hidden" name="items[{{$loop->index}}][giaSale]" value="{{$item['giaSale']}}">
													<input type="hidden" name="items[{{$loop->index}}][soluong]" value="{{$item['soluong']}}">
													<input type="hidden" name="items[{{$loop->index}}][thanhtien]" value="{{$item['thanhtien']}}">
													<input type="hidden" name="items[{{$loop->index}}][id_sp]" value="{{$item['id_sp']}}">
													
													</td>
													<td><img src="{{$item['hinh']}}" alt="" width="30" height="30"></td>
													<td>@if($item['giaSale']<1)
														{{$item['gia_sp']}}
														@else
														{{$item['giaSale']}}
														@endif
													</td>
												
													<td>{{number_format($item['thanhtien'],0,",",".")}}</td>
												</tr>
											@endforeach
											<tr>
												<td class="text-black font-weight-bold"><strong>Tổng cộng</strong></td>
												<td class="text-black font-weight-bold">
													@if (isset($check_out) && !empty($check_out))
													<strong>{{number_format($tongtien,0,",",".")}}</strong>
													<input type="hidden" name="total_amount" value="{{$tongtien}}">		
													@else
													<strong>0</strong>																							
													@endif
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					
				@else
					<p>Chưa có sản phẩm nào được chọn</p>
				@endif

						<div class="border p-3 mb-3">
						<h3 class="h6 mb-0">
							<input type="radio" name="payment_method" id="bank_transfer" value="bank_transfer" required>
							<label for="bank_transfer">Chuyển khoản ngân hàng trực tiếp</label>
						</h3>

						<div class="collapse" id="collapsebank">
							<div class="py-2">
							<img src="/assets/images/momo.jpg" alt="" width="200" height="200">
							<p>Vui lòng gửi hình ảnh thanh toán vào đây</p>
							<input type="file" name="payment_image" id="payment_image" >
							</div>
						</div>
						</div>

						<div class="border p-3 mb-3">
						<h3 class="h6 mb-0">
							<input type="radio" name="payment_method" id="cheque" value="Thanh toán khi nhận hàng" required>
							<label for="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</label>
						</h3>
						</div>

						<script>
					document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
					radio.addEventListener('change', function() {
						if (this.value === 'bank_transfer') {
							document.getElementById('collapsebank').classList.add('show');
						} else {
							document.getElementById('collapsebank').classList.remove('show');
							document.getElementById('payment_image').value = ''; 
						}
					});
				});

				document.querySelector('form').addEventListener('submit', function(event) {
					const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
					if (!paymentMethod) {
						alert('Vui lòng chọn phương thức thanh toán.');
						event.preventDefault(); 
						return;
					}

					if (paymentMethod.value === 'bank_transfer') {
						const paymentImage = document.getElementById('payment_image').files.length;
						if (paymentImage === 0) {
							alert('Vui lòng gửi hình ảnh thanh toán.');
							event.preventDefault(); 
						}
					}
				});

					</script>

		                <div class="form-group">
		                  <button class="btn btn-primary btn-lg py-3 btn-block" type="sunbmit">Đặt hàng</button>
		                </div>

		              </div>
		            </div>
		          </div>

		        </div>
		      </div>
		   
		    </div>
		  </div>
		  </form>
		  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const provinceSelect = document.getElementById('province');
        const districtSelect = document.getElementById('district');
        axios.get('https://provinces.open-api.vn/api/p/')
            .then(function (response) {
                const provinces = response.data;
                provinces.forEach(function (province) {
                    const option = document.createElement('option');
                    option.value = province.code;
                    option.text = province.name;
                    provinceSelect.add(option);
                });
            });

        provinceSelect.addEventListener('change', function () {
            const provinceCode = this.value;
            districtSelect.innerHTML = '<option value="">Chọn quận/huyện</option>'; 

            if (provinceCode) {
                axios.get(`https://provinces.open-api.vn/api/p/${provinceCode}?depth=2`)
                    .then(function (response) {
                        const districts = response.data.districts;
                        districts.forEach(function (district) {
                            const option = document.createElement('option');
                            option.value = district.code;
                            option.text = district.name;
                            districtSelect.add(option);
                        });
                    });
            }
        });
    });
</script>
</form>
@endsection
