<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Pipeline extends CI_Controller
{
    public function index()
    {
        echo 'Index';
    }

    public function makeRetData($data)
    {
        $resultObj = array();
        foreach ($data as $entry) {
            $cateName = $this->invest_Model->getCateNamebyId($entry->cId);
            $statName = $this->invest_Model->getStatNamebyId($entry->sId);
            $pName = $this->invest_Model->getPNameByPId($entry->pId);
            $tempObj = array(
                'iId' => $entry->iId,
                'pName' => $pName,
                'iName' => $entry->iName,
                'cName' => $cateName,
                'inRate' => $entry->inRate,
                'period' => $entry->period,
                'curFund' => $entry->curFund,
                'totFund' => $entry->totFund,
                'prRate' => $entry->prRate,
                'open' => $entry->open,
                'retDate' => $entry->retDate,
                'sName' => $statName,
                'nAlr' => $entry->nAlr,
                'url' => $entry->url,
            );
            array_push($resultObj, $tempObj);
        }
        return $resultObj;
    }

    public function getName()
    {
        header('Content-Type: application/json');
        $this->load->database();
        $this->load->model('invest_Model');
        $data = $this->invest_Model->getInvestInf();
        $resultObj = $this->makeRetData($data);
        echo json_encode($resultObj, JSON_UNESCAPED_UNICODE);
        return $resultObj;
    }

    public function getInvByRange($Start, $Num)
    {
        header('Content-Type: application/json');
        $this->load->database();
        $this->load->model('invest_Model');
        $data = $this->invest_Model->getInvestByRange($Start, $Num);
        $resultObj = $this->makeRetData($data);
        echo json_encode($resultObj, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES);
        return $resultObj;
    }
    public function getFilterByCId($CId, $Start, $Num)
    {
        header('Content-Type: application/json');
        $this->load->database();
        $this->load->model('invest_Model');
        $data = $this->invest_Model->getInvestByCId($CId, $Start, $Num);
        $resultObj = $this->makeRetData($data);
        echo json_encode($resultObj, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES);
        return $resultObj;

    }
    public function getFilterByPId($PId, $Start, $Num)
    {
        header('Content-Type: application/json');
        $this->load->database();
        $this->load->model('invest_Model');
        $data = $this->invest_Model->getInvestByPId($PId, $Start, $Num);
        $resultObj = $this->makeRetData($data);
        echo json_encode($resultObj, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES);
        return $resultObj;

    }
    public function getFilterByInRate($UpperLimit, $LowerLimit, $Start, $Num)
    {
        header('Content-Type: application/json');
        $this->load->database();
        $this->load->model('invest_Model');
        $data = $this->invest_Model->getInvestByInRate($UpperLimit, $LowerLimit, $Start, $Num);
        $resultObj = $this->makeRetData($data);
        echo json_encode($resultObj, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES);
        return $resultObj;

    }
    public function getFilterByTotFund($UpperLimit, $LowerLimit, $Start, $Num)
    {
        header('Content-Type: application/json');
        $this->load->database();
        $this->load->model('invest_Model');
        $data = $this->invest_Model->getInvestByTotFund($UpperLimit, $LowerLimit, $Start, $Num);
        $resultObj = $this->makeRetData($data);
        echo json_encode($resultObj, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES);
        return $resultObj;

    }
    public function getFilterBySId($SId, $Start, $Num)
    {
        header('Content-Type: application/json');
        $this->load->database();
        $this->load->model('invest_Model');
        $data = $this->invest_Model->getInvestBySId($SId, $Start, $Num);
        $resultObj = $this->makeRetData($data);
        echo json_encode($resultObj, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES);
        return $resultObj;

    }
    public function getFilterByPeriod($UpperLimit, $LowerLimit, $Start, $Num)
    {
        header('Content-Type: application/json');
        $this->load->database();
        $this->load->model('invest_Model');
        $data = $this->invest_Model->getInvestByPeriod($UpperLimit, $LowerLimit, $Start, $Num);
        $resultObj = $this->makeRetData($data);
        echo json_encode($resultObj, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES);
        return $resultObj;

    }
    public function getFilterByIName($SearchName, $Start, $Num)
    {
        header('Content-Type: application/json');
        $this->load->database();
        $this->load->model('invest_Model');

        $data = $this->invest_Model->getInvestByIName(urldecode($SearchName), $Start, $Num);
        $resultObj = $this->makeRetData($data);
        echo json_encode($resultObj, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES);
        return $resultObj;
    }

}
