<?php
require_once('../view/template/header.php');
?>
    <div class="panel panel-default">
        <div class="panel-heading">Sponsors overview</div>
        <div class="panel-body">
            <p>
                <strong>Name: </strong><?= $sponsor->name ?>
            </p>
            <p>
                <strong>Sponsored teams and their cars: </strong>
                <?php foreach ($teams as $team) { ?>
                <td><br><?= $team->name ?></td>
                ----
                <td><?= $team->car ?><br></td>
                <?php } ?>
            </p>
        </div>
    </div>
<?php
require_once('../view/template/footer.php');
?>