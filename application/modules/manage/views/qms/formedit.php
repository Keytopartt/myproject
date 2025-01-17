<form method="POST" action="<?php echo module_url("qms/save/" . $qms->RISKID) ?>" class="p-4 border rounded bg-light">
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="risk_id" class="form-label">Risk ID</label>
            <input type="text" class="form-control" id="risk_id" name="risk_id" value="<?php echo $qms->RISKID ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="risiko" class="form-label">Risiko</label>
            <input type="text" class="form-control" id="risiko" name="risiko" value="<?php echo $qms->RISIKO ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="punca" class="form-label">Punca</label>
            <input type="text" class="form-control" id="punca" name="punca" value="<?php echo $qms->PUNCA ?>">
        </div>
        <div class="col-md-6">
            <label for="kesan" class="form-label">Kesan</label>
            <input type="text" class="form-control" id="kesan" name="kesan" value="<?php echo $qms->KESAN ?>">
        </div>
    </div>

    <div class="row mb-3">
    <div class="col-md-6">
            <label for="kategori_risiko" class="form-label">Kategori Risiko</label>
            <select class="form-control" id="kategori_risiko" name="kategori_risiko" required>
                <option value="" disabled>Select Kategori Risiko</option>
                <option value="Strategi" <?php echo $qms->KATEGORIRISIKO == 'Strategi' ? 'selected' : ''; ?>>Strategi</option>
                <option value="Reputasi" <?php echo $qms->KATEGORIRISIKO == 'Reputasi' ? 'selected' : ''; ?>>Reputasi</option>
                <option value="Manusia" <?php echo $qms->KATEGORIRISIKO == 'Manusia' ? 'selected' : ''; ?>>Manusia</option>
                <option value="Pematuhan" <?php echo $qms->KATEGORIRISIKO == 'Pematuhan' ? 'selected' : ''; ?>>Pematuhan</option>
                <option value="Kewangan" <?php echo $qms->KATEGORIRISIKO == 'Kewangan' ? 'selected' : ''; ?>>Kewangan</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="kawalan_sedia_ada" class="form-label">Kawalan Sedia Ada</label>
            <input type="text" class="form-control" id="kawalan_sedia_ada" name="kawalan_sedia_ada" value="<?php echo $qms->KAWALANSEDIAADA ?>">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
        <label for="keberkesanan_kawalan" class="form-label">Tahap Keberkesanan Kawalan</label>
        <select class="form-control" id="keberkesanan_kawalan" name="keberkesanan_kawalan" required>
            <option value="" disabled selected>Select Tahap Keberkesanan</option>
            <option value="HE"<?php echo $qms->KEBERKESANANKAWALAN == 'HE' ? 'selected' : ''; ?>>HE (High Effectiveness)</option>
            <option value="ME"<?php echo $qms->KEBERKESANANKAWALAN == 'ME' ? 'selected' : ''; ?>>ME (Medium Effectiveness)</option>
            <option value="IE"<?php echo $qms->KEBERKESANANKAWALAN == 'IE' ? 'selected' : ''; ?>>IE (Insufficient Effectiveness)</option>
        </select>
    </div>
    <div class="col-md-6">
            <label for="kemungkinan_dengan_kawalan" class="form-label">Kemungkinan dengan Kawalan</label>
            <select class="form-control" id="kemungkinan_dengan_kawalan" name="kemungkinan_dengan_kawalan" required>
                <option value="" disabled selected>Pilih Kemungkinan</option>
                <option value="1"<?php echo $qms->KEMUNGKINANDENGANKAWALAN == '1' ? 'selected' : ''; ?>>1</option>
                <option value="2"<?php echo $qms->KEMUNGKINANDENGANKAWALAN == '2' ? 'selected' : ''; ?>>2</option>
                <option value="3"<?php echo $qms->KEMUNGKINANDENGANKAWALAN == '3' ? 'selected' : ''; ?>>3</option>
                <option value="4"<?php echo $qms->KEMUNGKINANDENGANKAWALAN == '4' ? 'selected' : ''; ?>>4</option>
                <option value="5"<?php echo $qms->KEMUNGKINANDENGANKAWALAN == '5' ? 'selected' : ''; ?>>5</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="justifikasi_kemungkinan" class="form-label">Justifikasi Kemungkinan</label>
            <input type="text" class="form-control" id="justifikasi_kemungkinan" name="justifikasi_kemungkinan" value="<?php echo $qms->JUSTIFIKASIKEMUNGKINAN ?>">
        </div>
        <div class="col-md-6">
            <label for="impak_dengan_kawalan" class="form-label">Impak dengan Kawalan</label>
            <select class="form-control" id="impak_dengan_kawalan" name="impak_dengan_kawalan" required>
            <option value="" disabled selected>Pilih Impak</option>
                <option value="1"<?php echo $qms->IMPAKDENGANKAWALAN == '1' ? 'selected' : ''; ?>>1</option>
                <option value="2"<?php echo $qms->IMPAKDENGANKAWALAN == '2' ? 'selected' : ''; ?>>2</option>
                <option value="3"<?php echo $qms->IMPAKDENGANKAWALAN == '3' ? 'selected' : ''; ?>>3</option>
                <option value="4"<?php echo $qms->IMPAKDENGANKAWALAN == '4' ? 'selected' : ''; ?>>4</option>
                <option value="5"<?php echo $qms->IMPAKDENGANKAWALAN == '5' ? 'selected' : ''; ?>>5</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="justifikasi_impak" class="form-label">Justifikasi Impak</label>
            <input type="text" class="form-control" id="justifikasi_impak" name="justifikasi_impak" value="<?php echo $qms->JUSTIFIKASIIMPAK ?>">
        </div>
        <div class="col-md-6">
            <label for="skor_tahap_risiko" class="form-label">Skor Tahap Risiko</label>
            <input type="text" class="form-control" id="skor_tahap_risiko" name="skor_tahap_risiko" value="<?php echo $qms->SKORTAHAPRISIKO ?>">
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

    <div class="row mb-3">
    <div class="col-md-6">
    <label for="strategi_rawatan" class="form-label">Keutamaan Penerimaan Risiko</label>
    <select class="form-control" id="keutamaan_penerimaan_risiko" name="keutamaan_penerimaan_risiko" required>
            <option value="" disabled selected>Select Keutamaan Penerimaan Risiko</option>
            <option value="Risiko Diterima"<?php echo $qms->KEUTAMAANPENERIMAANRISIKO == 'Risiko Diterima' ? 'selected' : ''; ?>>Risiko Diterima</option>
            <option value="Risiko Tidak Diterima"<?php echo $qms->KEUTAMAANPENERIMAANRISIKO == 'Risiko Tidak Diterima' ? 'selected' : ''; ?>>Risiko Tidak Diterima</option>
        </select>
</div>
        <div class="col-md-6">
        <label for="strategi_rawatan" class="form-label">Strategi Rawatan</label>
        <select class="form-control" id="strategi_rawatan" name="strategi_rawatan" required>
            <option value="" disabled selected>Select Strategi Rawatan</option>
            <option value="Ambil Peluang"<?php echo $qms->StrategiRawatan == 'Ambil Peluang' ? 'selected' : ''; ?>>Ambil Peluang</option>
            <option value="Hapus"<?php echo $qms->STRATEGIRAWATAN == 'Hapus' ? 'selected' : ''; ?>>Hapus</option>
            <option value="Kurang"<?php echo $qms->STRATEGIRAWATAN == 'Kurang' ? 'selected' : ''; ?>>Kurang</option>
            <option value="Pindah"<?php echo $qms->STRATEGIRAWATAN == 'Pindah' ? 'selected' : ''; ?>>Pindah</option>
            <option value="Terima"<?php echo $qms->STRATEGIRAWATAN == 'Terima' ? 'selected' : ''; ?>>Terima</option>
        </select>
    </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="kawalan_tambahan" class="form-label">Kawalan Tambahan</label>
            <input type="text" class="form-control" id="kawalan_tambahan" name="kawalan_tambahan" value="<?php echo $qms->KAWALANTAMBAHAN ?>">
        </div>
        <div class="col-md-6">
            <label for="tanggungjawab" class="form-label">Tanggungjawab</label>
            <input type="text" class="form-control" id="tanggungjawab" name="tanggungjawab" value="<?php echo $qms->TANGGUNGJAWAB ?>">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="tarikh_mula" class="form-label">Tarikh Mula</label>
            <input type="date" class="form-control" id="tarikh_mula" name="tarikh_mula" value="<?php echo $qms->TARIKHMULA ?>">
        </div>
        <div class="col-md-6">
            <label for="tarikh_akhir" class="form-label">Tarikh Akhir</label>
            <input type="date" class="form-control" id="tarikh_akhir" name="tarikh_akhir" value="<?php echo $qms->TARIKHAKHIR ?>">
        </div>
    </div>


    <div class="text-end">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
