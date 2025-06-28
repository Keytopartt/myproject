<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
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
}
?>
