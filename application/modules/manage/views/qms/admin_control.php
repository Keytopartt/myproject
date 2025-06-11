<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">User Access Management</h5>
            <small>Manage user permissions for QMS modules</small>
        </div>
        
        <div class="card-body">
            <!-- Add New User Access Form -->
            <div class="mb-4">
                <h5>Add/Modify User Access</h5>
                <?= form_open('qms/save_user_access', ['id' => 'accessForm']) ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>User</label>
                                <select name="user_id" class="form-control" required>
                                    <option value="">Select User</option>
                                    <?php foreach ($users as $user): ?>
                                        <option value="<?= $user->id ?>"><?= $user->username ?> (<?= $user->email ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Access Level</label>
                                <select name="access_level" class="form-control" required>
                                    <option value="">Select Access Level</option>
                                    <option value="qms">QMS Full Access (listqms)</option>
                                    <option value="ptj">PTJ Access (listqmsptjs)</option>
                                    <option value="both">Both QMS and PTJ Access</option>
                                    <option value="none">No Access</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-primary btn-block">Save Access</button>
                            </div>
                        </div>
                    </div>
                <?= form_close() ?>
            </div>

            <!-- Current User Access List -->
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="accessTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>QMS Access</th>
                            <th>PTJ Access</th>
                            <th>Last Modified</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; foreach ($user_access as $access): ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td><?= $access->username ?></td>
                                <td><?= $access->email ?></td>
                                <td>
                                    <span class="badge <?= $access->qms_access ? 'bg-success' : 'bg-danger' ?>">
                                        <?= $access->qms_access ? 'Enabled' : 'Disabled' ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge <?= $access->ptj_access ? 'bg-success' : 'bg-danger' ?>">
                                        <?= $access->ptj_access ? 'Enabled' : 'Disabled' ?>
                                    </span>
                                </td>
                                <td><?= date('d/m/Y H:i', strtotime($access->modified_at)) ?></td>
                                <td>
                                    <button class="btn btn-sm btn-warning edit-access" 
                                            data-userid="<?= $access->user_id ?>"
                                            data-qms="<?= $access->qms_access ?>"
                                            data-ptj="<?= $access->ptj_access ?>">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-access" 
                                            data-userid="<?= $access->user_id ?>">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Include necessary JS/CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#accessTable').DataTable({
        "order": [[0, 'asc']],
        "responsive": true
    });

    // Edit button handler
    $('.edit-access').click(function() {
        let userId = $(this).data('userid');
        let qmsAccess = $(this).data('qms');
        let ptjAccess = $(this).data('ptj');
        
        // Set form values
        $('select[name="user_id"]').val(userId);
        
        // Determine access level
        if (qmsAccess && ptjAccess) {
            $('select[name="access_level"]').val('both');
        } else if (qmsAccess) {
            $('select[name="access_level"]').val('qms');
        } else if (ptjAccess) {
            $('select[name="access_level"]').val('ptj');
        } else {
            $('select[name="access_level"]').val('none');
        }
        
        // Scroll to form
        $('html, body').animate({
            scrollTop: $('#accessForm').offset().top
        }, 500);
    });

    // Delete button handler
    $('.delete-access').click(function() {
        if (confirm('Are you sure you want to remove this user\'s access?')) {
            let userId = $(this).data('userid');
            window.location.href = '<?= module_url("qms/delete_user_access/") ?>' + userId;
        }
    });
});
</script>