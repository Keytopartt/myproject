<div class="container">
    <h2>Status Daftar Risiko</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Bil</th>
                <th>Tahun</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($years as $index => $year) { ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $year ?></td>
                    <td>
                        <a href="<?= site_url("qms/filterDocuments/$year") ?>" class="btn btn-primary">Kemaskini</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
