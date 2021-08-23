<?php
class M_User extends CI_Model{
    function check($email, $password){
        return $this->db->select()
                ->from('user u')
                ->where([
                    'u.email' => $email,
                    'u.password' => md5($password)
                ])->get();
    }
}