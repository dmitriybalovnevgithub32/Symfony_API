<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use TheSeer\Tokenizer\Token;
use Symfony\Component\Security\Csrf\TokenGenerator;
use App\Entity\User;

class ApiController extends AbstractController
{
    public $token = '';
    public $session = '';
    public $authorizationdata = ['login' => '', 'password' => '', 'token' => 'token'];
    private $requestStack;

    public function __construct()
    {
        $this->session = new Session();
        $this->session->start();
        $getflashbag = $this->session->getFlashBag();
        $this->session->set('token', 'token222');
    }

    #[Route('/backend/api/login', name: 'app_backend_api_auth_login')]
    public function login(Request $request)
    {
        $user = new User();
        $this->session->start();
        $this->session->set('');

        $login = $request->get('login');
        $password = $request->get('password');
        $token = $this->generateToken();

        $this->session->start();
        $this->session->all();
        $this->session->set('login', $login);
        $this->session->set('login', $password);
        $this->session->set('token', $token);

        $this->session->get('data');
        $this->session->getFlashBag()->add('notice', 'Profile update');

        foreach ($this->session->getFlashBag()->get('notice', array()) as $message) {
            echo '<div class="flash-notice' . $message . '</div>';
        }
        return $this->json(['request' => 'success']);
    }

    #[Route('/backend/api/registration', name: 'app_backend_api_auth_registration')]
    public function registration(Request $request)
    {
        $this->session->start();
        $this->session->set('data1', 'data1');
        $this->session->set('data2', 'data2');
        $this->session->set('data3', 'data3');
        $this->session->set('data4', 'data4');
        $this->session->get('');
        $this->json(['request' => 'success']);
    }

    #[Route('/backend/api/authentification_status', name: 'app_backend_api_authentification_status')]
    public function authentificationstatus()
    {
        $this->session->start();
        $this->session->set('data1', 'data1');
        $this->session->remove('');
        $status = true;

        if ($status) {
            echo "authentification status success";
        }

        return $this->json(['request' => 'success']);
    }

    #[Route('/backend/api/delete_auth_token', name: 'app_backend_api_delete_auth_token')]
    public function deleteauthtoken()
    {
        $token = $this->generateToken();

        $this->session->start();
        $this->session->set('data1', 'data1');
        $this->session->set('token', $token);
        $this->session->set('token', $token);
        $this->session->remove('token');
        $user = new User();
        $user->generatetoken();

        var_dump($this->session->get('token'));
        die();
//        sessions status deleted
        $status = 'deleted';

        if ($status) {
            echo "delete auth token status success";
        }
        echo "token";
        return $this->json(['tokenstatus' => false]);
    }

    private function generateToken()
    {
        return "token";
    }
}
