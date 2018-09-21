        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">

                    <h2>Allocation</h2>
                    <div class="clearfix"></div>
                  </div>
                  <form id="frm_allocation" autocomplete="off" method="post" class="fv-form fv-form-bootstrap">
                    <input type="hidden" class="" id="tr_qty1" name="tr_qty1">

                    <div class="row">
                      <div class="form-group col-md-3 col-sm-3 col-xs-6">
                        <label class="control-label">Source <span>*</span></label>
                        <select class="form-control input-sm" id="tr_location" name="tr_location" required="" disabled="">
                          <option value="">loading...</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3 col-sm-3 col-xs-6">
                        <label class="control-label">Fund <span>*</span></label>
                        <select class="form-control input-sm" id="tr_funding" name="tr_funding" required="" disabled="">
                          <option value="">loading...</option>
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="row">
                          <div class="form-group col-md-10 col-sm-10 col-xs-10">
                            <label class="control-label">Program</label>
                            <select class="form-control input-sm" id="tr_program" name="tr_program" disabled="">
                              <option value="">loading...</option>
                            </select>
                          </div>
                          <div class="form-group col-md-2 col-sm-2 col-xs-2">
                            <label class="control-label">&nbsp; &nbsp; &nbsp;</label>
                            <button type="button" id="btn_cancel_trans" class="hidden input-sm btn btn-warning">Cancel</button>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="form-group col-md-3 col-sm-3 col-xs-6">
                        <label class="control-label">Destination <span>*</span></label>
                        <select class="form-control input-sm" id="tr_destination" name="tr_destination" required="">
                          <option value="">- - -</option>
                          <option value="ABTC">ABTC</option>
                          <option value="ALASAS STORAGE">ALASAS STORAGE</option>
                          <option value="BS 1 - SINDALAN">BS 1 - SINDALAN</option>
                          <option value="BS 2 - NORTHVILLE">BS 2 - NORTHVILLE</option>
                          <option value="BS 3 - SAN JOSE">BS 3 - SAN JOSE</option>
                          <option value="BS 4 - SAN NICOLAS">BS 4 - SAN NICOLAS</option>
                          <option value="BS 5 - SAN AGUSTIN">BS 5 - SAN AGUSTIN</option>
                          <option value="CHO MAIN">CHO MAIN</option>
                          <option value="CITY COLLEGE">CITY COLLEGE</option>
                          <option value="NORTHVILLE STORAGE">NORTHVILLE STORAGE</option>
                          <option value="RHU 1">RHU 1</option>
                          <option value="RHU 2">RHU 2</option>
                          <option value="RHU 3">RHU 3</option>
                          <option value="RHU 4">RHU 4</option>
                          <option value="RHU 5">RHU 5</option>
                          <option value="HEMS">HEMS</option>
                          <option value="EHSD">EHSD</option>
                          <option value="SOCIAL HYGIENE">SOCIAL HYGIENE</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3 col-sm-3 col-xs-6">
                        <label class="control-label">Received by <span>*</span></label>
                        <input type="text" class="form-control input-sm" id="tr_by" name="tr_by" required="" maxlength="20">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-3 col-sm-3 col-xs-12">
                        <label class="control-label">Allocate by <span>*</span></label>
                        <input type="text" class="form-control input-sm" id="tr_allocateby" name="tr_allocateby" value="<?php echo $this->session->userdata('name'); ?>" required="" maxlength="20">
                      </div>
                      <div class="form-group col-md-3 col-sm-3 col-xs-12">
                        <label class="control-label">Date <span>*</span> <sup>YYYY-MM-DD</sup></label>
                        <input type="text" class="form-control input-sm" id="tr_date" name="tr_date" value="<?php echo date("Y-m-d")?>" required="">
                      </div>
                      <div class="form-group col-md-3 col-sm-3 col-xs-12">
                        <label class="control-label">RIS No.</label>
                        <input type="text" class="form-control input-sm" id="tr_rs_no" name="tr_rs_no" readonly="">

                      </div>
                    </div>

                    <div class="ln_solid"></div>

                    <div class="row">
                      <div class="form-group form-group-add col-md-3 col-sm-3 col-xs-12">
                        <label class="control-label">Medicine <span>* <sup class="r"></sup></span></label>
                        <select class="form-control input-sm" id="medicine" name="medicine" disabled="">
                          <option value="">- - -</option>
                        </select>
                      </div>
                      <div class="form-group form-group-add col-md-3 col-sm-3 col-xs-12">
                        <label class="control-label">Lot No <span>*</span> <sup>[m.d.yy]</sup></label>
                        <select class="form-control input-sm" id="tr_lot_no" name="tr_lot_no" disabled="">
                          <option value="">- - -</option>
                        </select>
                      </div>
                      <div class="form-group form-group-add col-md-2 col-sm-2 col-xs-12">
                        <label class="control-label">Package <span>*</span></label>
                        <select class="form-control input-sm" id="unit" name="unit" disabled="">
                          <option value="">- - -</option>
                        </select>
                      </div>
                      <div class="p-qty form-group form-group-add col-md-2 col-sm-2 col-xs-12">
                        <label class="control-label">Qty <span>*</span> <span class="remarks"></span></label>
                        <input type="text" class="form-control input-sm text-right" id="tr_qty" name="tr_qty" disabled="" maxlength="11">
                      </div>
                      <div class="form-group col-lg-1 col-md-2 col-sm-2 col-xs-12">
                        <label class="control-label hidden-xs">&nbsp; &nbsp; &nbsp;</label>
                        <a class="input-sm btn btn-primary" id="btn_add_medicine"><i class="fa fa-plus"></i> ADD</a>
                      </div>

                      <div class="tbl-medicine-container">
                        <div class="col-md-12">
                          <table id="tbl_medicine" class="display-none cell-border compact hover width-full no-footer dataTable">
                            <thead>
                              <tr>
                                <td width="20"></td>
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
                    </div>

                    <div class="actionBar">
                      <button type="button" id="btn_cancel" class="buttonFinish btn btn-default">Cancel</button>
                      <button type="submit" id="draftButton" class="btn btn-success">Save</button>
                    </div>

                    <div class="modal fade" id="mdl-save-draft" role="dialog" data-backdrop="static" data-keyboard="false">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Please check before saving!</h4>
                          </div>
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
                                <label><strong>Date:</strong> <sup>YYYY-MM-DD</sup></label>
                                <p class="form-control input-sm"></p>
                              </div>
                              <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label><strong>RIS No.:</strong></label>
                                <p class="form-control input-sm"></p>
                              </div>
                            </div>
                            <div class="draft-table"></div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn-close btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="btn_frm_allocation" class="buttonNext btn btn-success">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal fade" id="mdl-print" role="dialog" data-backdrop="static" data-keyboard="false">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Print</h4>
                          </div>
                          <div class="modal-body">
                            <p>Requisition and Issue Slip</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" id="btn_cancel_print" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="button" id="btn_print" class="buttonNext btn btn-success" data-dismiss="modal">Yes</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal fade" id="mdl-previewprint" role="dialog" data-backdrop="static" data-keyboard="false">
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
                                  <strong><font size="3" face="Serif">REQUISITION AND ISSUE SLIP</font></strong>
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
                              <td colspan="3"><center><strong><span class="tr_allocateby"></span></strong></center></td>
                              <td colspan="3"><center><strong><span class="tr_recvby" style="text-transform: uppercase;"></span></strong></center></td>
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

                    <div class="modal fade" id="mdl-popup" role="dialog" data-backdrop="static" data-keyboard="false">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">No Available Stocks for: </h4>
                          </div>
                          <div class="modal-body">
                            <p><strong>Source:</strong> <span></span></p>
                            <p><strong>Fund:</strong> <span></span></p>
                            <p><strong>Program:</strong> <span></span></p>
                            <div class="text-center">Kindly Select Another.</div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" id="btn-mdl-popup" class="btn btn-success" data-dismiss="modal">Ok</button>
                          </div>
                        </div>
                      </div>
                    </div>


                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->
