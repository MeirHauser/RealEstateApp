<?php
    class House extends CI_Model {
         function get_all_houses($id)
         {
             return $this->db->query("SELECT * FROM houses WHERE user_id = ?", array($id))->result_array();
         }
         function add_house($house)
         {
            $id = $this->session->userdata('user_id');
            $query = "INSERT INTO houses (address, city, state, bedroooms, user_id, kitchen_size, kitchen_style, heating, year_built, comments, square_footage, backyard, created_at, updated_at, front_yard) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $values = array($house['address'], $house['city'], $house['state'], $house['bedroom_number'], 1, $house['kitchen_size'], $house['kitchen_style'], $house['heating'], $house['year_built'], $house['comments'], $house['square_footage'], $house['backyard'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $house['front_yard']); 
            $this->db->query($query, $values);
            $house_id = $this->db->insert_id();

            //insert into bedrooms db using $house_id
            $bedroom_array = array();
            foreach ($house as $key => $value) {
                if (strpos($key, 'details') !== false) {
                    $bedroom_array[$key] = $value;
                }
            }
            foreach ($bedroom_array as $key => $value) {
                $bedroom_name = str_replace("_", " ", substr($key,0,9));
                $query = "INSERT INTO bedrooms (name, house_id, details) VALUES (?,?,?)";
                $values = array($bedroom_name, $house_id, $value);
                $this->db->query($query, $values);
            }

            //insert into kitchens db
            $query =  "INSERT INTO kitchens (style, size, comments, house_id) VALUES (?,?,?,?)";
            $values = array($house['kitchen_style'], $house['kitchen_size'], $house['kitchen_comments'], $house_id);
            $this->db->query($query, $values);

         }
         function get_house($house_id)
         {
            return $this->db->query("SELECT * FROM houses WHERE ID = ?", array($house_id))->row_array();
         }
         function delete_house($house_id)
         {
            return $this->db->query("DELETE FROM houses WHERE ID = ?", array($house_id));
         }
    }
?>