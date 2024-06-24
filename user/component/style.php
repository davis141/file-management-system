<meta charset="utf-8" />
<title>FileTrax</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="FileTrax is a secure file management tool that helps organizations manage and share files, perform document approval workflows, and keep company records organized in one centralized platform." name="description" />
<meta content="Jeréclat FileTrax" name="author" />
<link rel="shortcut icon" href="assets/images/logo-black.png">
<link rel="stylesheet" href="assets/vendor/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">
<script src="assets/js/hyper-config.js"></script>
<link href="assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<style>
  .disabled{
    color: red!important; 
    pointer-events: none;
  }
  .select-container {
    position: relative;
    display: inline-block;
    width: 100%;
  }
  .select-container input,
  .select-container select {
    width: 100%;
  }
  .select-container select {
    display: none;
    height: auto;
  }
  .file-upload {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            display: inline-block;
            width: 100%;
        }
        .file-upload:hover {
            background-color: #f9f9f9;
        }
        .preview-container {
            margin-top: 20px;
            display: none;
        }
        .preview {
            border: 1px solid #ccc;
            padding: 10px;
            display: flex;
            align-items: center;
        }
        .preview img {
            max-width: 50px;
            margin-right: 10px;
        }
</style>