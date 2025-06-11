<form method="POST" action="<?php echo module_url("qms/saveptj/" . $qms->RISKID) ?>" class="p-4 border rounded bg-light">
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="risk_id" class="form-label">Risk ID</label>
            <input type="text" class="form-control" id="risk_id" name="risk_id" value="<?php echo $qms->RISKID ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="risiko" class="form-label">Risiko</label>
            <input type="text" class="form-control" id="risiko" name="risiko" value="<?php echo $qms->RISIKO ?>" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="punca" class="form-label">Punca</label>
            <input type="text" class="form-control" id="punca" name="punca" value="<?php echo $qms->PUNCA ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="kesan" class="form-label">Kesan</label>
            <input type="text" class="form-control" id="kesan" name="kesan" value="<?php echo $qms->KESAN ?>" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="kategori_risiko" class="form-label">Kategori Risiko</label>
            <input type="text" class="form-control" id="kategori_risiko" name="kategori_risiko" value="<?php echo $qms->KATEGORIRISIKO ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="kawalan_sedia_ada" class="form-label">Kawalan Sedia Ada</label>
            <input type="text" class="form-control" id="kawalan_sedia_ada" name="kawalan_sedia_ada" value="<?php echo $qms->KAWALANSEDIAADA ?>" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="keberkesanan_kawalan" class="form-label">Keberkesanan Kawalan</label>
            <input type="text" class="form-control" id="keberkesanan_kawalan" name="keberkesanan_kawalan" value="<?php echo $qms->KEBERKESANANKAWALAN ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="kemungkinan_dengan_kawalan" class="form-label">Kemungkinan dengan Kawalan</label>
            <input type="text" class="form-control" id="kemungkinan_dengan_kawalan" name="kemungkinan_dengan_kawalan" value="<?php echo $qms->KEMUNGKINANDENGANKAWALAN ?>" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="justifikasi_kemungkinan" class="form-label">Justifikasi Kemungkinan</label>
            <input type="text" class="form-control" id="justifikasi_kemungkinan" name="justifikasi_kemungkinan" value="<?php echo $qms->JUSTIFIKASIKEMUNGKINAN ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="impak_dengan_kawalan" class="form-label">Impak dengan Kawalan</label>
            <input type="text" class="form-control" id="impak_dengan_kawalan" name="impak_dengan_kawalan" value="<?php echo $qms->IMPAKDENGANKAWALAN ?>" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="justifikasi_impak" class="form-label">Justifikasi Impak</label>
            <input type="text" class="form-control" id="justifikasi_impak" name="justifikasi_impak" value="<?php echo $qms->JUSTIFIKASIIMPAK ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="skor_tahap_risiko" class="form-label">Skor Tahap Risiko</label>
            <input type="text" class="form-control" id="skor_tahap_risiko" name="skor_tahap_risiko" value="<?php echo $qms->SKORTAHAPRISIKO ?>" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="keutamaan_penerimaan_risiko" class="form-label">Keutamaan Penerimaan Risiko</label>
            <input type="text" class="form-control" id="keutamaan_penerimaan_risiko" name="keutamaan_penerimaan_risiko" value="<?php echo $qms->KEUTAMAANPENERIMAANRISIKO ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="strategi_rawatan" class="form-label">Strategi Rawatan</label>
            <input type="text" class="form-control" id="strategi_rawatan" name="strategi_rawatan" value="<?php echo $qms->STRATEGIRAWATAN ?>" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="kawalan_tambahan" class="form-label">Kawalan Tambahan</label>
            <input type="text" class="form-control" id="kawalan_tambahan" name="kawalan_tambahan" value="<?php echo $qms->KAWALANTAMBAHAN ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="tanggungjawab" class="form-label">Tanggungjawab</label>
            <input type="text" class="form-control" id="tanggungjawab" name="tanggungjawab" value="<?php echo $qms->TANGGUNGJAWAB ?>" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="tarikh_mula" class="form-label">Tarikh Mula</label>
            <input type="date" class="form-control" id="tarikh_mula" name="tarikh_mula" value="<?php echo $qms->TARIKHMULA ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="tarikh_akhir" class="form-label">Tarikh Akhir</label>
            <input type="date" class="form-control" id="tarikh_akhir" name="tarikh_akhir" value="<?php echo $qms->TARIKHAKHIR ?>" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="comment_ptj" class="form-label">Comment</label>
            <textarea class="form-control" id="comment_ptj" name="comment_ptj" rows="4"><?php echo $qms->COMMENTPTJ ?></textarea>
        </div>
        <div class="col-md-6">
        <label for="approvestatus" class="form-label">Approval</label>
        <select class="form-control" id="approvestatus" name="approvestatus" required>
            <option value="" disabled selected>Approval</option>
            <option value="Approved"<?php echo $qms->APPROVESTATUS == 'Approved' ? 'selected' : ''; ?>>Approved</option>
            <option value="Not_approved"<?php echo $qms->APPROVESTATUS == 'Not Approved' ? 'selected' : ''; ?>>Not Approved</option>

        </select>
    </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
