<?php
require_once('../view/template/header.php');
?>
<form method="POST" action="index.php?action=<?= $action ?>-team" xmlns="http://www.w3.org/1999/html">
    <input type="hidden" id="id" name="id" value="<?= isset($team->id) ? $team->id : '' ?>">

    <div class="form-group">
        <label for="name">Team's name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="name"
               value="<?= isset($team->name) ? $team->name : '' ?>">
    </div>
    <div class="form-group">
        <label for="car">Team's car model</label>
        <input type="text" class="form-control" id="founded" name="founded" placeholder="car model"
               value="<?= isset($team->founded) ? $team->founded : '' ?>">
    </div>
    <div class="form-group">
        <label for="founded">Was founded in:</label>
        <input type="text" class="form-control" id="car" name="car" placeholder="year"
               value="<?= isset($team->car) ? $team->car : '' ?>">
    </div>
    <div>
        <b>Select team's sponsors:</b><br>
        (If you update your team please select team's sponsors <b>again</b>)<br>
        <?php foreach ($sponsors as $sponsor) { ?>
        <input type="checkbox" name="sponsor_id[]" value="<?= $sponsor->id ?>">
        <label for="<?= $sponsor->id ?>"><?= $sponsor->name ?></label>
        <?php } ?>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <?php
    require_once('../view/template/footer.php');
    ?>