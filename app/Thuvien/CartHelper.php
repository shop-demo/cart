<?php
namespace App\Thuvien;
use App\Models\Admin\productsModel;
use Illuminate\Support\Facades\Session;

class CartHelper{

	public $items = [];
	public $total_quantity =0;
	public $total_price =0;

	public function __construct(){
		$this->items = session()->get('cart') ? session()->get('cart') : [];
		$this->total_quantity = $this->get_total_quantity();
		$this->total_price = $this->get_total_price();
	}

 		//add sản phẩm 
	public function addCart($sp,$quantity=1){

		$this->items = session()->get('cart') ? session()->get('cart') : [];

		if(isset($this->items[$sp->id])){
			$this->items[$sp->id]['qty'] += $quantity;
		}else{
			$this->items[$sp->id] = [

			'id'=>$sp->id,
			'name'=>$sp->name,
			'price'=>$sp->sale ? $sp->sale : $sp->price,
			'avatar'=>$sp->avatar,
			'qty'=>$quantity,
			
			];
		} 			
		session()->put('cart', $this->items);
	    return $this->items;
 			
	}


 		//remove 1 sp
	public function remove($id){

		if(isset($this->items[$id])){
			unset($this->items[$id]);
		}
		session(['cart'=>$this->items]);
		return $this->items;
	}

 		//update
	public function update($id,$quantity=1){
		// Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
		
		if(isset($this->items[$id])){
			// Cập nhật số lượng cho sản phẩm
			$this->items[$id]['qty'] = $quantity;
		}
		// Lưu thông tin giỏ hàng vào session
		session(['cart'=>$this->items]);
		
		// Trả về mảng các sản phẩm trong giỏ hàng sau khi cập nhật
		return $this->items;
	
	}

 	
 	//xóa hết sản phẩm
	public function clear_cart(){
		session(['cart'=>[]]);
		return session('cart');
	}


 	//tổng số tiền của 1 sản phẩm
	private function get_total_price(){
		$t = 0;
		foreach($this->items as $key=>$value){
			$t += $value['price'] * $value['qty'];
		}
		return $t;

	}

 		//tổng số sản phẩm
	private function get_total_quantity(){
		$t = 0;
		foreach($this->items as $key=>$quantity){
			$t += $quantity['qty'];
		}
		return $t;


	}


}


?>