<?= $this->extend('admin/main') ?>
<?= $this->section('title') ?>
Danh Sách tài Khoản
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style>
    .pagination>li {
        margin-right: 10px;
    }

    .pagination>li>a {
        border: 1px solid #ccc;
        padding: 5px 10px;
    }
</style>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <?php
            if (session()->getFlashdata('thongbaocreate')) {
                echo "<h4>" . session()->getFlashdata('thongbaocreate') . "</h4>";
            }
            ?>
            <h4 class="card-title">Danh Sách tài Khoản</h4>
            <p class="card-description">
                <a href="admin/user/create" class="btn btn-primary"> Thêm Tài Khoản</a>
            </p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                STT
                            </th>
                            <th>
                                Họ Và Tên
                            </th>
                            <th>
                                Email
                            </th>

                            <th colspan="2">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($users) && is_array($users)) : ?>

                            <?php foreach ($users as $user_item) : ?>
                                <tr>
                                    <td>
                                        <?= esc($user_item['id']) ?>
                                    </td>
                                    <td>
                                        <?= esc($user_item['name']) ?>
                                    </td>
                                    <td>
                                        <?= esc($user_item['email']) ?>
                                    </td>

                                    <td>
                                        <a href="<?= base_url('admin/user/edit/' . $user_item['id']);   ?>" class="btn btn-primary"> Sửa</a>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('admin/user/delete/' . $user_item['id']);   ?>" class="btn btn-danger"> Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        <?php else : ?>

                            <h3>No News</h3>

                            <p>Unable to find any news for you.</p>

                        <?php endif ?>
                    </tbody>

                </table>
                <div class="d-flex justify-content-end mt-3 mr-4 ">
                    <?= $pager->links() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>