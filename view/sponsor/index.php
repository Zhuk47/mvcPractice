<?php
require_once('../view/template/header.php');
?>

    <a href="index.php?action=create-sponsor" class="btn btn-info">New sponsor</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Tools</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($sponsors as $sponsor) { ?>
            <tr>
                <td><?= $sponsor->id ?></td>
                <td><?= $sponsor->name ?></td>
                <td>
                    <a href="index.php?action=view-sponsor&id=<?= $sponsor->id ?>" class="btn btn-primary">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="index.php?action=update-sponsor&id=<?= $sponsor->id ?>" class="btn btn-warning">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a href="index.php?action=delete-sponsor&id=<?= $sponsor->id ?>" class="btn btn-danger">
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