<?php
require_once('../view/template/header.php');
?>
    <div class="panel panel-default">
        <div class="panel-heading">Team overview</div>
        <div class="panel-body">
            <p>
                <strong>Name: </strong><?= $team->name ?>
            </p>
            <p>
                <strong>Founded in: </strong><?= $team->founded ?>
            </p>
            <p>
                <strong>Car model: </strong><?= $team->car ?>
            </p>
        </div>
    </div>
<?php
require_once('../view/template/footer.php');
?>