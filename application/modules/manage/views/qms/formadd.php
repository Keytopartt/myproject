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
        <select class="form-control" id="kategori_risiko" name="kategori_risiko" required>
            <option value="" disabled selected>Select Kategori Risiko</option>
            <option value="Strategi">Strategi</option>
            <option value="Reputasi">Reputasi</option>
            <option value="Manusia">Manusia</option>
            <option value="Pematuhan">Pematuhan</option>
            <option value="Kewangan">Kewangan</option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="kawalan_sedia_ada" class="form-label">Kawalan Sedia Ada</label>
        <input type="text" class="form-control" id="kawalan_sedia_ada" name="kawalan_sedia_ada" placeholder="Enter Kawalan Sedia Ada" required>
    </div>
</div>

    <div class="row mb-3">
    <div class="col-md-6">
        <label for="keberkesanan_kawalan" class="form-label">Tahap Keberkesanan Kawalan</label>
        <select class="form-control" id="keberkesanan_kawalan" name="keberkesanan_kawalan" required>
            <option value="" disabled selected>Select Tahap Keberkesanan</option>
            <option value="HE">HE (High Effectiveness)</option>
            <option value="ME">ME (Medium Effectiveness)</option>
            <option value="IE">IE (Insufficient Effectiveness)</option>
        </select>
    </div>
    <div class="col-md-6">
            <label for="kemungkinan_dengan_kawalan" class="form-label">Kemungkinan dengan Kawalan</label>
            <select class="form-control" id="kemungkinan_dengan_kawalan" name="kemungkinan_dengan_kawalan" required>
                <option value="" disabled selected>Pilih Kemungkinan</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="justifikasi_kemungkinan" class="form-label">Justifikasi Kemungkinan</label>
            <textarea class="form-control" id="justifikasi_kemungkinan" name="justifikasi_kemungkinan" placeholder="Enter Justifikasi Kemungkinan"></textarea>
        </div>
        <div class="col-md-6">
            <label for="impak_dengan_kawalan" class="form-label">Impak dengan Kawalan</label>
            <select class="form-control" id="impak_dengan_kawalan" name="impak_dengan_kawalan" required>
                <option value="" disabled selected>Pilih Impak</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="justifikasi_impak" class="form-label">Justifikasi Impak</label>
            <textarea class="form-control" id="justifikasi_impak" name="justifikasi_impak" placeholder="Enter Justifikasi Impak"></textarea>
        </div>
        <div class="col-md-6">
            <label for="skor_tahap_risiko" class="form-label">Skor Tahap Risiko</label>
            <input type="text" class="form-control" id="skor_tahap_risiko" name="skor_tahap_risiko" placeholder="Skor Tahap Risiko" readonly>
        </div>
    </div>

    <script>
    // JavaScript to auto-generate Skor Tahap Risiko with color coding
    document.addEventListener('DOMContentLoaded', function () {
        const kemungkinanSelect = document.getElementById('kemungkinan_dengan_kawalan');
        const impakSelect = document.getElementById('impak_dengan_kawalan');
        const skorInput = document.getElementById('skor_tahap_risiko');

        function calculateRiskScore(row, column) {
            if (row == 1 && column == 1) return "L1";
            if (row == 1 && column == 2) return "L2";
            if (row == 1 && column == 3) return "L3";
            if (row == 1 && column == 4) return "L4";
            if (row == 1 && column == 5) return "TB5";
            if (row == 2 && column == 1) return "L2";
            if (row == 2 && column == 2) return "L4";
            if (row == 2 && column == 3) return "M6";
            if (row == 2 && column == 4) return "M8";
            if (row == 2 && column == 5) return "TB10";
            if (row == 3 && column == 1) return "L3";
            if (row == 3 && column == 2) return "M6";
            if (row == 3 && column == 3) return "M9";
            if (row == 3 && column == 4) return "H12";
            if (row == 3 && column == 5) return "H15";
            if (row == 4 && column == 1) return "L4";
            if (row == 4 && column == 2) return "M8";
            if (row == 4 && column == 3) return "H12";
            if (row == 4 && column == 4) return "H16";
            if (row == 4 && column == 5) return "H20";
            if (row == 5 && column == 1) return "M5";
            if (row == 5 && column == 2) return "M10";
            if (row == 5 && column == 3) return "H15";
            if (row == 5 && column == 4) return "H20";
            if (row == 5 && column == 5) return "H25";
            return "Invalid input";
        }

        function setRiskColor(score) {
            skorInput.style.backgroundColor = "";
            if (score.startsWith("L")) {
                skorInput.style.backgroundColor = "green";
                skorInput.style.color = "white";
            } else if (score.startsWith("M")) {
                skorInput.style.backgroundColor = "yellow";
                skorInput.style.color = "black";
            } else if (score.startsWith("H")) {
                skorInput.style.backgroundColor = "red";
                skorInput.style.color = "white";
            } else {
                skorInput.style.backgroundColor = "";
                skorInput.style.color = "black";
            }
        }

        function updateRiskScore() {
            const row = parseInt(kemungkinanSelect.value);
            const column = parseInt(impakSelect.value);
            if (!isNaN(row) && !isNaN(column)) {
                const score = calculateRiskScore(row, column);
                skorInput.value = score;
                setRiskColor(score);
            } else {
                skorInput.value = "";
                skorInput.style.backgroundColor = "";
            }
        }

        kemungkinanSelect.addEventListener('change', updateRiskScore);
        impakSelect.addEventListener('change', updateRiskScore);

       
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tarikhMulaInput = document.getElementById('tarikh_mula');
        const tahunInput = document.getElementById('tahun');

        tarikhMulaInput.addEventListener('change', function () {
            const date = new Date(tarikhMulaInput.value);
            if (!isNaN(date.getTime())) {
                tahunInput.value = date.getFullYear(); // Extract and set the year
            } else {
                tahunInput.value = ""; // Clear if the date is invalid
            }
        });
    });
</script>

    <div class="row mb-3">
    <div class="col-md-6">
        <label for="keutamaan_penerimaan_risiko" class="form-label">Keutamaan Penerimaan Risiko</label>
        <select class="form-control" id="keutamaan_penerimaan_risiko" name="keutamaan_penerimaan_risiko" required>
            <option value="" disabled selected>Select Keutamaan Penerimaan Risiko</option>
            <option value="Risiko Diterima">Risiko Diterima</option>
            <option value="Risiko Tidak Diterima">Risiko Tidak Diterima</option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="strategi_rawatan" class="form-label">Strategi Rawatan</label>
        <select class="form-control" id="strategi_rawatan" name="strategi_rawatan" required>
            <option value="" disabled selected>Select Strategi Rawatan</option>
            <option value="Ambil Peluang">Ambil Peluang</option>
            <option value="Hapus">Hapus</option>
            <option value="Kurang">Kurang</option>
            <option value="Pindah">Pindah</option>
            <option value="Terima">Terima</option>
        </select>
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

    <div class="row mb-3">
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" readonly>
        </div>
        <div class="col-md-6">
            <label for="editor_id" class="form-label">Editor ID</label>
            <input type="text" class="form-control" id="editor_id" name="editor_id" value="<?php echo $this->session->userdata('user_id'); ?>" readonly>
        </div>
    </div>
    
    <!-- Submit Button -->
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
    
</form>
