<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Language Lines
    |--------------------------------------------------------------------------
    |
    | Every user facing string of the pharmacy management UI lives here, so the
    | interface can be rendered in any of the locales listed in
    | config('app.available_locales'). Keep this file and resources/lang/ar/app.php
    | in sync: a key added here must be added there as well.
    |
    */

    'language' => 'Language',

    'common' => [
        'action' => 'Action',
        'actions' => 'Actions',
        'add_new' => 'Add New',
        'address' => 'Address',
        'back' => 'Back',
        'cancel' => 'Cancel',
        'category' => 'Category',
        'company' => 'Company',
        'confirm_password' => 'Confirm Password',
        'created_date' => 'Created date',
        'dashboard' => 'Dashboard',
        'date' => 'Date',
        'delete' => 'Delete',
        'description' => 'Description',
        'descriptions' => 'Descriptions',
        'discount' => 'Discount',
        'discount_percent' => 'Discount (%)',
        'edit' => 'Edit',
        'email' => 'Email',
        'expire' => 'Expire',
        'expire_date' => 'Expire Date',
        'expiry_date' => 'Expiry Date',
        'from' => 'From',
        'full_name' => 'Full Name',
        'medicine' => 'Medicine',
        'name' => 'Name',
        'new_password' => 'New Password',
        'old_password' => 'Old Password',
        'password' => 'Password',
        'phone' => 'Phone',
        'picture' => 'Picture',
        'price' => 'Price',
        'product' => 'Product',
        'quantity' => 'Quantity',
        'role' => 'Role',
        'save_changes' => 'Save Changes',
        'select_an_option' => 'Select an option',
        'submit' => 'Submit',
        'supplier' => 'Supplier',
        'to' => 'To',
        'total_price' => 'Total Price',
        'unit_price' => 'Unit Price',
        'update_changes' => 'Update Changes',
        'yes' => 'Yes',
    ],

    'card' => [
        'maximize' => 'maximize',
        'restore' => 'Restore',
        'collapse' => 'collapse',
        'expand' => 'expand',
        'reload' => 'reload',
        'remove' => 'remove',
    ],

    'entity' => [
        'category' => 'Category',
        'expired_product' => 'Expired Product',
        'outstock_product' => 'Out-Stock Product',
        'permission' => 'Permission',
        'product' => 'Product',
        'product_sale' => 'Product Sale',
        'purchase' => 'Purchase',
        'role' => 'Role',
        'supplier' => 'Supplier',
        'user' => 'User',
    ],

    'nav' => [
        'dashboard' => 'Dashboard',
        'categories' => 'Categories',
        'medicine' => 'Medicine',
        'medicines' => 'Medicines',
        'add_medicine' => 'Add Medicine',
        'out_stock' => 'Out-Stock',
        'expired' => 'Expired',
        'stock' => 'Stock',
        'stock_purchase' => 'Stock Purchase',
        'add_stock' => 'Add Stock',
        'sales' => 'Sales',
        'supplier' => 'Supplier',
        'add_supplier' => 'Add Supplier',
        'reports' => 'Reports',
        'access_control' => 'Access Control',
        'permissions' => 'Permissions',
        'roles' => 'Roles',
        'users' => 'Users',
        'settings' => 'Settings',
    ],

    'header' => [
        'notifications' => 'Notifications',
        'mark_all_as_read' => 'mark all as read',
        'clear_all' => 'clear all',
        'stock_alert' => 'Stock Alert',
        'out_of_stock_notice' => 'is out of stock, :quantity left in quantity.',
        'no_message' => 'No Message',
        'show_all' => 'show all',
        'profile' => 'Profile',
        'logout' => 'Logout',
        'toggle_menu' => 'Toggle navigation menu',
        'toggle_account_menu' => 'Toggle account menu',
    ],

    'alerts' => [
        'error_title' => 'Oh Nooo!! 😢',
        'success_title' => 'Oh Yess! 👍',
        'message_title' => 'Message !',
        'snap_title' => 'Oh snap!',
        'close' => 'Close',
    ],

    'delete_modal' => [
        'title' => 'Delete :entity',
        'confirm' => 'Are you sure you want to delete ?',
    ],

    'auth' => [
        'signin' => 'Signin',
        'save_credentials' => 'Save credentials.',
        'forgot_password' => 'Forgot password?',
        'reset' => 'Reset',
        'back_to_sign_in' => 'Back to sign in',
    ],

    'dashboard' => [
        'welcome' => 'Welcome :name!',
        'today_sales_cash' => 'Today Sales Cash',
        'product_categories' => 'Product Categories',
        'expired_products' => 'Expired Products',
        'system_users' => 'System Users',
        'today_sales' => 'Today Sales',
        'todays_sales' => "Today's Sales",
        'resources_sum' => 'Resources Sum',
        'yesterday_sales' => 'Yesterday Sales',
        'last_seven_days' => 'Last 7 Days',
        'revenue' => 'Revenue',
        'suppliers' => 'Suppliers',
        'expired_medicines' => 'Expired Medicines',
        'users' => 'Users',
        'all_categories' => 'All Categories',
        'total_medicines' => 'Total Medicines',
        'total_medicines_hint' => 'Total number of medicines in the pharmacy.',
        'available' => 'Available',
        'running_out' => 'Running Out',
        'out_stock' => 'Out Stock',
    ],

    'categories' => [
        'title' => 'Category',
        'heading' => 'Categories',
        'add' => 'Add Category',
        'edit' => 'Edit Category',
    ],

    'products' => [
        'title' => 'Medicines',
        'add' => 'Add Medicine',
        'edit' => 'Edit Medicine',
        'name' => 'Medicine Name',
        'brand_name' => 'Brand Name',
        'selling_price' => 'Selling Price',
        'image' => 'Medicine Image',
        'image_alt' => 'Medicine image',
        'expired_badge' => 'THE PRODUCT IS EXPIRED',
        'outstock_title' => 'Out-Stock Medicines',
        'expired_title' => 'Expired Medicines',
    ],

    'purchases' => [
        'title' => 'Purchase Stocks',
        'add' => 'Add Stock',
        'edit' => 'Edit Purchase Stock',
        'medicine_category' => 'Medicine Category',
        'purchase_price' => 'Purchase Price',
        'cost_price' => 'Cost Price',
    ],

    'sales' => [
        'title' => 'Add Sales',
        'added' => 'Added Sales',
        'add_one' => 'Add Sale',
        'select_product' => 'Select Product',
        'out_of_stock' => 'Out of Stock',
    ],

    'suppliers' => [
        'title' => 'Suppliers',
        'add' => 'Add Supplier',
        'edit' => 'Edit Supplier',
    ],

    'users' => [
        'title' => 'Users',
        'heading' => 'User',
        'add' => 'Add User',
        'edit' => 'Edit User',
        'picture' => 'User Picture',
        'avatar' => 'User Avatar',
    ],

    'profile' => [
        'title' => 'Profile',
        'timezone' => 'TimeZone',
        'current_date_time' => 'Current Date and Time',
        'about' => 'About',
        'personal_details' => 'Personal Details',
        'email_id' => 'Email ID',
        'user_role' => 'User Role',
        'super_admin' => 'Super Admin',
        'change_password' => 'Change Password',
    ],

    'roles' => [
        'title' => 'Roles',
        'add' => 'Add Role',
        'edit' => 'Edit Role',
        'permissions' => 'Permissions',
        'select_permissions' => 'Select Permissions',
    ],

    'permissions' => [
        'title' => 'Permissions',
        'singular' => 'Permission',
        'add' => 'Add Permission',
        'edit' => 'Edit Permission',
    ],

    'reports' => [
        'title' => 'Reports',
        'generate' => 'Generate Report',
        'generate_heading' => 'Generate Reports',
        'for_resource' => ':resource Reports',
        'total_revenue' => 'Total Revenue',
        'total_sales' => 'Total Sales',
        'resource' => 'Resource',
        'search' => 'Search Report',
        'resources' => [
            'products' => 'Medicines',
            'purchases' => 'Stocks',
            'sales' => 'Sales',
        ],
    ],

    'settings' => [
        'title' => 'App General Settings',
        'breadcrumb' => 'General Settings',
        'page_title' => 'App Settings',
    ],

    'backups' => [
        'title' => 'Backups',
        'breadcrumb' => 'App Backups',
        'create' => 'Create Backup',
        'id' => 'ID',
        'disk' => 'Disk',
        'date' => 'Backup Date',
        'file_size' => 'File Size',
        'download' => 'download backup',
        'delete' => 'delete backup',
    ],

    'messages' => [
        'generic_error' => 'Oops!! Something went wrong, please check and try again',
        'category_added' => 'Category has been added',
        'category_updated' => 'Category has been updated',
        'category_deleted' => 'Category has been deleted',
        'medicine_added' => 'Medicine added successfully!',
        'medicine_updated' => 'Medicine updated successfully!',
        'product_deleted' => 'Product has been deleted',
        'medicine_sold' => 'Medicine sold successfully!',
        'medicine_running_out' => 'Medicine is running out of stock!',
        'quantity_exceeds_stock' => 'The requested quantity is greater than the available quantity. Available quantity is :quantity',
        'sales_deleted' => 'Sales has been deleted',
        'stock_added' => ':name added successfully!',
        'stock_updated' => ':name updated successfully!',
        'purchase_deleted' => 'Purchase has been deleted',
        'supplier_added' => 'Supplier has been added',
        'supplier_updated' => 'Supplier has been updated',
        'supplier_deleted' => 'Supplier has been deleted',
        'user_added' => 'User has been added!',
        'user_updated' => 'User has been updated!',
        'user_deleted' => 'User has been deleted',
        'profile_updated' => 'User profile has been updated!',
        'password_updated' => 'User password updated successfully!',
        'old_password_mismatch' => 'Old password does not match!',
        'super_admin_undeletable' => 'Super admin cannot be deleted',
        'role_created' => 'Role created successfully!',
        'role_updated' => 'Role updated successfully!',
        'role_deleted' => 'Role deleted successfully!',
        'permission_created' => 'Permission created successfully!',
        'permission_updated' => 'Permission updated successfully!',
        'permission_deleted' => 'Permission has been deleted',
        'notifications_marked_read' => 'Notifications marked as read',
        'notification_marked_read' => 'Notification marked as read',
        'notification_deleted' => 'Notification has been deleted',
    ],

];
