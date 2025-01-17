<div class="container">
    <h2>Create Table for a New Year</h2>

    <?php if ($this->session->flashdata('message')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('message') ?> </div>
    <?php } ?>

    <?php if ($this->session->flashdata('error')) { ?>
        <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
    <?php } ?>

    <?= form_open(module_url("qms/createYearTable")) ?>

    <div class="form-group">
        <label for="year">Enter Year:</label>
        <input type="text" class="form-control" name="year" id="year" placeholder="e.g., 2025" required>
    </div>

    <button type="submit" class="btn btn-primary">Create Table</button>

    <?= form_close() ?>
</div>
