

<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Invest_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function getInvestInf()
    {
        return $this->db->query('SELECT * from invest order by open desc')->result();
    }
    public function getInvestByMore($Limit)
    {
        //select * from invest  LIMIT
        return $this->db->query('SELECT * from invest order by open desc LIMIT ' . $Limit)->result();
    }
    public function getCateNamebyId($Id)
    {
        return $this->db->query('SELECT categoryName from category where categoryId=' . $Id)->row()->categoryName;
    }
    public function getStatNamebyId($Id)
    {
        return $this->db->query('SELECT stateName from state where stateId=' . $Id)->row()->stateName;
    }
}
