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
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <b class="col-12 col-lg-2 col-form-label">Mã:<i class="text-danger">*</i></b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <input class="form-control form-control-sm" type="text" name="code" required="" placeholder="Mã hàng" aria-required="true">
                                </div>
                                <b class="col-12 col-lg-2 col-form-label">Giá bán:<i class="text-danger">*</i></b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <input class="form-control form-control-sm price" type="text" name="price" required="" placeholder="Giá bán" im-insert="true" aria-required="true">
                                </div>
                            </div>
                            <div class="form-group row">
                                <b class="col-12 col-lg-2 col-form-label">SEO URL:</b>
                                <div class="col-12 col-lg-10 pt-1">
                                    <input class="form-control form-control-sm" type="text" name="slug">
                                </div>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#menu0">Tiếng Việt</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu1">Tiếng Anh</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu2">Tiếng Nhật</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu4">Hình ảnh khác</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="menu0" class="tab-pane active">
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Tên:<i class="text-danger">*</i></b>
                                        <div class="col-12 col-lg-4 pt-1">
                                            <input class="form-control form-control-sm" type='text' name="name_vi" required="" placeholder="Tiếng Việt" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Thông tin:<i class="text-danger">*</i></b>
                                        <div class="col-12">
                                            <textarea class="edit" name="element_vi"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Mô tả:<i class="text-danger">*</i></b>
                                        <div class="col-12">
                                            <textarea class="edit" name="description_vi"></textarea>
                                        </div>
                                    </div>




                                </div>
                                <div id="menu1" class=" tab-pane fade">
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Tên:<i class="text-danger">*</i></b>
                                        <div class="col-12 col-lg-4 pt-1">
                                            <input class="form-control form-control-sm" type='text' name="name_en" placeholder="Tiếng Anh" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Thông tin:<i class="text-danger">*</i></b>
                                        <div class="col-12">
                                            <textarea class="edit" name="element_en"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Mô tả:<i class="text-danger">*</i></b>
                                        <div class="col-12">
                                            <textarea class="edit" name="description_en"></textarea>
                                        </div>
                                    </div>


                                </div>
                                <div id="menu2" class=" tab-pane fade">
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Tên:<i class="text-danger">*</i></b>
                                        <div class="col-12 col-lg-4 pt-1">
                                            <input class="form-control form-control-sm" type='text' name="name_jp" placeholder="Tiếng nhật" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Thông tin:<i class="text-danger">*</i></b>
                                        <div class="col-12">
                                            <textarea class="edit" name="element_jp"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Mô tả:<i class="text-danger">*</i></b>
                                        <div class="col-12">
                                            <textarea class="edit" name="description_jp"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div id="menu4" class=" tab-pane fade">
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
                            <div class="form-group row">
                                <div class="col-12 pt-1">
                                    <div class="card">
                                        <div class="card-header">
                                            Danh mục
                                        </div>
                                        <div class="card-body">
                                            <?php foreach ($category as $row) : ?>
                                                <div class="col-12">
                                                    <div class="custom-checkbox custom-control">
                                                        <input name="category_list[]" type="checkbox" id="eCheckbox<?= $row->id ?>" class="custom-control-input" value="<?= $row->id ?>">
                                                        <label class="custom-control-label" for="eCheckbox<?= $row->id ?>"><?= $row->name_vi ?></label>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 pt-1">
                                    <div class="card">
                                        <div class="card-header">
                                            Menu
                                        </div>
                                        <div class="card-body">
                                            <?php foreach ($menu as $row) : ?>
                                                <div class="col-12">
                                                    <div class="custom-checkbox custom-control">
                                                        <input name="category_list[]" type="checkbox" id="eCheckbox<?= $row->id ?>" class="custom-control-input" value="<?= $row->id ?>">
                                                        <label class="custom-control-label" for="eCheckbox<?= $row->id ?>"><?= $row->name_vi ?></label>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">

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
<script src="<?= base_url("assets/lib/ckeditor/ckeditor.js") ?>"></script>
<script type='text/javascript'>
    var tin = <?= json_encode($tin) ?>;
    fillForm($("#form-dang-tin"), tin);
    var allEditors = document.querySelectorAll('.edit');
    for (var i = 0; i < allEditors.length; ++i) {
        CKEDITOR.replace(allEditors[i]);
    }
    $(document).ready(function() {
        $(".image_ft").imageFeature();
        $(".multiple_image").imageFeature({
            multiple: true,
            id: 'multi'
        }).on("done", function(event, ...data) {
            for (let i = 0; i < data.length; i++) {
                let row = data[i];
                row['image'] = '<img src="' + row['image'] + '" width="200"/>';

                row['action'] = '<a href="#" class="btn btn-danger btn-sm image_remove" data-id="' + row['image_id'] + '"><i class="far fa-trash-alt"></i></a>';

                $('#quanlyimage').dataTable().fnAddData(row);
            }
        });
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

        if (tin.image_other) {
            for (let i = 0; i < tin.image_other.length; i++) {
                let row = tin.image_other[i];
                let src = row['type'] == 2 ? row['src'] : path + row['src'];
                row['image'] = '<img src="' + src + '" width="200"/>';
                row['image_id'] = row['id'];
                row['action'] = '<a href="#" class="btn btn-danger btn-sm image_remove" data-id="' + row['id'] + '"><i class="far fa-trash-alt"></i></a>';

                $('#quanlyimage').dataTable().fnAddData(row);
            }
        }

        $(document).on("click", ".image_remove", function() {
            let parent = $(this).parents("tr").get(0);
            $('#quanlyimage').dataTable().fnDeleteRow($('#quanlyimage').dataTable().fnGetPosition(parent));
        })
        $.validator.setDefaults({
            debug: true,
            success: "valid"
        });

        if (tin.image) {
            $(".image_ft").imageFeature("set_image", tin.image);
        }
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
                let data_image = $('#quanlyimage').dataTable().fnGetData();
                // console.log(data_image);
                // return;
                append = "";
                for (let i = 0; i < data_image.length; i++) {
                    let id = data_image[i].image_id;
                    append += "<input type='hidden' name='image_other[]' value='" + id + "' />";
                }
                $(form).append(append);
                form.submit();
                return false;
            }
        });
    });
</script>

<?= $this->endSection() ?>