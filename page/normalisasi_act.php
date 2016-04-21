<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 22/04/2016
 * Time: 1:25
 */

$model = new Kinerja();
$customer = new Customer();
$rewardModel = new Reward();
$normalisasi = new Normalisasi();

$kriteria = array(
    0.1,
    0.1,
    0.05,
    0.05,
    0.05,
    0.2,
    0.05,
    0.05,
    0.05,
    0.3);

$row = $model->getAllByBulanTahun('januari','2016');

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
        $cus[]= $customer->getCustomerByBulanTahun($data['bulan'],$data['tahun'],$data['id_pegawai']);
        $reward[]= $rewardModel->getDataWherePegawai($data['bulan'],$data['tahun'],$data['id_pegawai'])['total'];
}

foreach($row as $data)
{
        $blamaKerja[] = countDate($data['tgl_masuk'])/$normalisasi->getHeightValue($lamaKerja);
        $bjmlAbsensi[] = $data['jml_absensi']/$normalisasi->getHeightValue($jmlAbsensi);
        $bkejujuran[] = $data['kejujuran']/$normalisasi->getHeightValue($kejujuran);
        $bkualitasKerja[] = $data['kualitas_kerja']/$normalisasi->getHeightValue($kualitasKerja);
        $bcuti[] = $normalisasi->getLowValue($cuti)/($data['cuti']+1);
        $bkedisiplinan[] = $data['kedisiplinan']/$normalisasi->getHeightValue($kedisiplinan);
        $bsikap[] = $data['sikap']/$normalisasi->getHeightValue($sikap);
        $btarget[] = $data['target']/$normalisasi->getHeightValue($target);
        $bcus[] = $customer->getCustomerByBulanTahun($data['bulan'],$data['tahun'],$data['id_pegawai'])/$normalisasi->getHeightValue($cus);
        $breward[] = $rewardModel->getDataWherePegawai($data['bulan'],$data['tahun'],$data['id_pegawai'])['total']/$normalisasi->getHeightValue($reward);
 }

$a=0;
foreach($row as $data){
        $sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[0],$blamaKerja[$a]);
        $sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[1],$bjmlAbsensi[$a]);
        $sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[2],$bkejujuran[$a]);
        $sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[3],$bkualitasKerja[$a]);
        $sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[4],$bcuti[$a]);
        $sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[5],$bkedisiplinan[$a]);
        $sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[6],$bsikap[$a]);
        $sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[7],$btarget[$a]);
        $sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[8],$bcus[$a]);
        $sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[9],$breward[$a]);
$a++;}

$a=0;
foreach($row as $data){
    $sawFinal[$data['id_pegawai']] = array_sum($sawNormalisasi[$a]);
$a++;}

$terbesar = max($sawFinal);

$idpegawai = array_search($terbesar, $sawFinal);


