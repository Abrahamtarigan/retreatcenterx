<?php
class Rooms_api_model extends CI_Model
{
    public function getRoomsData()
    {
        // Query data from tb_rooms here and return the result
        $query = $this->db->get('tb_rooms');
        return $query->result();
    }

    // Other functions in the model (if any)
}
