<?php

//fetcher from the staff table
$staff_details_sql = "select * from user";
// ----------------------------------------------------------------
//fetcher from the account table
$account_list_sql = "SELECT * FROM user";
// ----------------------------------------------------------------
// fetch categories
$categories_sql = "SELECT * FROM category c JOIN user u ON c.company_id = u.company_id";
// ----------------------------------------------------------------
// fetch pending-doc
$s_sql = "SELECT f.id, f.file_name, f.date_time, u.full_name, c.category_name, f.file_path FROM file_table f JOIN user u ON f.user_id = u.user_id JOIN category c ON f.category = c.id  WHERE f.status = FALSE";
// ----------------------------------------------------------------
// fetch approved doc
$app_sql = "SELECT f.id, f.file_name, f.date_time, u.full_name, c.category_name, f.file_path FROM file_table f JOIN user u ON f.user_id = u.user_id JOIN category c ON f.category = c.id  WHERE f.status = TRUE";
// ----------------------------------------------------------------
// fetch approved doc
$file_sql = "SELECT f.id, f.file_name, f.date_time, u.full_name, f.status, c.category_name, f.file_path FROM file_table f JOIN user u ON f.user_id = u.user_id JOIN category c ON f.category = c.id ORDER BY f.id DESC";
// ----------------------------------------------------------------
// fetch approved doc
$dash_sql = "SELECT * FROM file_table";
// ----------------------------------------------------------------
