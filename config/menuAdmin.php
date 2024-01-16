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

			
					



			];//[menureturn]







?>