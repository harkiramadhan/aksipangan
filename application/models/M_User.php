<?php
class M_User extends CI_Model{
    function check($email, $password){
        return $this->db->get_where('user', ['email' => $email, 'password' => md5($password)]);
    }
}