        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Inventori IN - F i l t e r</h2>
                    <ul class="nav navbar-right panel_toolbox refresh">
                      <li><a class="_refresh" data-toggle="tooltip" data-placement="top" title="Reset"><i class="fa fa-refresh"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="row filter">

                    <div class="form-group col-xs-12" id="filter_col1" data-column="0">
                      <label class="control-label">RIS NO
                      </label>
                      <select class="form-control input-sm column_filter" id="col0_filter" disabled="">
                        <option value="">loading...</option>
                     </select>
                   </div>
                   <div class="form-group col-xs-12" id="filter_col2" data-column="1">
                    <label class="control-label">SOURCE
                    </label>
                    <select class="form-control input-sm column_filter" id="col1_filter" disabled="">
                      <option value="">loading...</option>
                    </select>
                  </div>
                  <div class="form-group col-xs-12" id="filter_col3" data-column="2">
                    <label class="control-label">DESTINATION
                    </label>
                    <select class="form-control input-sm column_filter" id="col2_filter" disabled="">
                      <option value="">loading...</option>
                    </select>
                  </div>
                  <div class="form-group col-xs-12" id="filter_col4" data-column="3">
                    <label class="control-label">FUND</label>
                    <select class="form-control input-sm column_filter" id="col3_filter" disabled="">
                      <option value="">loading...</option>
                    </select>
                  </div>
                  <div class="form-group col-xs-12" id="filter_col5" data-column="4">
                    <label class="control-label">PROGRAM</label>
                    <select class="form-control input-sm column_filter" id="col4_filter" disabled="">
                      <option value="">loading...</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
                  <table class="cell-border compact hover width-full" id="dt_in_record" cellspacing="0" width="100%">
                   <thead>
                    <tr>
                     <th width="" style="min-width:70px;">RIS NO</th>
                     <th style="min-width:140px;">SOURCE</th>
                     <!-- <th style="min-width:200px;">SOURCE</th> -->
                     <th style="min-width:200px;">DESTINATION</th>
                     <th width="">FUND</th>
                     <th style="min-width:200px;">PROGRAM</th>
                   </tr>
                 </thead>
               </table>
             </div>
           </div>
         </div>

         <div class="modal fade" id="mdl-print-draft" role="dialog" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">


                <div class="row">
                  <div class="form-group col-md-4 col-sm-4 col-xs-12">
                    <label><strong>Source:</strong></label>
                    <p class="form-control input-sm"></p>
                  </div>
                  <div class="form-group col-md-4 col-sm-4 col-xs-12">
                    <label><strong>Fund:</strong> </label>
                    <p class="form-control input-sm"></p>
                  </div>
                  <div class="form-group col-md-4 col-sm-4 col-xs-12">
                    <label><strong>Program:</strong> </label>
                    <p class="form-control input-sm"></p>
                  </div>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label><strong>Destination:</strong></label>
                    <p class="form-control input-sm"></p>
                  </div>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label><strong>Received by:</strong></label>
                    <p class="form-control input-sm"></p>
                  </div>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label><strong>Allocate by:</strong></label>
                    <p class="form-control input-sm"></p>
                  </div>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label><strong>Date:</strong> <sup>M/D/YYYY</sup></label>
                    <p class="form-control input-sm"></p>
                  </div>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label><strong>RIS No.:</strong></label>
                    <p class="form-control input-sm"></p>
                  </div>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label><strong>Added by:</strong></label>
                    <p id="lbl-addedby" class="form-control input-sm"></p>
                  </div>
                </div>

                <div class="draft-table">
                  <table id="tbl_print_preview" class="cell-border compact hover width-full no-footer dataTable">
                    <thead>
                      <tr>
                        <td>Medicine</td>
                        <td>Lot No</td>
                        <td>Package</td>
                        <td>Qty</td>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn-close btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" id="btn_record_print" class="buttonNext btn btn-success" data-dismiss="modal">Print</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="mdl-recordprint" role="dialog" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-body">
                <div class="modal-footer padding-right">
                  <button type="button" id="btn_cancel_print" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <button onclick="printContent('tbl-print')" type="button" id="btn_dialogprint" class="buttonNext btn btn-success">Print</button>
                </div>

                <style>
                  table{width:100%}b, strong {font-weight:700}table, th, td {border: 1px solid black;} tr.group{background-color: #d8d8d8;margin-top:10px;padding-top:10px} .img-logo {position:absolute;left:calc(50% - 200px);top:11px}.th-head{position:relative;padding:10px 0}p.p-version{position:absolute;top:0;right:3px;font-size:9px}.version{position:relative}.p_risno{position:absolute;right:6px;top:3px}
                </style>
                <table id="tbl-print">
                  <tr>
                    <th colspan="7" class="th-head">
                      <img class="img-logo" src="<?php echo base_url('build/images/logo.png'); ?>" width="55"/>
                      <center>
                        <strong><font size="2" face="Sans-serif">CITY OF SAN FERNANDO, PAMPANGA</font></strong><br>
                        City Health Office<br>
                        <strong><font size="3" face="Serif">ISSUE SLIP</font></strong>
                      </center>
                      <div class="p_risno"><font size="2" face="Sans-serif"></font></div>
                    </th>
                  </tr>
                  <tr>
                    <td><strong>Source: </strong></td>
                    <td colspan="3">&nbsp;<span class="source"></span></td>
                    <td colspan="3" rowspan="2"><strong>Date: </strong><span class="date"></span></td>
                  </tr>
                  <tr>
                    <td width="100"><strong>Destination: </strong></td>
                    <td colspan="3">&nbsp;<span class="destination"></span></td>
                  </tr>
                  <tr>
                    <td colspan="7"><center><strong><font size="4" face="Serif"><i>Requisition</i></font></strong></center></td>
                  </tr>
                  <tr class="title">
                    <td><center><strong>EXP. DATE</strong></td>
                    <td colspan="2" width="250"><center><strong>MEDICINE</strong></center></td>
                    <td width="100"><center><strong>PACKAGE</strong></center></td>
                    <td width="70" align="right" class="text-right"><center><strong>QTY</strong></center></td>
                    <td colspan="2" width="200"><center><strong>REMARKS</strong></center></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="2"></td>
                    <td></td>
                    <td></td>
                    <td colspan="2"></td>
                  </tr>
                  <tr>
                    <td><strong>Purpose:</strong></td>
                    <td colspan="6"></td>
                  </tr>
                  <tr>
                    <td colspan="7">&nbsp;</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td colspan="3"><center><strong>REQUESTED BY:</strong></center></td>
                    <td colspan="3"><center><strong>Post Validated By:</strong></center></td>
                  </tr>
                  <tr>
                    <td>Signature:</td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                  </tr>
                  <tr>
                    <td>Printed Name:</td>
                    <!-- requested by-->
                    <td colspan="3"><center><strong><span class="tr_by"></span></strong></center></td>
                    <td colspan="3"><center><strong>Eloisa S. Aquino, MD., MPH</strong></center></td>
                  </tr>
                  <tr>
                    <td>Designation:</td>
                    <td colspan="3"></td>
                    <td colspan="3"><center><i>City Health Office</i></center></td>
                  </tr>
                  <tr>
                    <td>Date:</td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td colspan="3"><strong><center>Issued By:</center></strong></td>
                    <td colspan="3"><center><strong>Received by:</strong></center></td>
                  </tr>
                  <tr>
                    <td>Signature:</td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                  </tr>
                  <tr>
                    <td>Printed Name:</td>
                    <!-- issued by-->
                    <td colspan="3"><center><strong><span class="tr_allocateby"></span></strong></center></td>
                    <td colspan="3"></td>
                  </tr>
                  <tr>
                    <td>Designation:</td>
                    <td colspan="3"><center><i>OIC - Pharmacist</i></center></td>
                    <td colspan="3"></td>
                  </tr>
                  <tr>
                    <td>Date:</td>
                    <td colspan="3"></td>
                    <td colspan="3" class="version"><p class="p-version"><font color="darkgray" size="1" face="Sans-serif"><?php echo "PHARMAv".VERSION."-".$this->session->userdata('accountId'); ?></font></p></td>
                  </tr>
                </table>

              </div>

            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
  <!-- /page content -->
