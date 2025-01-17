<?php

class Qms extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge(); // Load the database forge class for creating tables
    }

    public function createYearTable()
    {
        // Set validation rules for year input
        $this->form_validation->set_rules("year", "Year", "required|numeric|exact_length[4]");

        if ($this->form_validation->run() === FALSE) {
            // If validation fails, reload the form
            $this->formCreateYearTable();
        } else {
            $year = $this->input->post("year");
            $table_name = "QMS_DOCUMENT_" . $year;

            // Check if the table already exists
            if ($this->db->table_exists($table_name)) {
                $this->session->set_flashdata('error', "The table for the year $year already exists.");
                redirect(module_url("qms/createYearTable"));
            }

            // Define table schema
            $fields = [
                "RISKID" => [
                    "type" => "VARCHAR",
                    "constraint" => 255,
                ],
                "RISIKO" => [
                    "type" => "TEXT",
                ],
                "PUNCA" => [
                    "type" => "TEXT",
                ],
                "KESAN" => [
                    "type" => "TEXT",
                ],
                "KATEGORIRISIKO" => [
                    "type" => "TEXT",
                ],
                "KAWALANSEDIAADA" => [
                    "type" => "TEXT",
                ],
                "KEBERKESANANKAWALAN" => [
                    "type" => "TEXT",
                ],
                "KEMUNGKINANDENGANKAWALAN" => [
                    "type" => "TEXT",
                ],
                "JUSTIFIKASIKEMUNGKINAN" => [
                    "type" => "TEXT",
                ],
                "IMPAKDENGANKAWALAN" => [
                    "type" => "TEXT",
                ],
                "JUSTIFIKASIIMPAK" => [
                    "type" => "TEXT",
                ],
                "SKORTAHAPRISIKO" => [
                    "type" => "TEXT",
                ],
                "KEUTAMAANPENERIMAANRISIKO" => [
                    "type" => "TEXT",
                ],
                "STRATEGIRAWATAN" => [
                    "type" => "TEXT",
                ],
                "KAWALANTAMBAHAN" => [
                    "type" => "TEXT",
                ],
                "TANGGUNGJAWAB" => [
                    "type" => "TEXT",
                ],
                "TARIKHMULA" => [
                    "type" => "DATE",
                ],
                "TARIKHAKHIR" => [
                    "type" => "DATE",
                ],
                "COMMENTPTJ" => [
                    "type" => "TEXT",
                ],
            ];

            // Add fields and create the table
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key("RISKID", TRUE); // Set RISKID as the primary key

            if ($this->dbforge->create_table($table_name)) {
                $this->session->set_flashdata('message', "The table for the year $year has been created successfully.");
                redirect(module_url("qms/createYearTable"));
            } else {
                show_error("Failed to create the table for the year $year.");
            }
        }
    }

    public function formCreateYearTable()
    {
        $this->template->title("Create New Year Table");
        $this->template->render();
    }
}

?>