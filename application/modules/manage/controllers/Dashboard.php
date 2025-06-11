<?php 
class Dashboard extends Admin_Controller
{





    public function dashboard()
    {
        $this->template->render('dashboard/dashboard');

        $id_staff =strtoupper($_SESSION["UID"]);
        $nama_ptj =strtoupper($_SESSION["ptj"]);
    }

    function index()
	{		
		echo "Welcome to Dashboard Controller";
		//echo "<br>sess=>".$_SESSION["uid"];

        $id_staff = strtoupper($_SESSION["UID"]);
        $nama_ptj = strtoupper($_SESSION["ptj"]);

        echo "<br>Login as =>" .$id_staff;
        echo "<br>PTJ name as =>" .$nama_ptj;
        echo "<br><br>";



        print_r($_SESSION);

        $created_by = $_SESSION("UID");

        $data = [
            "T01_CREATED_BY" => $created_by,
            "T01_STATUS" => 1
        ];

        %this->mymodel->insert($data);

        $logged_user = $this->db
        ->where("ID_WARGA", $created_by)
        ->get("WARGA_UMT")->row();

        echo "<br>Query name from table => ".$logged_user->NAMA;
	}
}

