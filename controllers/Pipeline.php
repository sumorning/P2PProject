<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Pipeline extends CI_Controller
{
    public function index()
    {
        echo 'hidssd';
    }

    public function getName()
    {
        header('Content-Type: application/json');
        $this->load->database();
        $this->load->model('invest_Model');
        $data = $this->invest_Model->getInvestInf();

        $resultObj = array();
        foreach ($data as $entry) {
            $cateName = $this->invest_Model->getCateNamebyId($entry->cId);
            $statName = $this->invest_Model->getStatNamebyId($entry->sId);
            $tempObj = array(
                'iId' => $entry->iId,
                'pId' => $entry->pId,
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
                'updated' => $entry->updated,
            );
            array_push($resultObj, $tempObj);
        }
        echo json_encode($resultObj, JSON_UNESCAPED_UNICODE);
        return $resultObj;
    }
    public function DBTest($Start, $Num)
    {
        header('Content-Type: application/json');
        $this->load->database();
        $this->load->model('invest_Model');
        $data = $this->invest_Model->getInvestByRange($Start, $Num);
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
        echo json_encode($resultObj, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES);
        return $resultObj;
    }
    public function DBTestGetPost()
    {
        if (!isset($_POST['start'])) {
            $Start = false;
        } else {
            $Start = $_POST['start'];
        }
        if (!isset($_POST['num'])) {
            $Num = false;
        } else {
            $Num = $_POST['num'];
        }
        header('Content-Type: application/json');
        $this->load->database();
        $this->load->model('invest_Model');
        $data = $this->invest_Model->getInvestByRange($Start, $Num);

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
                'updated' => $entry->updated,
            );
            array_push($resultObj, $tempObj);
        }
        echo json_encode($resultObj, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES);
        return $resultObj;
    }
}
