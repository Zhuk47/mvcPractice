<?php
require_once('../view/template/header.php');
?>
    <form method="POST" action="index.php?action=<?= $action ?>-team">
        <input type="hidden" id="id" name="id" value="<?= isset($team->id) ? $team->id : '' ?>">

        <div class="form-group">
            <label for="firstName">Team's name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name"
                   value="<?= isset($team->name) ? $team->name : '' ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Team's car model</label>
            <input type="text" class="form-control" id="founded" name="founded" placeholder="car model"
                   value="<?= isset($team->founded) ? $team->founded : '' ?>">
        </div>
        <div class="form-group">
            <label for="class">Was founded in:</label>
            <input type="text" class="form-control" id="car" name="car" placeholder="year"
                   value="<?= isset($team->car) ? $team->car : '' ?>">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
<?php
require_once('../view/template/footer.php');
?>