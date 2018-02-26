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
            $tempObj = array(
                'iId' => $entry->iId,
                'pId' => $entry->pId,
                'iName' => $entry->iName,
                'cId' => $entry->cId,
                'inRate' => $entry->inRate,
                'period' => $entry->period,
                'curFund' => $entry->curFund,
                'totFund' => $entry->totFund,
                'prRate' => $entry->prRate,
                'open' => $entry->open,
                'retDate' => $entry->retDate,
                'sId' => $entry->sId,
                'nAlr' => $entry->nAlr,
                'url' => $entry->url,
                'updated' => $entry->updated,
            );
            array_push($resultObj, $tempObj);
        }
        echo json_encode($resultObj, JSON_UNESCAPED_UNICODE);
        return $resultObj;
    }
    public function getNameByInRate($InRate)
    {
        header('Content-Type: application/json');
        $this->load->database();
        $this->load->model('invest_Model');
        $data = $this->invest_Model->getiNameByInRate($InRate);
        $resultObj = array();
        foreach ($data as $entry) {
            $tempObj = array(
                'iId' => $entry->iId,
                'pId' => $entry->pId,
                'iName' => $entry->iName,
                'cId' => $entry->cId,
                'inRate' => $entry->inRate,
                'period' => $entry->period,
                'pId' => $entry->pId,
                'curFund' => $entry->curFund,
                'totFund' => $entry->totFund,
                'prRate' => $entry->prRate,
                'open' => $entry->open,
                'retDate' => $entry->retDate,
                'sId' => $entry->sId,
                'nAlr' => $entry->nAlr,
                'url' => $entry->url,
                'updated' => $entry->updated,
            );
            array_push($resultObj, $tempObj);
        }
        echo json_encode($resultObj, JSON_UNESCAPED_UNICODE);
        /*
    $this->load->view('head');
    $this->load->view('returnData', array('iName' => $data));
    $this->load->view('footer');
     */
    }
    public function DBTest()
    {
        $this->load->database();
    }
}
