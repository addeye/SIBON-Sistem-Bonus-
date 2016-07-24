<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 21/04/2016
 * Time: 21:18
 */
class Normalisasi
{
    private $kinerja;
    private $bobot;
    private $kriteria;
    private $customer;
    private $rewardModel;

    public function __construct()
    {
        $this->bobot = new Bobot();
        $this->kinerja = new Kinerja();
        $this->customer = new Customer();
        $this->rewardModel = new Reward();

        $krt = array();
        foreach($this->bobot->getAll() as $b)
        {
            $krt[] = $b['bobot']/100;
        }

        $this->kriteria = $krt;
    }
    public function benefitcost($pembilang,$pembagi)
    {
        $result = $pembilang/$pembagi;
        return $result;
    }

    public function getHeightValue($data= array())
    {
        $result = max($data);
        return $result;
    }

    public function getLowValue($data= array())
    {
        $result = min($data);
        return $result;
    }

    public function prosentase($kriteria,$bencost)
    {
        $result = $bencost*$kriteria;
        return $result;
    }

    public function metodeSaw($idpegawai,$bulan,$tahun)
    {
        $row = $this->kinerja->getAllByBulanTahun($bulan,$tahun);

        //step 1
        foreach($row as $data)
        {
            $lamaKerja[]=countDate($data['tgl_masuk']);
            $jmlAbsensi[]=$data['jml_absensi'];
            $kejujuran[]=$data['kejujuran'];
            $kualitasKerja[]=$data['kualitas_kerja'];
            $cuti[]=$data['cuti']+1;
            $kedisiplinan[]=$data['kedisiplinan'];
            $sikap[]=$data['sikap'];
            $target[]=$data['target'];
            $cus[]= $this->customer->getCustomerByBulanTahun($data['bulan'],$data['tahun'],$data['id_pegawai']);
            $reward[]= $this->rewardModel->getDataWherePegawai($data['bulan'],$data['tahun'],$data['id_pegawai'])['total'];
        }

        //step2
        foreach($row as $data)
        {
            $blamaKerja[] = countDate($data['tgl_masuk'])/$this->getHeightValue($lamaKerja);
            $bjmlAbsensi[] = $data['jml_absensi']/$this->getHeightValue($jmlAbsensi);
            $bkejujuran[] = $data['kejujuran']/$this->getHeightValue($kejujuran);
            $bkualitasKerja[] = $data['kualitas_kerja']/$this->getHeightValue($kualitasKerja);
            $bcuti[] = $this->getLowValue($cuti)/($data['cuti']+1);
            $bkedisiplinan[] = $data['kedisiplinan']/$this->getHeightValue($kedisiplinan);
            $bsikap[] = $data['sikap']/$this->getHeightValue($sikap);
            $btarget[] = $data['target']/$this->getHeightValue($target);
            $bcus[] = $this->customer->getCustomerByBulanTahun($data['bulan'],$data['tahun'],$data['id_pegawai'])/$this->getHeightValue($cus);
            $breward[] = $this->rewardModel->getDataWherePegawai($data['bulan'],$data['tahun'],$data['id_pegawai'])['total']/$this->getHeightValue($reward);
        }

        //step3
        $a=0;
        foreach($row as $data)
        {
            $sawNormalisasi[$a][] = $this->prosentase($this->kriteria[0],$blamaKerja[$a]);
            $sawNormalisasi[$a][] = $this->prosentase($this->kriteria[1],$bjmlAbsensi[$a]);
            $sawNormalisasi[$a][] = $this->prosentase($this->kriteria[2],$bkejujuran[$a]);
            $sawNormalisasi[$a][] = $this->prosentase($this->kriteria[3],$bkualitasKerja[$a]);
            $sawNormalisasi[$a][] = $this->prosentase($this->kriteria[4],$bcuti[$a]);
            $sawNormalisasi[$a][] = $this->prosentase($this->kriteria[5],$bkedisiplinan[$a]);
            $sawNormalisasi[$a][] = $this->prosentase($this->kriteria[6],$bsikap[$a]);
            $sawNormalisasi[$a][] = $this->prosentase($this->kriteria[7],$btarget[$a]);
            $sawNormalisasi[$a][] = $this->prosentase($this->kriteria[8],$bcus[$a]);
            $sawNormalisasi[$a][] = $this->prosentase($this->kriteria[9],$breward[$a]);
            $a++;
        }

        $a=0;
        foreach($row as $data)
        {
            $sawFinal[$data['id_pegawai']] = array_sum($sawNormalisasi[$a]);
            $a++;
        }

        if(isset($sawFinal))
        {
            return $sawFinal[$idpegawai];
        }

        return 0;
    }
}