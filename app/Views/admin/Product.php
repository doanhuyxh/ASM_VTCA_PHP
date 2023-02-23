<div class="bg-light bg-gradient rounded p-5 m-2">
    <div class="table-title m-1">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <div class="col-sm-6">
                <h2>Manage <b>Product</b></h2>
            </div>
            <button type="button" class="btn  btn-success" data-bs-toggle="modal" data-bs-target="#addProduct">Thêm sản phẩm</button>
        </div>
    </div>
    <table class="table table-striped table-hover" id="tblProduct">
        <thead>
            <tr id="list-header ">
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Giá</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['list'] as $item) {
                echo '<tr>						
						<td>' . $item->product_code . '</td>
						<td>' . $item->product_name . '</td>
						<td>' . $item->product_category . '</td>
						<td>' . $item->product_price . '</td>
						<td>
                        <button class="btn btn-warning me-md-2" type="button">Sửa</button>
                        <button class="btn btn-danger" type="button">Xoá</button>
						</td>
					</tr>';
            }
            ?>
        </tbody>
    </table>
</div>


<div class="modal fade" id="addProduct" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?php echo _WEB_ROOT . '/admin-create' ?>">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm sản phẩm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Mã sản phẩm</label>
                        <input name="code" type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tên sản phẩm</label>
                        <input name="name" type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Loại sản phẩm</label>
                        <input name="cate" type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giá</label>
                        <input name="price" type="text" class="form-control" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu sản phẩm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>