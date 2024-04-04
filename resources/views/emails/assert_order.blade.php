<h1 style="margin: 10px auto; text-align: center; font-weight:900; font-family: roboto;">Thông tin đặt hàng thành công của bạn </h1>
		<h1 style="font-family: roboto; padding:15px; margin-top:50px;">Cám ơn bạn đã xác nhận đơn hàng của mình</h1>

		<div>
				 
							<h2>Tên:{{$name}} </h3>
							<h2>Email: {{$email}}</h3>
							<h2>Phone: {{$donhang->mobile}}</h3>
							<h2>Địa chỉ: {{$donhang->address}}</h3>
							<h2>Ngày đặt: {{$donhang->created_at}}</h3>		
				
		</div>

		<div style="width:100%;height:auto">
				<table style="width:100%; height:auto; border-collapse: collapse; border: 1px solid;">
					<thead>
						<tr style="border: 1px solid; padding: 15px; background-color:#ddd;;">
							<td style="border: 1px solid; padding: 8px;">STT</td>
							<td style="border: 1px solid; padding: 8px;">Item</td>
							<td style="border: 1px solid; padding: 8px;">Tên sản phẩm</td>
							<td style="border: 1px solid; padding: 8px;">Giá</td>
							<td style="border: 1px solid; padding: 8px;">Số lượng</td>
							<td style="border: 1px solid; padding: 8px;">Thành tiền</td>
							
						</tr>
					</thead>
					<tbody>
					@php $n = 1;@endphp
					@foreach($order_detail as $key=>$cart)
						<tr style="border: 1px solid; padding: 8px;">
							<td style="border: 1px solid; padding: 8px;">{{$n}}</td>
							<td style="border: 1px solid; padding: 8px;">
								<a href=""><img src="{{-- url('access')}}/images/home/{{$cart['hình_minh_hoa']--}}" alt="" style="width:70%; height:auto;" ></a>
							</td>
							<td style="border: 1px solid; padding: 8px;">
								<h4>{{$cart['name']}}</h4>
								<p>Web ID: 1089772</p>
							</td>
							<td style="border: 1px solid; padding: 8px;">
								<h4>{{number_format($cart['price'])}}</h4>
							</td>
							<td style="border: 1px solid; padding: 8px;">
								<h4>{{$cart['quantity']}}</h4>
							</td>
							<td style="border: 1px solid; padding: 8px;">
								<h4>{{number_format($cart['price']*$cart['quantity'])}}</h4>
							</td>
							
						</tr>
					@endforeach
					@php $n++;@endphp
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									
									<tr>
										<td>Tổng tiền</td>
										<td><h1>{{number_format($donhang->thanh_tien)}}</h1></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>