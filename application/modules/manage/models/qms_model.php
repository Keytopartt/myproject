<?php 


class qms_model extends CI_MODEL
{


    public function get_all_qms()
    {
        $id_staff = strtoupper($_SESSION["UID"]);

        
        $query = $this->db->get("QMS_DOCUMENT");
        return $query;
    }

    function delete_qms($Document_id)
    {
        $this->db
        ->where("DOCUMENTID" ,$Document_id)
        ->delete("QMS_DOCUMENT");
    }

    public function update_ptj($risk_id, $data)
{
    $this->db->where('RISKID', $risk_id);
    return $this->db->update('QMS_DOCUMENT', $data); // Replace with your actual table name
}


public function get_all_users()
{
    return $this->db->get('WARGA_UMT')->result();
}


public function get_user_access_list()
{
    $this->db->select('ua.*, u.username, u.email');
    $this->db->from('user_access ua');
    $this->db->join('users u', 'u.id = ua.user_id');
    return $this->db->get()->result();
}

public function save_user_access($data)
{
    // Check if record exists
    $exists = $this->db->where('user_id', $data['user_id'])
                      ->get('user_access')
                      ->row();
    
    if ($exists) {
        // Update existing record
        $this->db->where('user_id', $data['user_id'])
                ->update('user_access', $data);
    } else {
        // Insert new record
        $this->db->insert('user_access', $data);
    }
    
    return $this->db->affected_rows();
}
public function check_qms_access($user_id)
{
    $this->db->select('qms_access');
    $this->db->where('user_id', $user_id);
    $result = $this->db->get('user_access')->row();
    return $result ? (bool)$result->qms_access : false;
}

public function check_ptj_access($user_id)
{
    $this->db->select('ptj_access');
    $this->db->where('user_id', $user_id);
    $result = $this->db->get('user_access')->row();
    return $result ? (bool)$result->ptj_access : false;
}

public function delete_user_access($user_id)
{
    return $this->db->where('user_id', $user_id)
                   ->delete('user_access');
}


public function get_not_approved()
    {
        return $this->db->where('APPROVESTATUS', 'not_approved')
                       ->get('QMS_DOCUMENT')
                       ->result();
    }

    public function count_not_approved()
    {
        return $this->db->where('APPROVESTATUS', 'bot_approved')
                       ->from('QMS_DOCUMENT')
                       ->count_all_results();
    }


    public function validate_user($iduser, $password) {
    $sql = "SELECT IDUSER, PASSWORD, ROLE FROM PAGEUSER WHERE IDUSER = ? AND PASSWORD = ?";
    $query = $this->db->query($sql, array($iduser, $password));

    if ($query->num_rows() == 1) {
        return $query->row();
    } else {
        return false;
    }
}


public function get_all_userQMS() {
    $sql = "SELECT IDUSER, PASSWORD, ROLE FROM PAGEUSER ORDER BY IDUSER";
    $query = $this->db->query($sql);
    return $query->result();
}

public function insert_user($iduser, $password, $role) {
    $sql = "INSERT INTO PAGEUSER (IDUSER, PASSWORD, ROLE) VALUES (?, ?, ?)";
    $this->db->query($sql, array($iduser, $password, $role));
}

public function delete_user($iduser) {
    $sql = "DELETE FROM PAGEUSER WHERE IDUSER = ?";
    $this->db->query($sql, array($iduser));
}


}

