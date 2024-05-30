<?php include_once "inc/checkers.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "component/style.php" ?>
</head>

<body>
    <div class="wrapper">

        <?php include_once "component/top-bar.php" ?>

        <?php include_once "component/sidebar.php" ?>

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Shared Documents</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="page-aside-left">
                                        <div class="btn-group d-block mb-2">
                                            <button type="button" class="btn btn-success dropdown-toggle w-100" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-plus"></i> Create New </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="upload-file.php"><i class="mdi mdi-upload me-1"></i>
                                                    Choose File</a>
                                            </div>
                                        </div>
                                        <div class="email-menu-list mt-3">
                                            <a href="file-manager.php" class="list-group-item border-0"><i class="mdi mdi-folder-outline font-18 align-middle me-2"></i>All
                                                Documents</a>
                                            <a href="upload-doc.php" class="list-group-item border-0"><i class="ri-file-upload-line font-18 align-middle me-2"></i>Uploaded
                                                Documents</a>
                                            <a href="pending.php" class="list-group-item border-0"><i class="ri-file-history-fill font-18 align-middle me-2"></i>Pending
                                                Document</a>
                                            <a href="approved.php" class="list-group-item border-0"><i class="ri-task-fill font-18 align-middle me-2"></i>Approved
                                                Documents</a>
                                            <a href="share.php" class="list-group-item border-0"><i class="mdi mdi-share-variant font-18 align-middle me-2"></i>Shared Documents</a>
                                            <a href="recent.php" class="list-group-item border-0"><i class="mdi mdi-clock-outline font-18 align-middle me-2"></i>Recent</a>
                                        </div>
                                    </div>
                                    <div class="page-aside-right">
                                        <div class="d-lg-flex justify-content-between align-items-center">
                                            <div class="app-search">
                                                <form>
                                                    <div class="mb-2 position-relative">
                                                        <input type="text" class="form-control" placeholder="Search files...">
                                                        <span class="mdi mdi-magnify search-icon"></span>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="">
                                                <a href="share.php">
                                                    <button class="btn btn-primary">
                                                        Back
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <h5 class="mb-2">Shared Documents</h5>
                                        </div>
                                        <div class="mt-3">
                                            <form method="post" name="myForm" id="myAwesomeDropzone" enctype="multipart/form-data">

                                                <input type="hidden" value="<?php echo base64_encode($user_id); ?>" name="encrypt">

                                                <div class="form-group mt-2">
                                                    <label>Select file to share</label>
                                                    <div class="form-group">
                                                        <select class="form-control form-select show-tick" id="dpt" name="cat">
                                                            <option value="0">Select File</option>
                                                            <?php
                                                            $sql = "select * from file_table";
                                                            $dpt = $app->fetch_query($sql);
                                                            foreach ($dpt as $cat) {
                                                            ?>
                                                                <option value="<?= $cat['id']; ?>"><?= $cat['file_name']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label>File Sharing Recipient Selection</label>
                                                    <div class="form-group">
                                                        <select class="form-control form-select show-tick" id="dpt" name="cat">
                                                            <option value="0">Select a User</option>
                                                            <?php
                                                            $sql = "select * from user";
                                                            $dpt = $app->fetch_query($sql);
                                                            foreach ($dpt as $cat) {
                                                            ?>
                                                                <option value="<?= $cat['id']; ?>"><?= $cat['full_name']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label for="additional-input">Additional Note</label>
                                                    <input type="text" class="form-control" name="file_name" id="file-name" placeholder="Please insert document name">
                                                </div>

                                                <button type="submit" class="btn btn-primary mt-2" id="reset-btn"><i class="ri-upload-2-fill me-2 fs-5"></i>Share</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once "component/footer.php" ?>
        </div>
    </div>
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/vendor/select2/js/select2.min.js"></script>
    <script src="assets/vendor/dropzone/min/dropzone.min.js"></script>
    <script src="assets/js/ui/component.fileupload.js"></script>
    <script>
        document.getElementById('filterInput').addEventListener('focus', function() {
            document.getElementById('filteredSelect').style.display = 'block';
        });

        document.getElementById('filterInput').addEventListener('input', function() {
            const filter = this.value.toLowerCase();
            const select = document.getElementById('filteredSelect');
            const options = select.options;

            for (let i = 0; i < options.length; i++) {
                const option = options[i];
                const text = option.text.toLowerCase();
                if (text.includes(filter)) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            }
        });

        document.getElementById('filteredSelect').addEventListener('change', function() {
            const selectedText = this.options[this.selectedIndex].text;
            document.getElementById('filterInput').value = selectedText;
            this.style.display = 'none';
        });

        document.addEventListener('click', function(event) {
            const filterInput = document.getElementById('filterInput');
            const filteredSelect = document.getElementById('filteredSelect');
            if (!filterInput.contains(event.target) && !filteredSelect.contains(event.target)) {
                filteredSelect.style.display = 'none';
            }
        });
    </script>

</body>

</html>