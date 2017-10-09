<?php
require_once('../view/template/header.php');
?>

    <a href="index.php?action=create-team" class="btn btn-info">New team</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Car model</th>
            <th>Founded in</th>
            <th>Tools</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($teams as $team) { ?>
            <tr>
                <td><?= htmlspecialchars($team->name) ?></td>
                <td><?= htmlspecialchars($team->founded) ?></td>
                <td><?= htmlspecialchars($team->car) ?></td>
                <td>
                    <a href="index.php?action=view-team&id=<?= $team->id ?>" class="btn btn-primary">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="index.php?action=update-team&id=<?= $team->id ?>" class="btn btn-warning">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a href="index.php?action=delete-team&id=<?= $team->id ?>" class="btn btn-danger">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php
require_once('../view/template/footer.php');
?>