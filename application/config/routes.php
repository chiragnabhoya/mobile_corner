<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//in build 
$route['default_controller'] = 'Pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//visitor side
$route['home']="Pages/index";
$route['about-us']="Pages/about";
$route['contact-us']="Pages/contact";
$route['faqs']="Pages/faqs";
$route['feedback']="Pages/feedback";
$route['forget-password']="Pages/fpassword";
$route['login']="Pages/login";
$route['privacy-policy']="Pages/privacy_policy";
$route['product-detail']="Pages/product_detail";
$route['product-detail/(:num)']="Pages/product_detail/$2";
$route['product-list']="Pages/product_list";
$route['product-list/(:any)/(:any)']="Pages/product_list/$2/$3";
$route['register']="Pages/register";
$route['return-policy']="Pages/r_policy";
$route['terms-and-condition']="Pages/t_c";
$route['view-cart']="Pages/view_cart";
$route['checkout']="Pages/checkout";
$route['success']="Pages/success";


//admin side
$route['admin-dashboard']="Authorize/dashboard";
$route['admin-authentication']="Authorize/index";
$route['admin-authentication/(:num)']="Authorize/index/$2";
$route['admin-forget-password']="Authorize/forget_password";
$route['admin-logout']="Authorize/logout";
$route['manage-main-category']="Authorize/main";
$route['edit-main-category/(:any)']="edit/maincategory/$2";
$route['manage-banner']="Authorize/banner";
$route['manage-city']="Authorize/city";
$route['edit-city/(:any)']="edit/city/$2";
$route['edit-peta/(:any)']="edit/peta/$2";
$route['manage-commission']="Authorize/commission";
$route['manage-contact-us']="Authorize/contact";
$route['manage-country']="Authorize/country";
$route['edit-country/(:any)']="edit/country/$2";
$route['manage-email-subscriber']="Authorize/email";
$route['manage-feedback']="Authorize/feedback";
$route['manage-member']="Authorize/member";
$route['manage-offer']="Authorize/offer";
$route['manage-product-detail']="Authorize/p_detail";
$route['manage-product-review']="Authorize/p_review";
$route['manage-promocode']="Authorize/promocode";
$route['manage-seller']="Authorize/seller";
$route['manage-state']="Authorize/state";
$route['edit-state/(:any)']="edit/state/$2";
$route['manage-peta-category']="Authorize/peta";
$route['admin-setting']="Authorize/setting";
$route['manage-sub-category']="Authorize/sub";
$route['edit-sub/(:any)']="edit/subcategory/$2";
$route['manage-profit-rate']="Authorize/profit_rate";
$route['delete/(:any)/(:any)']="Authorize/delete/$2/$3";
$route['manage-view-bill']="Authorize/manage_view_bill";
$route['manage-view-transaction']="Authorize/manage_view_transaction";

//seller side
$route['seller-register-1']="Seller/index";
$route['seller-register-2']="Seller/seller_register_2";
$route['seller-register-3']="Seller/seller_register_3";
$route['seller-register-4']="Seller/seller_register_4";

//seller admin
$route['seller-dashboard']="Seller/seller_dashboard";
$route['seller-logout']="Seller/seller_logout";
$route['seller-profile']="Seller/seller_profile";
$route['seller-update-profile']="Seller/seller_update_profile";
$route['seller-add-new-product']="Seller/seller_add_new_product";
$route['seller-view-all-product']="Seller/seller_view_all_product";
$route['seller-setting']="Seller/seller_setting";

//member side
$route['member-dashboard']="Member/member_dashboard";
$route['member-logout']="Member/member_logout";
$route['member-profile']="Member/member_profile";
$route['member-update-profile']="Member/member_update_profile";
$route['member-address']="Member/member_address";
$route['member-wishlist']="Member/member_wishlist";
$route['member-review']="Member/member_review";
$route['member-change-password']="Member/member_change_password";
$route['member-view-bill']="Member/member_view_bill";
$route['member-view-order']="Member/member_view_order";