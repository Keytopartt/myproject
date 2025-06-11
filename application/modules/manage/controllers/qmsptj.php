<?php

class Qms extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("qms_model");
        $this->load->library("form_validation");
    }

    public function listQMS()
    {
        $data = $this->qms_model->get_all_qms();

        // Fetch all records from QMS_DOCUMENT
        $data = $this->db->get("QMS_DOCUMENT");

        $this->template->title("Senarai QMS"); // "Senarai QMS" means "List of QMS"
        $this->template->set("data", $data);
        $this->template->render();
    }

    public function listQMSptjs()
    {
        $data = $this->qms_model->get_all_qms();

        // Fetch all records from QMS_DOCUMENT
        $data = $this->db->get("QMS_DOCUMENT");

        $this->template->title("Senarai QMS"); // "Senarai QMS" means "List of QMS"
        $this->template->set("data", $data);
        $this->template->render();
    }
     
    public function delete($risk_id)
    {
        $this->db->where("RISKID", $risk_id)->delete("QMS_DOCUMENT");
        redirect(module_url("qmsptj/listqmsptj"));
    }

    public function add()
    {
        // Set validation rules
        $this->form_validation->set_rules("risk_id", "Risk ID", "required");
        $this->form_validation->set_rules("risiko", "Risiko", "required");
        $this->form_validation->set_rules("kategori_risiko", "Kategori Risiko", "required");
        $this->form_validation->set_rules("kawalan_sedia_ada", "Kawalan Sedia Ada", "required");

        if ($this->form_validation->run() === FALSE) {
            $this->formadd();
        } else {
            $data_to_insert = [
                "RISKID"                    => $this->input->post("risk_id"),
                "RISIKO"                    => $this->input->post("risiko"),
                "PUNCA"                     => $this->input->post("punca"),
                "KESAN"                     => $this->input->post("kesan"),
                "KATEGORIRISIKO"            => $this->input->post("kategori_risiko"),
                "KAWALANSEDIAADA"           => $this->input->post("kawalan_sedia_ada"),
                "KEBERKESANANKAWALAN"       => $this->input->post("keberkesanan_kawalan"),
                "KEMUNGKINANDENGANKAWALAN"  => $this->input->post("kemungkinan_dengan_kawalan"),
                "JUSTIFIKASIKEMUNGKINAN"    => $this->input->post("justifikasi_kemungkinan"),
                "IMPAKDENGANKAWALAN"        => $this->input->post("impak_dengan_kawalan"),
                "JUSTIFIKASIIMPAK"          => $this->input->post("justifikasi_impak"),
                "SKORTAHAPRISIKO"           => $this->input->post("skor_tahap_risiko"),
                "KEUTAMAANPENERIMAANRISIKO" => $this->input->post("keutamaan_penerimaan_risiko"),
                "STRATEGIRAWATAN"           => $this->input->post("strategi_rawatan"),
                "KAWALANTAMBAHAN"           => $this->input->post("kawalan_tambahan"),
                "TANGGUNGJAWAB"             => $this->input->post("tanggungjawab"),
                "TARIKHMULA"                => $this->input->post("tarikh_mula"),
                "TARIKHAKHIR"               => $this->input->post("tarikh_akhir"),

                // "COMMENTPTJ"                => $this->input->post("manager_comment"), // Include manager's comment

            ];

            if ($this->db->insert("QMS_DOCUMENT", $data_to_insert)) {
                // Set success notification
                $this->session->set_flashdata('message', 'Document added successfully!');
                redirect(module_url("qms/listqmsptj"));
            } else {
                show_error("Failed to insert data into QMS_DOCUMENT.");
            }
        }
    }



    public function formadd()
    {
        $this->template->title("Tambah QMS"); // "Tambah QMS" means "Add QMS"
        $this->template->render();
    }

    public function formedit($risk_id)
    {
        $qms = $this->db->where("RISKID", $risk_id)->get("QMS_DOCUMENT")->row();
        $this->template->set("qms", $qms);
        $this->template->title("Kemaskini QMS"); // "Kemaskini QMS" means "Update QMS"
        $this->template->render();
    }

    public function save($risk_id)
    {
        $data_to_update = [
            "RISIKO"                    => $this->input->post("risiko"),
            "PUNCA"                     => $this->input->post("punca"),
            "KESAN"                     => $this->input->post("kesan"),
            "KATEGORIRISIKO"            => $this->input->post("kategori_risiko"),
            "KAWALANSEDIAADA"           => $this->input->post("kawalan_sedia_ada"),
            "KEBERKESANANKAWALAN"       => $this->input->post("keberkesanan_kawalan"),
            "KEMUNGKINANDENGANKAWALAN"  => $this->input->post("kemungkinan_dengan_kawalan"),
            "JUSTIFIKASIKEMUNGKINAN"    => $this->input->post("justifikasi_kemungkinan"),
            "IMPAKDENGANKAWALAN"        => $this->input->post("impak_dengan_kawalan"),
            "JUSTIFIKASIIMPAK"          => $this->input->post("justifikasi_impak"),
            "SKORTAHAPRISIKO"           => $this->input->post("skor_tahap_risiko"),
            "KEUTAMAANPENERIMAANRISIKO" => $this->input->post("keutamaan_penerimaan_risiko"),
            "STRATEGIRAWATAN"           => $this->input->post("strategi_rawatan"),
            "KAWALANTAMBAHAN"           => $this->input->post("kawalan_tambahan"),
            "TANGGUNGJAWAB"             => $this->input->post("tanggungjawab"),
            "TARIKHMULA"                => $this->input->post("tarikh_mula"),
            "TARIKHAKHIR"               => $this->input->post("tarikh_akhir"),
            // "MANAGER_COMMENT" => $this->input->post("manager_comment"), // Include manager's comment

        ];

        $this->db->where("RISKID", $risk_id)->update("QMS_DOCUMENT", $data_to_update);
        redirect(module_url("qms/listqms"));
    }

    public function saveptj($risk_id)
{
    $approve_status = $this->input->post("approve_status");
    $comment_ptj = $this->input->post("comment_ptj");

    $data_to_update = [
        "APPROVESTATUS" => $approve_status,
        "COMMENTPTJ"    => $comment_ptj,
    ];

    $this->db->where("RISKID", $risk_id);
    $this->db->update("QMS_DOCUMENT", $data_to_update);

    $this->session->set_flashdata("message", "Status kelulusan PTJ berjaya dikemaskini."); // Optional: Flash message
    redirect(module_url("qms/listqmsptjs")); // Redirect back to PTJ list page
}


    public function comment($risk_id)
    {
        $data_to_update = [
            "RISIKO"                    => $this->input->post("risiko"),
            "PUNCA"                     => $this->input->post("punca"),
            "KESAN"                     => $this->input->post("kesan"),
            "KATEGORIRISIKO"            => $this->input->post("kategori_risiko"),
            "KAWALANSEDIAADA"           => $this->input->post("kawalan_sedia_ada"),
            "KEBERKESANANKAWALAN"       => $this->input->post("keberkesanan_kawalan"),
            "KEMUNGKINANDENGANKAWALAN"  => $this->input->post("kemungkinan_dengan_kawalan"),
            "JUSTIFIKASIKEMUNGKINAN"    => $this->input->post("justifikasi_kemungkinan"),
            "IMPAKDENGANKAWALAN"        => $this->input->post("impak_dengan_kawalan"),
            "JUSTIFIKASIIMPAK"          => $this->input->post("justifikasi_impak"),
            "SKORTAHAPRISIKO"           => $this->input->post("skor_tahap_risiko"),
            "KEUTAMAANPENERIMAANRISIKO" => $this->input->post("keutamaan_penerimaan_risiko"),
            "STRATEGIRAWATAN"           => $this->input->post("strategi_rawatan"),
            "KAWALANTAMBAHAN"           => $this->input->post("kawalan_tambahan"),
            "TANGGUNGJAWAB"             => $this->input->post("tanggungjawab"),
            "TARIKHMULA"                => $this->input->post("tarikh_mula"),
            "TARIKHAKHIR"               => $this->input->post("tarikh_akhir"),
            // "MANAGER_COMMENT" => $this->input->post("manager_comment"), // Include manager's comment

        ];

        $this->db->where("RISKID", $risk_id)->update("QMS_DOCUMENT", $data_to_update);
        redirect(module_url("qms/listqms"));
    }
}
