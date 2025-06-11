<!DOCTYPE html>
<html>
<head>
    <title>Rejected Documents</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .rejected-badge { background-color: #ff4444; color: white; padding: 3px 8px; border-radius: 3px; }
    </style>
</head>
<body>
    <h2>Rejected Documents</h2>
    
    <?php if (empty($rejected)): ?>
        <p>No rejected documents found</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Risk ID</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($rejected as $doc): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= htmlspecialchars($doc->RISKID) ?></td>
                    <td><?= htmlspecialchars($doc->RISIKO) ?></td>
                    <td><span class="rejected-badge">Rejected</span></td>
                    <td><?= htmlspecialchars($doc->COMMENTPTJ) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>