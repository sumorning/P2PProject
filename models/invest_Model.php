<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Invest_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function getiName()
    {
        return $this->db->query('SELECT * from invest')->result();
    }
    public function getiNameByInRate($InRate)
    {
        return $this->db->query('SELECT * from invest where inRate>' . $InRate)->result();
    }
}
