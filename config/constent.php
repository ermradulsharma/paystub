<?php

// ======================================== Super Admin Account ================================================
defined('SUPER_ADMIN_EMAIL') or define('SUPER_ADMIN_EMAIL', 'possibiltysolutions@gmail.com');
defined('SUPER_ADMIN_USERNAME') or define('SUPER_ADMIN_USERNAME', 'possibilitysolutions');
defined('SUPER_ADMIN_FIRST_NAME') or define('SUPER_ADMIN_FIRST_NAME', 'Possibility');
defined('SUPER_ADMIN_LAST_NAME') or define('SUPER_ADMIN_LAST_NAME', 'Solutions');

// ======================================== Admin Account ======================================================
defined('ADMIN_EMAIL') or define('ADMIN_EMAIL', 'admin@admin.com');
defined('ADMIN_USERNAME') or define('ADMIN_USERNAME', 'admin');
defined('ADMIN_FIRST_NAME') or define('ADMIN_FIRST_NAME', 'Admin');
defined('ADMIN_LAST_NAME') or define('ADMIN_LAST_NAME', 'Account');

// ======================================== Developer Account ==================================================
defined('DEVELOPER_EMAIL') or define('DEVELOPER_EMAIL', 'developers@admin.com');
defined('DEVELOPER_USERNAME') or define('DEVELOPER_USERNAME', 'developers');
defined('DEVELOPER_FIRST_NAME') or define('DEVELOPER_FIRST_NAME', 'Developer');
defined('DEVELOPER_LAST_NAME') or define('DEVELOPER_LAST_NAME', 'Account');

// ======================================== App Details ========================================================
defined('APP_NAME') or define('APP_NAME', 'Paystub X');
defined('APP_URL') or define('APP_URL', 'http://www.paystubx.com');
defined('MAIL_FROM_EMAIL') or define('MAIL_FROM_EMAIL', 'noreply@paystubx.com');

define('IMAGE_UPLOAD_PATH', 'public/');
define('STORAGE_UPLOAD_PATH', storage_path('public/'));

defined('STATUS_OK') or define('STATUS_OK', 200);
defined('STATUS_CREATED') or define('STATUS_CREATED', 201);
defined('STATUS_BAD_REQUEST') or define('STATUS_BAD_REQUEST', 400);
defined('STATUS_UNAUTHORIZED') or define('STATUS_UNAUTHORIZED', 401);
defined('STATUS_FORBIDDEN') or define('STATUS_FORBIDDEN', 403);
defined('STATUS_NOT_FOUND') or define('STATUS_NOT_FOUND', 404);
defined('STATUS_METHOD_NOT_ALLOWED') or define('STATUS_METHOD_NOT_ALLOWED', 405);
defined('STATUS_ALREADY_EXIST') or define('STATUS_ALREADY_EXIST', 409);
defined('UNPROCESSABLE_ENTITY') or define('UNPROCESSABLE_ENTITY', 422);
defined('STATUS_GENERAL_ERROR') or define('STATUS_GENERAL_ERROR', 500);
defined('DEFAULT_ERROR_MESSAGE') or define('DEFAULT_ERROR_MESSAGE', 'Oops! some error occured, please try again');

defined('ACCOUNT_DEACTIVATED_SUCCESSFULLY') or define('ACCOUNT_DEACTIVATED_SUCCESSFULLY', 'Account deactivated successfully');
defined('ACCOUNT_RESTORE_SUCCESSFULLY') or define('ACCOUNT_RESTORE_SUCCESSFULLY', 'Your Account restore successfully');
defined('ACCOUNT_DELETED_SUCCESSFULLY') or define('ACCOUNT_DELETED_SUCCESSFULLY', 'Your Account delete successfully');
defined('ENTER_VALID_CREDENTIAL') or define('ENTER_VALID_CREDENTIAL', 'Please enter valid credentials.');
defined('WRONG_PASSWORD') or define('WRONG_PASSWORD', 'Oops! you have entered wrong current password. Please try again.');
