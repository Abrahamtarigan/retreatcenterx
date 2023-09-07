<?php
class Api_user_model extends CI_Model
{
    public function authenticate($userEmail, $userPassword)
    {
        $query = $this->db->get_where('user', array('userEmail' => $userEmail));
        $user = $query->row();

        // Check if the user exists and the password is correct
        if ($user && password_verify($userPassword, $user->userPassword)) {
            return $user;
        } else {
            return false;
        }
    }

    public function generateAccessToken($userId)
    {
        $token = bin2hex(random_bytes(32));
        $this->db->update('user', array('access_token' => $token), array('userId' => $userId));
        return $token;
    }
    public function getUserByToken($token)
    {
        $query = $this->db->get_where('user', array('access_token' => $token));
        return $query->row();
    }

    // Other functions in the model (if any)
}
