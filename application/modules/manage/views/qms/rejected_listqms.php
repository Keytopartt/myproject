<?php 
    $ENABLE_MANAGE  = TRUE;
    $ENABLE_DELETE  = TRUE;
    
    // Filter only non-approved records
    $filtered = array_filter($data->result(), function($row) {
        return strtolower(trim($row->APPROVESTATUS)) !== 'approved';
    });
    
    echo "Bilangan data: " . count($filtered);
?>

<?= form_open($this->uri->uri_string(), array('id' => 'frm_menu', 'name' => 'frm_menu')) ?>    

<a class="btn btn-secondary" href="<?php echo module_url("qms/listqms") ?>">Back to Full List</a>

<div class="card">
    <div class="card-header">Senarai QMS (Not Approved Only)</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-sm" id="qmsTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Risiko</th>
                        <th>Risiko</th>
                        <th>Punca</th>
                        <th>Kesan</th>
                        <th>Kategori Risiko</th>
                        <th>Kawalan Sedia Ada</th>
                        <th>Tahap Keberkesanan Kawalan</th>
                        <th>Kemungkinan Dengan Kawalan</th>
                        <th>Justifikasi Kemungkinan</th>
                        <th>Impak Dengan Kawalan</th>
                        <th>Justifikasi Impak</th>
                        <th>Skor Risiko</th>
                        <th>Keutamaan Penerimaan Risiko</th>
                        <th>Strategi Rawatan</th>
                        <th>Kawalan Tambahan</th>
                        <th>Tanggungjawab</th>
                        <th>Tarikh Mula</th>
                        <th>Tarikh Akhir</th>
                        <th>Tahun</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th>Hapus</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; foreach ($filtered as $row) { ?> 
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo $row->RISKID; ?></td>
                            <td><?php echo $row->RISIKO; ?></td>
                            <td><?php echo $row->PUNCA; ?></td>
                            <td><?php echo $row->KESAN; ?></td>
                            <td><?php echo $row->KATEGORIRISIKO; ?></td>
                            <td><?php echo $row->KAWALANSEDIAADA; ?></td>
                            <td><?php echo $row->KEBERKESANANKAWALAN; ?></td>
                            <td><?php echo $row->KEMUNGKINANDENGANKAWALAN; ?></td>
                            <td><?php echo $row->JUSTIFIKASIKEMUNGKINAN; ?></td>
                            <td><?php echo $row->IMPAKDENGANKAWALAN; ?></td>
                            <td><?php echo $row->JUSTIFIKASIIMPAK; ?></td>
                            <td><?php echo $row->SKORTAHAPRISIKO; ?></td>
                            <td><?php echo $row->KEUTAMAANPENERIMAANRISIKO; ?></td>
                            <td><?php echo $row->STRATEGIRAWATAN; ?></td>
                            <td><?php echo $row->KAWALANTAMBAHAN; ?></td>
                            <td><?php echo $row->TANGGUNGJAWAB; ?></td>
                            <td><?php echo $row->TARIKHMULA; ?></td>
                            <td><?php echo $row->TARIKHAKHIR; ?></td>
                            <td><?php echo $row->TAHUN; ?></td>
                            <td><?php echo $row->COMMENTPTJ; ?></td>
                            <td>
                                <?php 
                                    $status = strtolower(trim($row->APPROVESTATUS));
                                    if ($status == 'approved') echo '<span class="badge bg-success">Approved</span>';
                                    elseif ($status == 'not_approved') echo '<span class="badge bg-danger">Not Approved</span>';
                                    else echo '<span class="badge bg-secondary">Pending</span>';
                                ?>
                            </td>
                            <td>
                                <?php if ($ENABLE_DELETE) { ?>
                                    <button type="button" class="btn btn-flat btn-danger" onclick="confirmDelete('<?php echo module_url("qms/delete/" . $row->RISKID); ?>')">Hapus</button>
                                <?php } ?>
                            </td>
                            <td>
                                <a class="btn btn-flat btn-warning" href="<?php echo module_url("qms/formedit/" . $row->RISKID) ?>">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php form_close(); ?>

<script>
function confirmDelete(url) {
    var firstConfirm = confirm("Are you sure you want to delete this document?");
    if (firstConfirm) {
        var secondConfirm = confirm("This action is irreversible. Are you really sure?");
        if (secondConfirm) {
            window.location.href = url;
        }
    }
}

$(document).ready(function() {
    $('#qmsTable').DataTable({
        order: [[0, 'asc']],
        paging: true,
        scrollX: true,
        lengthMenu: [5, 10, 15, 20]
    });
});
</script>