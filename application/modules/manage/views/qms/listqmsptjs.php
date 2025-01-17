<?php 
    // Flag to control permissions for adding, managing, and deleting records
    $ENABLE_ADD  = TRUE;
    $ENABLE_MANAGE  = TRUE;
    $ENABLE_DELETE  = TRUE;

    // Display number of records
    echo "Bilangan data: " . $data->num_rows(); // "Bilangan data" means "Number of records"
?>

<!-- Form for actions on the page -->
<?= form_open($this->uri->uri_string(), array('id' => 'frm_menu', 'name' => 'frm_menu')) ?>    

<!-- Button for adding a new QMS document -->

    
<div class="card">
    <div class="card-header">Senarai QMS</div> <!-- "Senarai QMS" means "List of QMS" -->
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
                        <th>Skor & Tahap Risiko Dengan Kawalan</th>
                        <th>Keutamaan Penerimaan Risiko</th>
                        <th>Strategi Rawatan</th>
                        <th>Kawalan Tambahan</th>
                        <th>Tanggungjawab</th>
                        <th>Tarikh Mula</th>
                        <th>Tarikh Akhir</th>
                        <th>Comment</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; foreach ($data->result() as $row) { ?> 
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
                            <!-- Apply color logic to the "Skor & Tahap Risiko Dengan Kawalan" column -->
                            <td>
                                <?php
                                // Get the value for "Skor & Tahap Risiko Dengan Kawalan"
                                $riskScore = $row->SKORTAHAPRISIKO;

                                // Determine the color based on the score value
                                switch ($riskScore) {
                                    case 'L1':
                                    case 'L2':
                                        $color = 'bg-success'; // Green for low risk
                                        break;
                                    case 'L3':
                                    case 'L4':
                                        $color = 'bg-warning'; // Yellow for medium risk
                                        break;
                                    case 'TB5':
                                    case 'M6':
                                    case 'M8':
                                        $color = 'bg-info'; // Light Blue for very low risk
                                        break;
                                    case 'M9':
                                    case 'H12':
                                    case 'H15':
                                        $color = 'bg-danger'; // Red for high risk
                                        break;
                                    case 'H16':
                                    case 'H20':
                                    case 'H25':
                                        $color = 'bg-danger'; // Red for high risk
                                        break;
                                    default:
                                        $color = 'bg-secondary'; // Default gray for invalid or missing scores
                                        break;
                                }
                                ?>
                                <span class="badge <?php echo $color; ?>"><?php echo $riskScore; ?></span>
                            </td>
                            <td><?php echo $row->KEUTAMAANPENERIMAANRISIKO; ?></td>
                            <td><?php echo $row->STRATEGIRAWATAN; ?></td>
                            <td><?php echo $row->KAWALANTAMBAHAN; ?></td>
                            <td><?php echo $row->TANGGUNGJAWAB; ?></td>
                            <td><?php echo $row->TARIKHMULA; ?></td>
                            <td><?php echo $row->TARIKHAKHIR; ?></td>
                            <td><?php echo $row->COMMENTPTJ; ?></td>

                            <td>
                                <?php if ($ENABLE_DELETE) { ?>
                                    <button type="button" class="btn btn-flat btn-danger" onclick="confirmDelete('<?php echo module_url("qms/delete/" . $row->RISKID); ?>')">Delete</button>
                                <?php } ?>
                            </td>
                            <td>
                                <a class="btn btn-flat btn-warning" href="<?php echo module_url("qms/formeditptj/" . $row->RISKID) ?>">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        

        <!-- Delete Button -->
        <?php if (!$ENABLE_DELETE) { ?>
            <input type="button" name="delete1" class="btn btn-danger" id="delete-me" value="Hapus" onclick="confirm_delete(this.form)">
            <input type="hidden" name="delete" id="isdelete">
        <?php } ?>
    </div><!-- /.card-body -->
    
    <!-- Pagination (if needed) -->
    <div class="card-footer clearfix">
        <?php
        // Uncomment this line to enable pagination if configured
        // echo $this->pagination->create_links(); 
        ?>
    </div>
</div><!-- /.card --> 

<?php form_close(); ?>

<!-- Include necessary jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<script>
// Initialize DataTable for sorting functionality
$(document).ready(function() {
    $('#qmsTable').DataTable({
        "order": [[0, 'asc']], // Initial sorting by the first column (No.),
        "paging": true, // Enable pagination
        "scrollX": true, // Allow horizontal scrolling for wide tables
        "lengthMenu": [5, 10, 15, 20], // Show a smaller number of records per page
    });
});

function confirm_delete(myform)
{
    if (confirm('<?= (lang('ccc_delete_confirm')); ?>')) // This will prompt the delete confirmation
    {
        $("#isdelete").val(1);
        myform.submit();
    }
    
    return false;
}

// Double confirmation function
function confirmDelete(url) {
    // First confirmation
    var firstConfirm = confirm("Are you sure you want to delete this document?");
    if (firstConfirm) {
        // Second confirmation
        var secondConfirm = confirm("This action is irreversible. Are you really sure?");
        if (secondConfirm) {
            // Proceed with deletion if both confirmations are true
            window.location.href = url;
        }
    }
}
</script>
