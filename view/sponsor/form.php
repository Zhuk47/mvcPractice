<?php
require_once('../view/template/header.php');
?>
    <form method="POST" action="index.php?action=<?= $action ?>-sponsor">
        <input type="hidden" id="id" name="id" value="<?= isset($sponsor->id) ? $sponsor->id : '' ?>">

        <div class="form-group">
            <label for="name">Sponsor's name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name"
                   value="<?= isset($sponsor->name) ? $sponsor->name : '' ?>">
        </div>
        <div>
            <b>Select sponsored teams:</b><br>
            <?php foreach ($teams as $team) { ?>
                <input type="checkbox" name="team_id[]" value="<?= $team->id ?>">
                <label for="<?= $team->id ?>"><?= $team->name ?></label>
            <?php } ?>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
<?php
require_once('../view/template/footer.php');
?>