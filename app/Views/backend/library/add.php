<?= $this->extend('backend/layouts/main') ?>


<?= $this->section('content') ?>
<div class="row clearfix">
    <div class="col-12">
        <form method="POST" action="" id="form-dang-tin">
            <?= csrf_field() ?>

            <section class="card card-fluid">
                <h5 class="card-header">
                    <div class="d-inline-block w-100">
                        <button type="submit" name="dangtin" class="btn btn-sm btn-primary float-right">Save</button>
                    </div>
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group row">
                                <b class="col-12 col-lg-2 col-form-label">Tiêu đề:<i class="text-danger">*</i></b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <input class="form-control form-control-sm" type='text' name="title_vi" required="" placeholder="Tiêu đề" />
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-12">
                                    <section class="card card-fluid">
                                        <h5 class="card-header drag-handle">
                                            <a class="btn btn-success btn-sm text-white multiple_image">Thêm</a>
                                        </h5>
                                        <div class="card-body">
                                            <table id="quanlyimage" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <tH>Hình ảnh</tH>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <div class="col-12 pt-1">
                                    <div class="card">
                                        <div class="card-header">
                                            Ảnh đại diện
                                        </div>
                                        <div class="card-body">
                                            <div class="image_ft text-center"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
</div>

<?= $this->endSection() ?>

<!-- Style --->
<?= $this->section("style") ?>

<link rel="stylesheet" href="<?= base_url("assets/lib/datatables/datatables.min.css") ?> " ?>
<?= $this->endSection() ?>

<!-- Script --->
<?= $this->section('script') ?>

<script src="<?= base_url('assets/lib/datatables/datatables.min.js') ?>"></script>
<script src="<?= base_url('assets/lib/datatables/jquery.highlight.js') ?>"></script>

<script src="<?= base_url("assets/lib/mustache/mustache.min.js") ?>"></script>
<script src="<?= base_url("assets/lib/image_feature/jquery.image.js") ?>"></script>

<!--<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>-->
<script src="<?= base_url("assets/lib/ckfinder/ckfinder.js") ?>"></script>
<script src="<?= base_url("assets/lib/ckeditor/ckeditor.js") ?>"></script>
<script type='text/javascript'>
    var allEditors = document.querySelectorAll('.edit');
    for (var i = 0; i < allEditors.length; ++i) {
        CKEDITOR.replace(allEditors[i]);
        //ClassicEditor.create(allEditors[i]);
    }
    $(document).ready(function() {
        $('#quanlyimage').DataTable({
            "lengthMenu": [
                [-1],
                ["All"]
            ],
            "columns": [{
                    "data": "image"
                },
                {
                    "data": "action"
                }
            ]
        })
        $(".multiple_image").imageFeature({
            multiple: true,
            id: 'multi'
        }).on("done", function(event, ...data) {
            for (let i = 0; i < data.length; i++) {
                row = [];
                row['image'] = '<img src="' + data[i] + '" width="200"/>';
                row['src'] = data[i];
                row['action'] = '<a href="#" class="btn btn-danger btn-sm image_remove"><i class="far fa-trash-alt"></i></a>';

                $('#quanlyimage').dataTable().fnAddData(row);
            }
        });

        $(document).on("click", ".image_remove", function() {
            let parent = $(this).parents("tr").get(0);
            $('#quanlyimage').dataTable().fnDeleteRow($('#quanlyimage').dataTable().fnGetPosition(parent));
        })
        $(".image_ft").imageFeature();
        //$('.edit').froalaEditor({
        //    heightMin: 200,
        //    heightMax: 500, // Set the image upload URL.
        //    imageUploadURL: '<?= base_url() ?>admin/uploadimage',
        //    // Set request type.
        //    imageUploadMethod: 'POST',
        //    // Set max image size to 5MB.
        //    imageMaxSize: 5 * 1024 * 1024,
        //    // Allow to upload PNG and JPG.
        //    imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif'],
        //    htmlRemoveTags: [],
        //});
        $.validator.setDefaults({
            debug: true,
            success: "valid"
        });
        $("#form-dang-tin").validate({
            highlight: function(input) {
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function(input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function(error, element) {
                $(element).parents('.form-group').append(error);
            },
            submitHandler: function(form) {
                let data_file = $('#quanlyimage').dataTable().fnGetData();
                append = "";
                for (let i = 0; i < data_file.length; i++) {
                    let file = data_file[i].src;
                    append += "<input type='hidden' name='files[]' value='" + file + "' />";
                }
                $(form).append(append);
                form.submit();
                return false;
            }
        });
    });
</script>

<?= $this->endSection() ?>