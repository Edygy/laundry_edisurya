 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="row">
    <div class="col-lg">
        <!-- pesan error -->
        <?php if (validation_errors()) : ?>
           <div class="alert alert-success" role="alert">
            <?php validation_errors(); ?>
            </div>
        <?php endif; ?>
        <?= $this->session->flashdata('message'); ?>
        <!-- akhir pesan error -->

        <!-- tombol tambah  -->
        <a href="" class="btn btn-primary mb-3" class="btn btn-primary"
        data-toggle="modal" data-target="#logoutModal">Add Sub Menu</a>
        <!-- Tabel -->
        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Menu</th>
                <th scope="col">Title</th>
                <th scope="col">Url</th>
                <th scope="col">Icon</th>
                <th scope="col">Active</th>
                <th scope="col">Action</th>
                
            </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($SubMenu as $sm) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $sm['menu']; ?></td>
                    <td><?= $sm['title']; ?></td>
                    <td><?= $sm['url']; ?></td>
                    <td><?= $sm['icon']; ?></td>
                    <td><?= $sm['is_active']; ?></td>
                    <td>
                        <a href="" class="btn btn-success btn-sm" data-toggle="modal" 
                        data-target="#examplemodalsubedit<?= $sm['id']; ?>">edit</a>  
                        <a href="<?= base_url('menu/hapussubmenu/'); ?><?= $sm['id']; ?>" 
                        class="btn btn-danger btn-sm" onclick="return confirm('yakin akan dihapus?');">delete</a> 
                    </td>
                </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
            <!-- Akhir tabel -->


         </div>
    </div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1"
aria-labelledby="newMenuModallabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModallabel">Add new Menu</h5>
                <button type="button" class="btn-close"
                data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('menu/submenu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title"
                            name="title" placeholder="Submenu title">
                        </div>
                        <div class="form-group">
                            <select name="menu_id" menu="menu_id" class="form_control">
                                <option value="" class="value">Select Menu</option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id']; ?>" ?><?= $m["menu"]; ?></option>
                                    <?php endforeach;?>
                            </select> 
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" 
                        name="url" placeholder="Submenu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" 
                        name="icon" placeholder="Submenu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" input="checkbox" value="1"        
                            name="is_active" id="is_active" aria-label="checkbox for following text input" checked>
                            <label for="is_active" class="form-check-label">Active?</label>
                    </div>
                </div>
            </div>       
                     <div class="modal-foooter">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
</div>

<!-- Modal Edit -->
<?php foreach($SubMenu as $sm) : ?>
<div class="modal fade" id="examplemodalsubedit<?= $sm['id']; ?>"
 tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabelsubedit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelsubedit">Edit subMenu</h5>
                <button type="button" class="close"
                data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('menu/submenuedit/'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" value="<?= $sm['menu'] ?>" class="form-control" id="menu"
                            name="menu" placeholder="menu">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" 
                            readonly value="<?= $sm['id'] ?>"> 
                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-group">
                                <option value="<?= $sm['menu_id']; ?>"><?= $sm['menu']; ?></option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id']; ?>" ?><?= $m["menu"]; ?></option>
                                <?php endforeach;?>
                            </select> 
                        </div>
                        <div class="form-group">
                            <input type="text" value="<?= $sm['url'] ?>" class="form-control"
                            id="url" name="url" placeholder="Submenu url">
                        </div>
                        <div class="form-group">
                            <input type="text" value="<?= $sm['icon'] ?>" class="form-control"
                            id="icon" name="icon" placeholder="menu icon">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input"  type="checkbox" value="1"        
                               id="is_active" name="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Active?
                            </div>
                        </div>
                     </div>
                     <div class="modal-foooter">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="edit" class="btn btn-primary">Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>