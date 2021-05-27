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
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <b class="col-12 col-lg-4 col-form-label">Tiếng việt:<i class="text-danger">*</i></b>
                                <div class="col-12 col-lg-8 pt-1">
                                    <input class="form-control form-control-sm" type='text' name="name_vi" required="" placeholder="Tên" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <b class="col-12 col-lg-4 col-form-label">Tiếng Anh:</b>
                                <div class="col-12 col-lg-8 pt-1">
                                    <input class="form-control form-control-sm" type='text' name="name_en" placeholder="Tên - Tiếng Anh" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <b class="col-12 col-lg-4 col-form-label">Tiếng Nhật:</b>
                                <div class="col-12 col-lg-8 pt-1">
                                    <input class="form-control form-control-sm" type='text' name="name_jp" placeholder="Tên - Tiếng Nhật" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">

                                <b class="col-12 col-lg-4 col-form-label">Loại:</b>
                                <div class="col-12 col-lg-8 pt-1">
                                    <select class="form-control" name="type">
                                        <option value="1">Link</option>
                                        <option value="2">Danh mục sản phẩm</option>
                                        <option value="3">Danh mục tin tức</option>
                                        <option value="4">Trang</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row link">
                                <b class="col-12 col-lg-2 col-form-label">Link:</b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <input class="form-control" name="link" value="#" />
                                </div>
                            </div>
                            <div class="form-group row category">
                                <b class="col-12 col-lg-2 col-form-label">Danh mục sản phẩm:</b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <select class="form-control" name="category_id">
                                        <option value="0">Tất cả</option>
                                        <?php foreach ($categories as $row) : ?>
                                            <option value="<?= $row->id ?>"><?= $row->name_vi ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row tag">
                                <b class="col-12 col-lg-2 col-form-label">Danh mục tin tức:</b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <select class="form-control" name="category_id">
                                        <option value="0">Tất cả</option>
                                        <?php foreach ($tags as $row) : ?>
                                            <option value="<?= $row->id ?>"><?= $row->name_vi ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row page">
                                <b class="col-12 col-lg-2 col-form-label">Trang:</b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <select class="form-control" name="category_id">
                                        <option value="0">Tất cả</option>
                                        <?php foreach ($pages as $row) : ?>
                                            <option value="<?= $row->id ?>"><?= $row->title_vi ?></option>
                                        <?php endforeach ?>
                                    </select>
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
<?= $this->endSection() ?>

<!-- Script --->
<?= $this->section('script') ?>

<script type='text/javascript'>
    $(document).ready(function() {
        $("[name=type]").change(function() {
            $(".link,.category,.tag,.page").hide();
            $(".category select,.tag select,.page select").prop("disabled", true);
            let value = $(this).val();
            if (value == 1) {
                $(".link").show();
            } else if (value == 2) {
                $(".category").show();
                $(".category select").prop("disabled", false);
            } else if (value == 3) {
                $(".tag").show();
                $(".tag select").prop("disabled", false);
            } else if (value == 4) {
                $(".page").show();
                $(".page select").prop("disabled", false);
            }
        })

        var tin = <?= json_encode($tin) ?>;
        fillForm($("#form-dang-tin"), tin);
        $("[name=type]").change();
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
                form.submit();
                return false;
            }
        });
    });
</script>
<?= $this->endSection() ?>