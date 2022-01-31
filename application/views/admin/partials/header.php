<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= ucwords($this->uri->segment(1)) ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('admin/index') ?>">Home</a></li>
                    <li class="breadcrumb-item active"><?= ucwords($this->uri->segment(1)) ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>