<?php

class Kenderaan extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("vehicle_model");
        
    }

    public function listkend()
    {

        // $this->load->model("vehicle_model");
        $data = $this->vehicle_model->get_all_kenderaan();

        $data = $this->db->get("EV_T01_KENDERAAN");

        $this->template->title("Senarai Kenderaan");
        $this->template->set("data",$data);
        $this->template->render();
    }

    public function delete($id_kenderaan)
    {
        
        $this->vehicle_model->delete_vehicle($id_kenderaan);


        $this->db
        ->where("T01_ID", $id_kenderaan)
        ->delete("EV_T01_KENDERAAN");

        // echo "Deleted success";

        redirect(module_url("kenderaan/listkend"));
    }

    public function add()
    {
        // Retrieve form data using $this->input->post
        $risk_id = $this->input->post("risk_id");
        $risk_title = $this->input->post("risk_title");
        $risk_cause = $this->input->post("risk_cause");
        $risk_impact = $this->input->post("risk_impact");
        $kategori_risiko = $this->input->post("kategori_risiko");
        $kawalan_sedia_ada = $this->input->post("kawalan_sedia_ada");
        $control_effectiveness = $this->input->post("control_effectiveness");
        $likelihood_with_control = $this->input->post("likelihood_with_control");
        $impact_with_control = $this->input->post("impact_with_control");
        $risk_score_with_control = $this->input->post("risk_score_with_control");
        $risk_priority = $this->input->post("risk_priority");
        $treatment_strategy = $this->input->post("treatment_strategy");
        $responsibility = $this->input->post("responsibility");
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");
    
        // Prepare data for insertion
        $data_to_insert = [
            "RISKID"                => $risk_id,
            "RISKTITLE"             => $risk_title,
            "RISKCAUSE"             => $risk_cause,
            "RISKIMPACT"            => $risk_impact,
            "KATEGORIRISIKO"        => $kategori_risiko,
            "KAWALANSEDIAADA"       => $kawalan_sedia_ada,
            "CONTROL_EFFECTIVENESS" => $control_effectiveness,
            "LIKELIHOODWITHCONTROL" => $likelihood_with_control,
            "IMPACTWITHCONTROL"     => $impact_with_control,
            "RISKSCOREWITHCONTROL"  => $risk_score_with_control,
            "RISKPRIORITY"          => $risk_priority,
            "TREATMENTSTRATEGY"     => $treatment_strategy,
            "RESPONSIBILITY"        => $responsibility,
            "STARTDATE"             => $start_date,
            "ENDDATE"               => $end_date,
        ];
    
        // Insert data into the database
        $this->db->insert("qms_table", $data_to_insert);
    
        // Redirect to the list page
        redirect(module_url("qms/listqms"));
    }
    

    public function formadd()
    {
        $this->template->render();

    }

    public function formedit($id_kenderaan)
    {
        $vehicle = $this->db
        ->where("T01_ID", $id_kenderaan)
        ->get("EV_T01_KENDERAAN")
        ->row();

        $this->template->set("vehicle" , $vehicle);
        $this->template->render();

    }
    
    public function save($id_kenderaan)
    {
        
        $no_plat = $this->input->post("no_plat");
        $nama_kend = $this->input->post("nama");
        $kod_kend = $this->input->post("kod_kend");
        $jenama = $this->input->post("jenama");
        $varian = $this->input->post("varian");

        $data_to_update = [
            "T01_KOD_KENDERAAN"  => $kod_kend,
            "T01_NAMA_KENDERAAN" => $nama_kend,
            "T01_PLAT"           => $no_plat,
            "T01_JENAMA"         => $jenama,
            "T01_VARIAN"         => $varian,
        ];

        $this->db
        ->where("T01_ID", $id_kenderaan)
        ->update("EV_T01_KENDERAAN", $data_to_update);

        redirect(module_url("kenderaan/listkend"));

    }
}