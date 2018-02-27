<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Pipeline extends CI_Controller
{
    public function index()
    {
        echo 'hidd';
    }

    public function getName()
    {
        header('Content-Type: application/json');
        $this->load->database();
        $this->load->model('invest_Model');
        $data = $this->invest_Model->getiName();

        $resultObj = array();
        foreach ($data as $entry) {
            $cateName = $this->invest_Model->getCateNamebyId($entry->cId);
            $statName = $this->invest_Model->getStatNamebyId($entry->sId);
            $tempObj = array(
                'iId' => $entry->iId,
                'pId' => $entry->pId,
                // need pId -> pName !!!
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
    public function DBTest($Id)
    {
        $this->load->database();
        $this->load->model('invest_Model');
        $data = $this->invest_Model->getStatNamebyId($Id);

        echo $data;
    }
}
