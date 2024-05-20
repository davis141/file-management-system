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
                                            <form action="/" method="post" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                                <div class="dropzone">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />
                                                    </div>
                                                    <div class="dz-message needsclick">
                                                        <i class="h1 text-muted ri-upload-cloud-2-line"></i>
                                                        <h3>Drop files here or click to upload.</h3>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-2">
                                                    <label for="" class="mb-1 fw-bold">Addiitional Note</label>
                                                    <textarea name="" id="" cols="20" rows="2" class="form-control"></textarea>
                                                </div>
                                                <div class="mt-2">
                                                    <label for="" class="mb-1">Receiver</label>
                                                    <div class="select-container">
                                                        <input type="text" id="filterInput" class="form-control mb-2" placeholder="Type to search...">
                                                        <select id="filteredSelect" class="form-control " size="5">
                                                            <option value="Apple">Apple</option>
                                                            <option value="Banana">Banana</option>
                                                            <option value="Cherry">Cherry</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <input type="submit" value="Send File" class="btn btn-primary">
                                                </div>
                                            </form>
                                            <div class="dropzone-previews mt-3" id="file-previews"></div>
                                            <div class="d-none" id="uploadPreviewTemplate">
                                                <div class="card mt-1 mb-0 shadow-none border">
                                                    <div class="p-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                                            </div>
                                                            <div class="col ps-0">
                                                                <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                                                <p class="mb-0" data-dz-size></p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                                    <i class="ri-close-line"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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