<?php
class Api
{
    private $db, $log_api_calls = true;
    public function __construct()
    {
        $this->db=new DB\SQL(
            'mysql:host=localhost;dbname=User',
            'admin',
            '12345'
        );
    }
    public function getUsersAll()
    {
        $api_data = $this->get_user_array();
        $data = [
            'data' => $api_data,
        ];
        $json_data = json_encode($data);
        echo $json_data;
    }

    public function get_user_array()
    {
        $api_data = $this->db->exec("SELECT * FROM `user`");
        return $api_data;
    }

  }