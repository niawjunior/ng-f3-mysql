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

    public function addUser($params)
    {
        $post_data = file_get_contents("php://input");
        if($post_data != '') {
            $post_data_array = json_decode($post_data, true);
            $name = $post_data_array['name'];
            $result = $this->db->exec("INSERT INTO `user`(firstName) VALUES(:name)", array(
                ':name' => $name
            ));
            if ($result) {
                echo $post_data;
            }
        }
    }

  }