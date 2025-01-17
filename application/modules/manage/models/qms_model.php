<?php 


class qms_model extends CI_MODEL
{


    public function get_all_qms()
    {
        $query = $this->db->get("QMS_DOCUMENT");
        return $query;
    }

    function delete_qms($Document_id)
    {
        $this->db
        ->where("DOCUMENTID" ,$Document_id)
        ->delete("QMS_DOCUMENT");
    }

}