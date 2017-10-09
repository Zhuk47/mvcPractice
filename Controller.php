<?php

namespace App;

use App\Model\Sponsor;
use App\Model\Team;
use App\Repository\SponsorRepository;
use App\Repository\TeamRepository;

class Controller
{
    protected $action;

    public function __construct($action)
    {
        $this->action = $action;
    }

    public function execute()
    {
        switch ($this->action) {
            case '':
            case 'main':
                $this->mainAction();
                break;
            case 'index-team':
                $this->indexTeamAction();
                break;
            case 'create-team':
                $this->createTeamAction();
                break;
            case 'view-team':
                $this->viewTeamAction();
                break;
            case 'update-team':
                $this->updateTeamAction();
                break;
            case 'delete-team':
                $this->deleteTeamAction();
                break;
            case 'delete-all-teams':
                $this->deleteAllTeamsAction();
                break;
            case 'index-sponsor':
                $this->indexSponsorAction();
                break;
            case 'create-sponsor':
                $this->createSponsorAction();
                break;
            case 'view-sponsor':
                $this->viewSponsorAction();
                break;
            case 'update-sponsor':
                $this->updateSponsorAction();
                break;
            case 'delete-sponsor':
                $this->deleteSponsorAction();
                break;
            case 'delete-all-sponsors':
                $this->deleteAllSponsorsAction();
                break;
            default:
                $this->errorAction();
        }
    }

    protected function mainAction()
    {
        require_once('view/main.php');
    }

    protected function indexTeamAction()
    {
        $teamRepository = new TeamRepository();
        $teams = $teamRepository->findAll();
        require_once('view/team/index.php');
    }

    protected function createTeamAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $action = 'create';
            require_once('view/team/form.php');
            return;
        }

        $name = isset($_POST['name']) ? trim($_POST['name']) : null;
        $founded = isset($_POST['founded']) ? trim($_POST['founded']) : null;
        $car = isset($_POST['car']) ? trim($_POST['car']) : null;

        $team = new Team($name, $founded, $car);

        if ($team->validate()) {
            $teamRepository = new TeamRepository();
            $teamRepository->save($team);
        }

        header('Location: index.php?action=index-team');
    }

    protected function viewTeamAction()
    {
        $id = $this->getId();
        $teamRepository = new TeamRepository();
        $team = $teamRepository->findById($id);
        if (!$team) {
            $this->errorAction();
        }
        require_once('view/team/view.php');
    }

    protected function getId()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!empty($id)) {
            return $id;
        }
        $this->errorAction();
    }

    protected function errorAction()
    {
        require_once('view/error.php');
        exit();
    }

    protected function updateTeamAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $this->getId();
            $teamRepository = new TeamRepository();
            $team = $teamRepository->findById($id);
            if (!$team) {
                $this->errorAction();
            }
            $action = 'update';
            require_once('view/team/form.php');
            return;
        }

        $name = isset($_POST['name']) ? trim($_POST['name']) : null;
        $founded = isset($_POST['founded']) ? trim($_POST['founded']) : null;
        $car = isset($_POST['car']) ? trim($_POST['car']) : null;
        $id = isset($_POST['id']) ? trim($_POST['id']) : null;
        $team = new Team($name, $founded, $car, $id);

        if ($team->validate()) {
            $teamRepository = new TeamRepository();
            $teamRepository->update($team);

            header('Location: index.php?action=index-team');
            return;
        }
        $this->errorAction();
    }

    protected function deleteTeamAction()
    {
        $id = $this->getId();
        $teamRepository = new TeamRepository();
        $teamRepository->delete($id);
        header('Location: index.php?action=index-team');
    }

    protected function deleteAllTeamsAction()
    {
        $teamRepository = new TeamRepository();
        $teamRepository->deleteAll();
        header('Location: index.php?action=index-team');
    }

    protected function indexSponsorAction()
    {
        $sponsorRepository = new SponsorRepository();
        $sponsors = $sponsorRepository->findAll();
        require_once('view/sponsor/index.php');
    }

    protected function createSponsorAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $action = 'create';
            require_once('view/sponsor/form.php');
            return;
        }

        $name = isset($_POST['name']) ? trim($_POST['name']) : null;

        $sponsor = new Sponsor($name);

        if ($sponsor->validate()) {
            $sponsorRepository = new SponsorRepository();
            $sponsorRepository->save($sponsor);
        }

        header('Location: index.php?action=index-sponsor');
    }

    protected function viewSponsorAction()
    {
        $id = $this->getId();
        $sponsorRepository = new SponsorRepository();
        $sponsor = $sponsorRepository->findById($id);
        if (!$sponsor) {
            $this->errorAction();
        }
        require_once('view/sponsor/view.php');
    }

    protected function updateSponsorAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $this->getId();
            $sponsorRepository = new SponsorRepository();
            $sponsor = $sponsorRepository->findById($id);
            if (!$sponsor) {
                $this->errorAction();
            }
            $action = 'update';
            require_once('view/sponsor/form.php');
            return;
        }

        $name = isset($_POST['name']) ? trim($_POST['name']) : null;
        $id = isset($_POST['id']) ? trim($_POST['id']) : null;
        $sponsor = new Sponsor($name, $id);

        if ($sponsor->validate()) {
            $sponsorRepository = new SponsorRepository();
            $sponsorRepository->update($sponsor);

            header('Location: index.php?action=index-sponsor');
            return;
        }
        $this->errorAction();
    }

    protected function deleteSponsorAction()
    {
        $id = $this->getId();
        $sponsorRepository = new SponsorRepository();
        $sponsorRepository->delete($id);
        header('Location: index.php?action=index-sponsor');
    }

    protected function deleteAllSponsorsAction()
    {
        $sponsorRepository = new SponsorRepository();
        $sponsorRepository->deleteAll();
        header('Location: index.php?action=index-sponsor');
    }

    protected function indexAll()
    {
        $sponsorRepository = new SponsorRepository();
        $sponsors = $sponsorRepository->showAll();
        require_once('view/sponsor/index.php');
    }
}
