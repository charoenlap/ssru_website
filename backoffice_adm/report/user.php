<?php 
  require_once('../../required/tcpdf/html2pdf.class.php');
  header('Content-Type: text/html; charset=utf-8');
  ob_clean();
  $content = '
  <style>
    .content {
      padding: 40px 10px 40px 6px;
      font-size: 16px;
      width: 734px;
      margin-left: 30px;
      word-wrap: break-word;
    }
    .border{
      border: 1px solid black;
      width:630px;
      height:1000px;
      padding:10px 10px 10px 10px;
    }
    .border{
      border: 1px solid black;
      width:630px;
      height:1000px;
      padding:10px 10px 10px 10px;
    }
    .head{
      text-align:center;
      font-size:24px;
    }
    table{
      border-collapse: collapse;
      margin-top:20px;
    }
    table tr td{
      border:1px solid black;
      padding:5px 0px 5px 5px;
    }
    table tr th{
      border:1px solid black;
      padding:5px 0px 5px;
    }
    .center{
      text-align:center;
    }
    .contentbox {
      width:400px;
    }
  </style>
  <page>
    <div class="content">
      <div class="head">รายงานรายละเอียดสมาชิก</div>
      <table>
        <tr class="center">
          <th width="200">หัวข้อ</th>
          <th width="515">รายละเอียด</th>
        </tr>
        <tr>
          <td>ชื่อ :</td>
          <td>จิระศักดิ์</td>
        </tr>
        <tr>
          <td>นามสกุล :</td>
          <td>ขวัญใจ</td>
        </tr>
        <tr>
          <td>เบอร์โทรศัพท์ :</td>
          <td>02-xxx-xxxx</td>
        </tr>
        <tr>
          <td>เบอร์มือถือ :</td>
          <td>090-xxx-xxxx</td>
        </tr>
        <tr>
          <td>Email :</td>
          <td>m@gmail.com</td>
        </tr>
        <tr >
          <td>เลขที่ :</td>
          <td></td>
        </tr>
        <tr >
          <td>หมู่ :</td>
          <td></td>
        </tr>
        <tr >
          <td>ถนน :</td>
          <td></td>
        </tr>
        <tr >
          <td>ตำบล :</td>
          <td></td>
        </tr>
        <tr >
          <td>อำเภอ :</td>
          <td></td>
        </tr>
        <tr >
          <td>จังหวัด :</td>
          <td></td>
        </tr>
        <tr >
          <td>รหัสไปรษณีย์ :</td>
          <td></td>
        </tr>
      </table>
    </div>
  </page>
';
  $format =array(210,297);
  $paper = 'P';

  $html2pdf = new HTML2PDF($paper,$format, 'en', true, 'UTF-8', array(0, 0, 0, 0));
  $html2pdf->setDefaultFont('freeserif'); //add this line
  $html2pdf->pdf->SetDisplayMode('fullpage');
  $html2pdf->WriteHTML($content);
  $html2pdf->Output();
 ?>