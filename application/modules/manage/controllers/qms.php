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
        $id_staff = strtoupper($_SESSION["UID"]);
        echo $id_staff;

        // Fetch all records from QMS_DOCUMENT
        $data = $this->db->get("QMS_DOCUMENT");

        $this->template->title("Senarai QMS"); // "Senarai QMS" means "List of QMS"
        $this->template->set("data", $data);
        $this->template->render();
    }

    public function listqmsptjs()
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
        redirect(module_url("qms/listqms"));
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
                "TAHUN"                     => $this->input->post("tahun"),




                "COMMENTPTJ"                => $this->input->post("comment_ptj"), // Include manager's comment
                "APPROVESTATUS"             => $this->input->post("approvestatus"), // Default value for APPROVESTATUS

            ];

            if ($this->db->insert("QMS_DOCUMENT", $data_to_insert)) {
                // Set success notification
                $this->session->set_flashdata('message', 'Document added successfully!');
                redirect(module_url("qms/listqms"));
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

    public function formeditptj($risk_id)
    {
        $qms = $this->db->where("RISKID", $risk_id)->get("QMS_DOCUMENT")->row();
        $this->template->set("qms", $qms);
        $this->template->title("Comment QMS"); // "Kemaskini QMS" means "Update QMS"
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
            "TAHUN"                     => $this->input->post("tahun"),

            // "EditorID"                     => $this->input->post("editorid"),


            "COMMENTPTJ"           => $this->input->post("comment_ptj"), // Include manager's comment
            "APPROVESTATUS"             => $this->input->post("approvestatus"),


        ];
        

        $this->db->where("RISKID", $risk_id)->update("QMS_DOCUMENT", $data_to_update);
        redirect(module_url("qms/listqms"));
    }

   public function saveptj($risk_id)
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
        "TAHUN"                     => $this->input->post("tahun"),
        // "EditorID"                  => $this->input->post("editorid"),
        "COMMENTPTJ"                => $this->input->post("comment_ptj"),
        "APPROVESTATUS"             => $this->input->post("approvestatus"),
    ];

    $this->db->where("RISKID", $risk_id)->update("QMS_DOCUMENT", $data_to_update);
    redirect(module_url("qms/listqmsptjs"));
}



    // public function comment()
    // {
    //     // $qms = $this->db->where("RISKID", $risk_id)->get("QMS_DOCUMENT")->row();
    //     // $this->template->set("qms", $qms);
    //     $this->template->title("Comment QMS"); // "Kemaskini QMS" means "Update QMS"
    //     $this->template->render();
    // }


    // public function comment($risk_id)
    // {
    //     $data_to_update = [
    //         "RISIKO"                    => $this->input->post("risiko"),
    //         "PUNCA"                     => $this->input->post("punca"),
    //         "KESAN"                     => $this->input->post("kesan"),
    //         "KATEGORIRISIKO"            => $this->input->post("kategori_risiko"),
    //         "KAWALANSEDIAADA"           => $this->input->post("kawalan_sedia_ada"),
    //         "KEBERKESANANKAWALAN"       => $this->input->post("keberkesanan_kawalan"),
    //         "KEMUNGKINANDENGANKAWALAN"  => $this->input->post("kemungkinan_dengan_kawalan"),
    //         "JUSTIFIKASIKEMUNGKINAN"    => $this->input->post("justifikasi_kemungkinan"),
    //         "IMPAKDENGANKAWALAN"        => $this->input->post("impak_dengan_kawalan"),
    //         "JUSTIFIKASIIMPAK"          => $this->input->post("justifikasi_impak"),
    //         "SKORTAHAPRISIKO"           => $this->input->post("skor_tahap_risiko"),
    //         "KEUTAMAANPENERIMAANRISIKO" => $this->input->post("keutamaan_penerimaan_risiko"),
    //         "STRATEGIRAWATAN"           => $this->input->post("strategi_rawatan"),
    //         "KAWALANTAMBAHAN"           => $this->input->post("kawalan_tambahan"),
    //         "TANGGUNGJAWAB"             => $this->input->post("tanggungjawab"),
    //         "TARIKHMULA"                => $this->input->post("tarikh_mula"),
    //         "TARIKHAKHIR"               => $this->input->post("tarikh_akhir"),
    //         "MANAGER_COMMENT" => $this->input->post("manager_comment"), // Include manager's comment

    //     ];

    //     $this->db->where("RISKID", $risk_id)->update("QMS_DOCUMENT", $data_to_update);
    //     $this->template->render();
    // }

    

    public function filterDocuments()
{
    // Get the year from the GET request
    $year = $this->input->get('year');
    
    if (!$year) {
        show_error('Year not specified');
    }

    // Check if the table for the selected year exists
    $table_name = "QMS_DOCUMENT_" . $year;

    if (!$this->db->table_exists($table_name)) {
        show_error("The table for the year $year does not exist.");
    }

    // Fetch the documents from the table
    $data['documents'] = $this->db->get($table_name)->result();

    // Pass the data to the view
    $this->template->title("Dokumen untuk Tahun " . $year); // "Documents for Year"
    $this->template->set("year", $year);
    $this->template->set("documents", $data['documents']);
    $this->template->render();
}


    // New Method: Load the Document Management Page (like listQMS)
    public function statusDaftarRisiko()
{
    // Example hardcoded years; replace with dynamic retrieval if needed
    $data['years'] = [2024, 2025, 2026]; // Change this to dynamic year fetching if needed

    $this->template->title("Status Daftar Risiko");
    $this->template->set("years", $data['years']);
    $this->template->render();
}

public function mainpage()
    {
        $this->template->title("Main QMS"); // "Tambah QMS" means "Add QMS"
        $this->template->render();
    }

    

    public function generatepdf() {
        $this->load->library('m_pdf');
        
        // Fetch your data from the database
        $data['data'] = $this->qms_model->get_all_qms(); // Or use your method to get data
    
        // Start building your HTML content for the PDF
        $html = '
        <!DOCTYPE html>
        <html xmlns="http://www.w3.org/1999/xhtml" lang="" xml:lang="">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
            <title>QMS Report</title>
            <style type="text/css">
                body {
                    font-family: Arial, sans-serif;
                    font-size: 10px;
                    margin: 0;
                    padding: 0;
                    background-color: #A0A0A0;
                }
                .container {
                    position: relative;
                    width: 892px;
                    height: 1262px;
                }
                .background {
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    z-index: -1;
                }
                table {
                    width: 90%;
                    border-collapse: collapse;
                    margin: 20px auto;
                    background: white;
                }
                th, td {
                    border: 1px solid black;
                    padding: 8px;
                    text-align: left;
                }
                th {
                    background-color: #f2f2f2;
                }
                .badge {
                    padding: 3px 10px;
                    border-radius: 5px;
                    color: white;
                }
                .bg-success { background-color: #28a745; }
                .bg-warning { background-color: #ffc107; }
                .bg-danger { background-color: #dc3545; }
                .bg-secondary { background-color: #6c757d; }
            </style>
        </head>
        <body>
            <div class="container">
                
                <h2 style="text-align: center;">QMS Report</h2>
    
                <div class="card">
                    <div class="card-header">Senarai QMS</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Risiko</th>
                                        <th>Risiko</th>
                                        <th>Punca</th>
                                        <th>Kesan</th>
                                        <th>Kategori Risiko</th>
                                        <th>Kawalan Sedia Ada</th>
                                        <th>Tahap Keberkesanan Kawalan</th>
                                        <th>Kemungkinan Dengan Kawalan</th>
                                        <th>Justifikasi Kemungkinan</th>
                                        <th>Impak Dengan Kawalan</th>
                                        <th>Justifikasi Impak</th>
                                        <th>Skor & Tahap Risiko Dengan Kawalan</th>
                                        <th>Keutamaan Penerimaan Risiko</th>
                                        <th>Strategi Rawatan</th>
                                        <th>Kawalan Tambahan</th>
                                        <th>Tanggungjawab</th>
                                        <th>Tarikh Mula</th>
                                        <th>Tarikh Akhir</th>
                                        <th>Tahun</th>
                                        <th>Comment</th>
                                        <th>Approval Status</th>
                                    </tr>
                                </thead>
                                <tbody>';
    
                                $i = 0;
                                foreach ($data['data']->result() as $row) {
                                    $riskScore = $row->SKORTAHAPRISIKO;
    
                                    // Determine color for the risk score
                                    switch ($riskScore) {
                                        case 'L1':
                                        case 'L2':
                                            $color = 'bg-success';
                                            break;
                                        case 'L3':
                                        case 'L4':
                                            $color = 'bg-success';
                                            break;
                                        case 'M5':
                                        case 'M6':
                                        case 'M8':
                                        case 'M9':
                                        case 'M10':
                                            $color = 'bg-warning';
                                            break;
                                        case 'H12':
                                        case 'H15':
                                        case 'H16':
                                        case 'H20':
                                        case 'H25':
                                            $color = 'bg-danger';
                                            break;
                                        default:
                                            $color = 'bg-secondary';
                                            break;
                                    }
    
                                    $html .= '
                                    <tr>
                                        <td>' . (++$i) . '</td>
                                        <td>' . $row->RISKID . '</td>
                                        <td>' . $row->RISIKO . '</td>
                                        <td>' . $row->PUNCA . '</td>
                                        <td>' . $row->KESAN . '</td>
                                        <td>' . $row->KATEGORIRISIKO . '</td>
                                        <td>' . $row->KAWALANSEDIAADA . '</td>
                                        <td>' . $row->KEBERKESANANKAWALAN . '</td>
                                        <td>' . $row->KEMUNGKINANDENGANKAWALAN . '</td>
                                        <td>' . $row->JUSTIFIKASIKEMUNGKINAN . '</td>
                                        <td>' . $row->IMPAKDENGANKAWALAN . '</td>
                                        <td>' . $row->JUSTIFIKASIIMPAK . '</td>
                                        <td><span class="badge ' . $color . '">' . $riskScore . '</span></td>
                                        <td>' . $row->KEUTAMAANPENERIMAANRISIKO . '</td>
                                        <td>' . $row->STRATEGIRAWATAN . '</td>
                                        <td>' . $row->KAWALANTAMBAHAN . '</td>
                                        <td>' . $row->TANGGUNGJAWAB . '</td>
                                        <td>' . $row->TARIKHMULA . '</td>
                                        <td>' . $row->TARIKHAKHIR . '</td>
                                        <td>' . $row->TAHUN . '</td>
                                        <td>' . $row->COMMENTPTJ . '</td>
                                        <td>' . $row->APPROVESTATUS . '</td>
                                    </tr>';
                                }
    
            $html .= '</tbody></table></div></div></div></div></body></html>';
    
            // Write the HTML content to the PDF
            $this->m_pdf->pdf->WriteHTML($html);
    
            // Output the PDF to the browser
            $this->m_pdf->pdf->Output('QMS_Report.pdf', 'D');  // 'D' for download
        }
    
    
   //wqeqwdqweqw 

        public function admin_control()
{
    // Check admin permission first
    if (!$this->ion_auth->is_admin()) {
        show_error('You must be an admin to access this page', 403);
    }

    // Load the user model
    $this->load->model('User_model');
    
    $data = [
        'users' => $this->User_model->get_all_users(),
        'user_access' => $this->qms_model->get_user_access_list()
    ];
    
    $this->load->view('qms/admin_control', $data);
}

public function save_user_access()
{
    $user_id = $this->input->post('user_id');
    $access_level = $this->input->post('access_level');
    
    // Determine access flags
    $data = [
        'user_id' => $user_id,
        'qms_access' => ($access_level == 'qms' || $access_level == 'both') ? 1 : 0,
        'ptj_access' => ($access_level == 'ptj' || $access_level == 'both') ? 1 : 0,
        'modified_by' => $this->session->userdata('user_id'),
        'modified_at' => date('Y-m-d H:i:s')
    ];
    
    // Save to database
    $this->qms_model->save_user_access($data);
    
    $this->session->set_flashdata('message', 'User access updated successfully');
    redirect('qms/admin_control');
}

public function delete_user_access($user_id)
{
    $this->qms_model->delete_user_access($user_id);
    $this->session->set_flashdata('message', 'User access removed successfully');
    redirect('qms/admin_control');
}
    

public function rejected()
{
    // Get only rejected documents (status = 'not_approved')
    $data['rejected'] = $this->db->where('APPROVESTATUS', 'Not_approved')
                                ->get('QMS_DOCUMENT')
                                ->result();
    
    $this->load->view('rejected_view', $data);
}
}



//meowmeowmeoww