<form method="POST" action="<?php echo module_url('qms/add') ?>" class="p-4 border rounded bg-light">
    <!-- Display validation errors -->
    <?php if (validation_errors()): ?>
        <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
    <?php endif; ?>

    <!-- Display success message if the document was added successfully -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="risk_id" class="form-label">Risk ID</label>
            <input type="text" class="form-control" id="risk_id" name="risk_id" placeholder="Enter Risk ID" required>
        </div>
        <div class="col-md-6">
            <label for="risiko" class="form-label">Risiko</label>
            <input type="text" class="form-control" id="risiko" name="risiko" placeholder="Enter Risiko" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="punca" class="form-label">Punca</label>
            <input type="text" class="form-control" id="punca" name="punca" placeholder="Enter Punca">
        </div>
        <div class="col-md-6">
            <label for="kesan" class="form-label">Kesan</label>
            <input type="text" class="form-control" id="kesan" name="kesan" placeholder="Enter Kesan">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="kategori_risiko" class="form-label">Kategori Risiko</label>
            <input type="text" class="form-control" id="kategori_risiko" name="kategori_risiko" placeholder="Enter Kategori Risiko" required>
        </div>
        <div class="col-md-6">
            <label for="kawalan_sedia_ada" class="form-label">Kawalan Sedia Ada</label>
            <input type="text" class="form-control" id="kawalan_sedia_ada" name="kawalan_sedia_ada" placeholder="Enter Kawalan Sedia Ada" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="keberkesanan_kawalan" class="form-label">Keberkesanan Kawalan</label>
            <input type="text" class="form-control" id="keberkesanan_kawalan" name="keberkesanan_kawalan" placeholder="Enter Keberkesanan Kawalan">
        </div>
        <div class="col-md-6">
            <label for="kemungkinan_dengan_kawalan" class="form-label">Kemungkinan dengan Kawalan</label>
            <input type="text" class="form-control" id="kemungkinan_dengan_kawalan" name="kemungkinan_dengan_kawalan" placeholder="Enter Kemungkinan dengan Kawalan">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="justifikasi_kemungkinan" class="form-label">Justifikasi Kemungkinan</label>
            <textarea class="form-control" id="justifikasi_kemungkinan" name="justifikasi_kemungkinan" placeholder="Enter Justifikasi Kemungkinan"></textarea>
        </div>
        <div class="col-md-6">
            <label for="impak_dengan_kawalan" class="form-label">Impak dengan Kawalan</label>
            <input type="text" class="form-control" id="impak_dengan_kawalan" name="impak_dengan_kawalan" placeholder="Enter Impak dengan Kawalan">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="justifikasi_impak" class="form-label">Justifikasi Impak</label>
            <textarea class="form-control" id="justifikasi_impak" name="justifikasi_impak" placeholder="Enter Justifikasi Impak"></textarea>
        </div>
        <div class="col-md-6">
            <label for="skor_tahap_risiko" class="form-label">Skor Tahap Risiko</label>
            <input type="text" class="form-control" id="skor_tahap_risiko" name="skor_tahap_risiko" placeholder="Enter Skor Tahap Risiko">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="keutamaan_penerimaan_risiko" class="form-label">Keutamaan Penerimaan Risiko</label>
            <input type="text" class="form-control" id="keutamaan_penerimaan_risiko" name="keutamaan_penerimaan_risiko" placeholder="Enter Keutamaan Penerimaan Risiko">
        </div>
        <div class="col-md-6">
            <label for="strategi_rawatan" class="form-label">Strategi Rawatan</label>
            <input type="text" class="form-control" id="strategi_rawatan" name="strategi_rawatan" placeholder="Enter Strategi Rawatan">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="kawalan_tambahan" class="form-label">Kawalan Tambahan</label>
            <input type="text" class="form-control" id="kawalan_tambahan" name="kawalan_tambahan" placeholder="Enter Kawalan Tambahan">
        </div>
        <div class="col-md-6">
            <label for="tanggungjawab" class="form-label">Tanggungjawab</label>
            <input type="text" class="form-control" id="tanggungjawab" name="tanggungjawab" placeholder="Enter Tanggungjawab">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="tarikh_mula" class="form-label">Tarikh Mula</label>
            <input type="date" class="form-control" id="tarikh_mula" name="tarikh_mula">
        </div>
        <div class="col-md-6">
            <label for="tarikh_akhir" class="form-label">Tarikh Akhir</label>
            <input type="date" class="form-control" id="tarikh_akhir" name="tarikh_akhir">
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>
