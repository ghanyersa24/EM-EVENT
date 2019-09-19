
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
    private $msg;
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged')) {
            redirect('');
        }
    }
    public function index()
    {
		$this->load->view('Login');
    }
    public function login()
    {
        $username = $this->input->post('username');
		$password = $this->input->post('password');
		// $username='165150401111060';
		// $password='ghanyersa24';
        if (empty($username) || empty($password)) {
            $this->msg = array(
                'status' => 200,
                'error' => true,
                'message' => 'Empty NIM or Password'
            );
        } else {
            $check = file_get_contents('https://em.ub.ac.id/redirect/login/loginApps/?nim=' . $username . '&password=' . $password);
            $check = json_decode($check);
            if (!$check->status) {
                $this->msg = array(
                    'status' => 200,
                    'error' => true,
                    'message' => 'Login failed, wrong NIM or password'
                );
            } else {
                    $arr = array(
                        'logged' => true,
                        'nim' => $check->nim,
                        'nama' => $check->nama,
                        'fak' => $check->fak,
                        'foto' => $check->foto
					);
                    $this->session->set_userdata($arr);
                    $this->msg = array(
                        'status' => 200,
                        'error' => false,
                        'message' => 'Success, wait a minutes ...'
                    );
            }
        }
        echo json_encode($this->msg);
    }
}
