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
  </style>
  <page>
    <div class="content">
      <div class="head">รายงานผู้สมัครสมาชิก</div>
      <table>
        <tr class="center">
          <th width="40">ลำดับ.</th>
          <th width="250">ชื่อ-นามสกุล</th>
          <th width="250">สร้างเมื่อ</th>
          <th width="150">สถานะ</th>
        </tr>
        <tr>
          <td class="center" width="35">1</td>
          <td width="245">นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">2</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">3</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">4</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">5</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">6</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">7</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">8</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">9</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center" width="35">10</td>
          <td width="245">นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">11</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">12</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">13</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">14</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">15</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">16</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">17</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">18</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">19</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
        </tr>
        <tr>
          <td class="center">20</td>
          <td>นาย จิระศักดิ์ ชวัญใจ</td>
          <td width="245">2017-01-24 19:10:58</td>
          <td width="145">ยังไม่ชำระเงิน</td>
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