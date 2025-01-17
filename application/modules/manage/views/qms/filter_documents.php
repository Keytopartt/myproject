<div class="container">
    <h2>Dokumen untuk Tahun <?= $year ?></h2>

    <?php if (!empty($documents)) { ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Risk ID</th>
                    <th>Risiko</th>
                    <th>Kategori Risiko</th>
                    <th>Kawalan Sedia Ada</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($documents as $doc) { ?>
                    <tr>
                        <td><?= $doc->RISKID ?></td>
                        <td><?= $doc->RISIKO ?></td>
                        <td><?= $doc->KATEGORIRISIKO ?></td>
                        <td><?= $doc->KAWALANSEDIAADA ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No documents found for the year <?= $year ?>.</p>
    <?php } ?>
</div>
