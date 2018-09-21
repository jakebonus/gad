<!-- page content -->
<?php
  // foreach ($org as $o) {
  //   $brgyname = $o->brgyname;
  //   $datefound = $o->datefound;
  //   $name = $o->name;
  // }
?>
<div class="right_col page-masterlist" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="x_panel">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                <button class="btn btn-sm btn-primary" type="button" onclick="printDiv(printthis)"><i class="fa fa-print"></i> Print</button>
            </div>
          </div>
          <div id="printthis">

            <div>
              <div id="orginfo" style="max-width: 800px;font-size: 12px;"></div>
              <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;}
                .tg td{font-family:Arial, sans-serif;font-size:12px;padding:3px 3px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
                .tg th{font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:3px 3px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
                .tg .tg-kr94{font-size:12px;text-align:center}
                .tg .tg-k6pi{font-size:12px}
                .tg .tg-p12b{font-size:12px;font-family:"Arial", Monaco, monospace !important;;text-align:center}
                .tg .tg-rg0h{font-size:12px;text-align:center;vertical-align:center;}
                .tg .tg-dx8v{font-size:12px;vertical-align:center}
                </style>
                <table class="tg" style="table-layout: fixed; width: 800px">
                  <colgroup>
                  <col style="width: 30px">
                  <col style="width: 300px">
                  <col style="width: 80px">
                  <col style="width: 75px">
                  <col style="width: 75px">
                  <col style="width: 75px">
                  <col style="width: 75px">
                  <col style="width: 75px">
                </colgroup>
                  <tr>
                    <th class="tg-kr94" colspan="2" rowspan="2">OFFICER</th>
                    <th class="tg-p12b" rowspan="2">COMMITTEE/<br>HEAD/<br>MEMBERS</th>
                    <th class="tg-rg0h" rowspan="2">SEA-K</th>
                    <th class="tg-rg0h" rowspan="2">TRAININGS</th>
                    <th class="tg-rg0h" rowspan="2">OTHER<br>TRAININGS</th>
                    <th class="tg-rg0h" colspan="2">W/ LIVELIHOOD<br>(Peanut Butter)</th>
                  </tr>
                  <tr>
                    <td class="tg-rg0h">Production</td>
                    <td class="tg-rg0h">Marketing</td>
                  </tr>
                      <tr id="pres"></tr>
                      <tr id="vpres"></tr>
                      <tr id="sec"></tr>
                      <tr id="treas"></tr>
                      <tr id="auditor"></tr>
                      <tr id="pleaders"><td  colspan="8"> PUROK LEADERS </td></tr>
                      <tr id="committees"><td  colspan="8">COMMITTEES</td></tr>
                      <tr id="education"><td  colspan="8">EDUCATION:</td></tr>
                      <tr id="livelihood"><td  colspan="8">LIVELIHOOD:</td></tr>
                      <tr id="socialservices"><td  colspan="8">EDUCATION:</td></tr>
                      <tr id="finance"><td  colspan="8">FINANCE:</td></tr>
                      <tr id="members"><td  colspan="8">MEMBERS:</td></tr>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
