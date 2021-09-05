<?= $this->extend('admin/main') ?>
<?= $this->section('title') ?>
Danh Sách tài Khoản
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Đăng Ký Tài Khoản</h4>
        <form class="forms-sample" method="POST" action="admin/user/createAdd">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Họ Và Tên</label>
                <input type="text" class="form-control" value="<?= old('name') ?>" placeholder="Name" name="name">
                <?php if (isset($validation)) : ?>
                    <?php if ($validation->hasError('name')) : ?>
                        <p style="color: red;">
                            <?= $validation->getError('name') ?>
                        </p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail3">Email </label>
                <input type="email" class="form-control" id="exampleInputEmail3" value="<?= old('email') ?>" placeholder="Email" name="email" value="<?= old('$email'); ?>">
                <?php if (isset($validation)) : ?>
                    <?php if ($validation->hasError('email')) : ?>
                        <p style="color: red;">
                            <?= $validation->getError('email') ?>
                        </p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword4">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword4" value="<?= old('password') ?>" value="<?= old('password') ?>" placeholder="Password" name="password">
                <?php if (isset($validation)) : ?>
                    <?php if ($validation->hasError('password')) : ?>
                        <p style="color: red;">
                            <?= $validation->getError('password') ?>
                        </p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-success mr-2">Submit</button>
            <a href="admin/user/list" class="btn btn-light">Cancel</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>