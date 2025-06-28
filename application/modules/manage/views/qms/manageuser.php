<div class="container mt-4">

    <h3>Manage Users (ADMIN only)</h3>

    <form method="post" action="<?php echo module_url('qms/adduser'); ?>" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="iduser" class="form-control" placeholder="ID User" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="col-md-3">
                <select name="role" class="form-control" required>
                    <option value="">Select Role</option>
                    <option value="PENYELARAS">PENYELARAS</option>
                    <option value="PEGAWAIPTJ">PEGAWAIPTJ</option>
                    <option value="ADMIN">ADMIN</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-success w-100">Add User</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID User</th>
                <th>Password</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['users'] as $user) { ?>
                <tr>
                    <td><?php echo $user->IDUSER; ?></td>
                    <td><?php echo $user->PASSWORD; ?></td>
                    <td><?php echo $user->ROLE; ?></td>
                    <td>
                        <a href="<?php echo module_url('qms/deleteuser/' . $user->IDUSER); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
