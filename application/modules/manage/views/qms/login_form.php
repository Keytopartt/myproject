<?php if ($this->session->flashdata('error')) { ?>
    <div class="alert alert-danger text-center"> <?php echo $this->session->flashdata('error'); ?> </div>
<?php } ?>

<form method="post" action="<?php echo module_url('qms/auth'); ?>" style="max-width: 400px; margin: 50px auto; padding: 30px; border: 1px solid #e0e0e0; border-radius: 15px; background-color: #ffffff; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    <h2 class="text-center mb-4" style="font-weight: 700; color: #333;">QMS System Login</h2>
    <div class="mb-3">
        <label for="iduser" class="form-label">ID User</label>
        <input type="text" class="form-control" id="iduser" name="iduser" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary w-100" style="border-radius: 50px; font-weight: bold;">Login</button>
</form>
