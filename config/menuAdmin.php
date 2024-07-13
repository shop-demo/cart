<?php
	
	return [
						//slides
						[
							'name'=>'Slides',
							'route'=>'admin.bannerList',
							'items'=>[
									['name'=>'Danh sách slide',
									 'route'=>'admin.bannerList',	
									],
									['name'=>'Thêm slide',
									 'route'=>'admin.bannerAdd',	
									]								

							]
						],
					
						
						[
							'name'=>'Category',
							'route'=>'admin.categoryList',
							'items'=>[
									['name'=>'Danh sách danh mục',
									 'route'=>'admin.categoryList',	
									],
									['name'=>'Thêm danh mục',
									 'route'=>'admin.categoryAdd',	
									]								

							]
						],
						//products
						[
							'name'=>'Product',
							'route'=>'admin.productList',
							'items'=>[
									['name'=>'Danh sách Sản phẩm',
									 'route'=>'admin.productList',	
									],
									['name'=>'Thêm Sản phẩm',
									 'route'=>'admin.productAdd',	
									]								

							]
						],
						
						[
							'name'=>'Customers',
							'route'=>'admin.customeList',
							'items'=>[
									['name'=>'list Customers',
									 'route'=>'admin.customeList',	
									],
									['name'=>'Add Customers',
									 'route'=>'admin.customeAdd',	
									]								

							]
						],

						//Role
						[
							'name'=>'Roles',
							'route'=>'admin.roleList',
							'items'=>[
									['name'=>'List Roles',
									 'route'=>'admin.roleList',	
									],
									['name'=>'Add Role',
									 'route'=>'admin.roleAdd',	
									]								

							]
						],
						//Tabs
						[
							'name'=>'Tabs',
							'route'=>'admin.tabsList',
							'items'=>[
									['name'=>'List Tabs',
									 'route'=>'admin.tabsList',	
									],
									['name'=>'Add Tabs',
									 'route'=>'admin.tabsAdd',	
									]								

							]
						],
						/*Cart-order*/
						[
							'name'=>'Cart',
							'route'=>'admin.orderList',
							'items'=>[
									['name'=>'List Order',
									 'route'=>'admin.orderList',	
									],
																

							]
						],

						/*Comment*/

						[
							'name'=>'Comment',
							'route'=>'admin.commentList',
							'items'=>[
									['name'=>'List Comment',
									 'route'=>'admin.commentList',	
									],
																

							]
						],
			
					/*about*/
					[
							'name'=>'About',
							'route'=>'admin.about',
							'items'=>[
									['name'=>'About',
									 'route'=>'admin.about',	
									],
																

							]
						],


			];//[menureturn]







?>