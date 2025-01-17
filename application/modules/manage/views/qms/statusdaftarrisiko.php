<!-- statusDaftarRisiko.php -->
<div class="card">
    <div class="card-header">Pilih Tahun Dokumen</div> <!-- "Pilih Tahun Dokumen" means "Choose Document Year" -->
    <div class="card-body">
        <?= form_open('qms/filterDocuments', array('method' => 'GET')) ?> 
        <div class="form-group">
            <label for="year">Tahun:</label>
            <select name="year" id="year" class="form-control">
                <?php foreach ($years as $year): ?>
                    <option value="<?= $year ?>"><?= $year ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tapis Dokumen</button> <!-- "Tapis Dokumen" means "Filter Documents" -->
        <?= form_close() ?>
    </div>
</div>
