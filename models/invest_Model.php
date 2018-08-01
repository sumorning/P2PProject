

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

    public function getInvestByRange($Start, $Num)
    {
        $Query = 'SELECT * from invest order by open desc Limit ' . $Start . ',' . $Num;
        return $this->db->query($Query)->result();
    }
    public function getInvestByCId($CId, $Start, $Num)
    {
        $Query = 'SELECT * from Invest where cid=' . $CId . ' order by open desc Limit ' . $Start . ',' . $Num;
        return $this->db->query($Query)->result();
    }
    public function getInvestByPId($PId, $Start, $Num)
    {
        $Query = 'SELECT * from Invest where pid =' . $PId . ' order by open desc Limit ' . $Start . ',' . $Num;
        return $this->db->query($Query)->result();
    }

    public function getInvestByInRate($UpperLimit, $LowerLimit, $Start, $Num)
    {
        $Query = 'SELECT * from Invest where InRate >=' . $LowerLimit . ' and ' . $UpperLimit . '<= InRate order by open desc Limit ' . $Start . ',' . $Num;
        return $this->db->query($Query)->result();
    }
//
    public function getInvestByTotFund($UpperLimit, $LowerLimit, $Start, $Num)
    {
        $Query = 'SELECT * from Invest where totFund >=' . $LowerLimit . ' and ' . $UpperLimit . '<= InRate order by open desc Limit ' . $Start . ',' . $Num;
        return $this->db->query($Query)->result();
    }

    public function getInvestBySId($SId, $Start, $Num)
    {
        $Query = 'SELECT * from Invest where sid =' . $SId . ' order by open desc Limit ' . $Start . ',' . $Num;
        return $this->db->query($Query)->result();
    }

    public function getInvestByPeriod($UpperLimit, $LowerLimit, $Start, $Num)
    {
        $Query = 'SELECT * from Invest where period <=' . $UpperLimit . ' and period >= ' . $LowerLimit . ' order by open desc Limit ' . $Start . ',' . $Num;
        return $this->db->query($Query)->result();
    }

    public function getInvestByIName($SearchName, $Start, $Num)
    {
        $Query = 'SELECT * from Invest where iName LIKE "%' . $SearchName . '%" order by open desc Limit ' . $Start . ',' . $Num;
        return $this->db->query($Query)->result();
    }

    /* TBD */
    public function getPNameByPId($PId)
    {
        $Query = 'SELECT pName from platform where pid =' . $PId;
        return $this->db->query($Query)->row()->pName;
    }

    public function getCateNamebyId($cId)
    {
        return $this->db->query('SELECT categoryName from category where categoryId=' . $cId)->row()->categoryName;
    }
    public function getStatNamebyId($sId)
    {
        return $this->db->query('SELECT stateName from state where stateId=' . $sId)->row()->stateName;
    }

}
