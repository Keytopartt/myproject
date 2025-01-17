<?php
// Flag to control permissions for adding, managing, and deleting records
$ENABLE_ADD  = TRUE;
$ENABLE_MANAGE  = TRUE;
$ENABLE_DELETE  = TRUE;
?>

<!-- Form for selecting year -->
<?= form_open($this->uri->uri_string(), array('id' => 'frm_year', 'name' => 'frm_year')) ?>

<div class="card">
    <div class="card-header">Pilih Tahun untuk Lihat Dokumen QMS</div> <!-- "Pilih Tahun untuk Lihat Dokumen QMS" means "Select Year to View QMS Documents" -->
    <div class="card-body">
        <!-- Dropdown for Year Selection -->
        <div class="form-group">
            <label for="year">Tahun</label>
            <select id="year" name="year" class="form-control" onchange="this.form.submit()">
                <option value="">Pilih Tahun</option>
                <?php
                // Example list of years. You can fetch these from your database.
                $years = [2023, 2024, 2025];  // Replace with dynamic years from database if needed
                foreach ($years as $year) {
                    echo "<option value='$year' " . (isset($_POST['year']) && $_POST['year'] == $year ? 'selected' : '') . ">$year</option>";
                }
                ?>
            </select>
        </div>
    </div><!-- /.card-body -->
</div><!-- /.card --> 

<?php form_close(); ?>

<?php
// If a year is selected, display the documents for that year
if (isset($_POST['year']) && $_POST['year'] != '') {
    $selectedYear = $_POST['year'];

    // Query the database for documents from the selected year
    // Replace this with your actual query logic
    $query = "SELECT * FROM qms_documents WHERE YEAR(TARIKHMULA) = '$selectedYear'";
    $result = $this->db->query($query);

    // Display the results
    if ($result->num_rows() > 0) {
        echo "<div class='card'><div class='card-header'>Dokumen QMS untuk Tahun $selectedYear</div><div class='card-body'><div class='table-responsive'><table class='table table-hover table-striped table-sm'>";
        echo "<thead><tr><th>No.</th><th>ID Risiko</th><th>Risiko</th><th>Punca</th><th>Kesan</th><th>Tanggungjawab</th><th>Edit</th><th>Delete</th></tr></thead><tbody>";

        $i = 0;
        foreach ($result->result() as $row) {
            echo "<tr>";
            echo "<td>" . ++$i . "</td>";
            echo "<td>" . $row->RISKID . "</td>";
            echo "<td>" . $row->RISIKO . "</td>";
            echo "<td>" . $row->PUNCA . "</td>";
            echo "<td>" . $row->KESAN . "</td>";
            echo "<td>" . $row->TANGGUNGJAWAB . "</td>";
            echo "<td><a class='btn btn-flat btn-warning' href='" . module_url("qms/formedit/" . $row->RISKID) . "'>Edit</a></td>";
            echo "<td><button type='button' class='btn btn-flat btn-danger' onclick='confirmDelete(\"" . module_url("qms/delete/" . $row->RISKID) . "\")'>Delete</button></td>";
            echo "</tr>";
        }

        echo "</tbody></table></div></div></div>";
    } else {
        echo "<div class='alert alert-warning'>Tiada dokumen untuk tahun $selectedYear.</div>";  // "No documents for the year"
    }
}
?>

<!-- Include necessary jQuery and JavaScript for deletion confirmation -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
</script>
