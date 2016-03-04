<?php
    class House extends CI_Model {
         function get_all_houses($id)
         {
             return $this->db->query("SELECT * FROM houses WHERE user_id = ?", array($id))->result_array();
         }
         function add_house($house)
         {
            $id = $this->session->userdata('user_id');
            $query = "INSERT INTO houses (address, city, state, bedroooms, user_id, bedroom_size, kitchen_size, kitchen_style, heating, year_built, comments, square_footage, backyard, created_at, updated_at, front_yard) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $values = array($house['address'], $house['city'], $house['state'], $house['bedroom_number'], $id, $house['bedroom_size'], $house['kitchen_size'], $house['kitchen_style'], $house['heating'], $house['year_built'], $house['comments'], $house['square_footage'], $house['backyard'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $house['front_yard']); 
            return $this->db->query($query, $values);
         }
         function get_house($house_id)
         {
            return $this->db->query("SELECT * FROM houses WHERE ID = ?", array($house_id))->row_array();
         }
         function delete_house($house_id)
         {
            return $this->db->query("DELETE FROM houses WHERE ID = ?", array($house_id));
         }
         function get_user_by_id($user_id)
         {
             return $this->db->query("SELECT * FROM users WHERE id = ?", array($user_id))->row_array();
         }
         function get_user_by_email($email)
         {
             return $this->db->query("SELECT name, alias, id, password, email FROM users WHERE email = ?", array($email))->row_array();
         }
         function add_user($user)
         {
             $query = "INSERT INTO users (name, alias, email, password, birthday, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
             $values = array($user['name'], $user['alias'], $user['email'], $user['password'], $user['birthday'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s")); 
             return $this->db->query($query, $values);
         }
    }
?>