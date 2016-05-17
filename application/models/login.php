<?php
    class Login extends CI_Model {
        function get_user($email)
        {
            $query = "SELECT * FROM users WHERE email = ?";
            $values = array($email);
            return $this->db->query($query, $values)->row_array();
        }
        function sign_up($user_info)
        {
            $query = "INSERT INTO users (first_name, last_name, email, password, salt, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
            $values = array($user_info['first_name'], $user_info['last_name'], $user_info['email'], $user_info['password'], $user_info['salt'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s")); 
            $this->db->query($query, $values);
            //perform query and grab user's ID
            return $this->db->insert_id();
        }
        //Ajax call to get user info when user icon is clicked
        function get_user_info()
        {
            $user_id = $this->session->userdata('user_id');
            $query = "SELECT first_name, last_name, email FROM users WHERE ID = ?";
            $values = array($user_id);
            $result = $this->db->query($query, $values)->row_array();
            return json_encode($result);
        }
        function edit_user_info($user_info)
        {
            $user_id = $this->session->userdata('user_id');
            $query = "UPDATE users
                      SET first_name = '{$user_info['first_name']}', last_name = '{$user_info['last_name']}', email = '{$user_info['email']}'
                      WHERE ID = '{$user_id}'";
            $this->db->query($query);
        }
    }
?>