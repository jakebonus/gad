        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dispense</h2>
                    <div class="clearfix"></div>
                  </div>
                  <form id="frm_dispense" autocomplete="off" method="post" class="fv-form fv-form-bootstrap">
                    <input type="hidden" class="" id="tr_qty1" name="tr_qty1">

                    <div class="row">
                      <div class="form-group col-md-3 col-sm-3 col-xs-6">
                        <label class="control-label">Location <sup><span>Current location</span></sup></label>
                        <p id="lbl-location" class="form-control input-sm c-disabled"><?php echo $this->session->userdata('location'); ?></p>
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
                              <option value="N/A">N/A</option>
                              <option value="TB">TB</option>
                              <option value="DENGUE">DENGUE</option>
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
                      <div class="form-group col-md-3 col-sm-6 col-xs-6">
                        <label class="control-label">Fernandino Card ID</label>
                        <input type="text" class="form-control input-sm" id="tr_fc_id" name="tr_fc_id" maxlength="20">
                      </div>
                      <div class="form-group col-md-2 col-sm-6 col-xs-6">
                        <label class="control-label">Senior Citizen ID</label>
                        <input type="text" class="form-control input-sm" id="tr_sc_id" name="tr_sc_id" maxlength="20">
                      </div>
                      <div class="form-group col-md-3 col-sm-4 col-xs-12">
                        <label class="control-label">FirstName <span>*</span></label>
                        <input type="text" class="form-control input-sm" id="tr_fname" name="tr_fname" required="" maxlength="20">
                      </div>
                      <div class="form-group col-md-2 col-sm-4 col-xs-12">
                        <label class="control-label">MiddleName</label>
                        <input type="text" class="form-control input-sm" id="tr_mname" name="tr_mname" maxlength="15">
                      </div>
                      <div class="form-group col-md-2 col-sm-4 col-xs-12">
                        <label class="control-label">LastName <span>*</span></label>
                        <input type="text" class="form-control input-sm" id="tr_lname" name="tr_lname" required="" maxlength="20">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-3 col-sm-3 col-xs-6">
                        <label class="control-label">Type <span>*</span></label>
                        <select class="form-control input-sm" id="tr_type" name="tr_type" required="">
                          <option value="WALK-IN">WALK-IN</option>
                          <option value="MIDWIFE">MIDWIFE</option>
                          <option value="CITY-EMPLOYEE">CITY-EMPLOYEE</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3 col-sm-3 col-xs-6">
                        <label class="control-label lbl-bgry">Brgy <span>*</span></label>
                        <select class="form-control input-sm" id="tr_brgy" name="tr_brgy" required="">
                          <option value="">- - -</option>
                          <option value="Alasas">Alasas</option>
                          <option value="Baliti">Baliti</option>
                          <option value="Bulaon">Bulaon</option>
                          <option value="Calulut">Calulut</option>
                          <option value="Dela Paz Norte">Dela Paz Norte</option>
                          <option value="Dela Paz Sur">Dela Paz Sur</option>
                          <option value="Del Carmen">Del Carmen</option>
                          <option value="Del Pilar">Del Pilar</option>
                          <option value="Del Rosario">Del Rosario</option>
                          <option value="Dolores">Dolores</option>
                          <option value="Juliana">Juliana</option>
                          <option value="Lara">Lara</option>
                          <option value="Lourdes">Lourdes</option>
                          <option value="Maimpis">Maimpis</option>
                          <option value="Magliman">Magliman</option>
                          <option value="Malino">Malino</option>
                          <option value="Malpitic">Malpitic</option>
                          <option value="Pandaras">Pandaras</option>
                          <option value="Panipuan">Panipuan</option>
                          <option value="Pulung Bulo">Pulung Bulo</option>
                          <option value="Quebiawan">Quebiawan</option>
                          <option value="Saguin">Saguin</option>
                          <option value="San Agustin">San Agustin</option>
                          <option value="San Felipe">San Felipe</option>
                          <option value="San Isidro">San Isidro</option>
                          <option value="San Jose">San Jose</option>
                          <option value="San Juan">San Juan</option>
                          <option value="San Nicolas">San Nicolas</option>
                          <option value="San Pedro Cutud">San Pedro Cutud</option>
                          <option value="Santa Lucia">Santa Lucia</option>
                          <option value="Santa Teresita">Santa Teresita</option>
                          <option value="Santo Nino">Santo Nino</option>
                          <option value="Santo Rosario">Santo Rosario</option>
                          <option value="Sindalan">Sindalan</option>
                          <option value="Telabastagan">Telabastagan</option>
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-3 col-sm-3 col-xs-12">
                        <label class="control-label">Dispense by <span>*</span></label>
                        <input type="text" class="form-control input-sm" id="tr_by" name="tr_by" value="<?php echo $this->session->userdata('name'); ?>" required="" maxlength="20">
                      </div>
                      <div class="form-group col-md-3 col-sm-3 col-xs-12">
                        <label class="control-label">Date <span>*</span> <sup>YYYY-MM-DD</sup></label>
                        <input type="text" class="form-control input-sm" id="tr_date" name="tr_date" value="<?php echo date("Y-m-d")?>" required="">
                      </div>
                      <div class="form-group col-md-3 col-sm-3 col-xs-12">
                        <label class="control-label">RIS No.</label>
                        <input type="text" class="form-control input-sm" id="tr_rs_no" name="tr_rs_no" readonly="" maxlength="20">
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
                                <label class="control-label">Location <sup><span>Current location</span></sup></label>
                                <div class="form-control input-sm"><?php echo $this->session->userdata('location'); ?></div>
                              </div>
                              <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label><strong>Fund:</strong> </label>
                                <p class="form-control input-sm"></p>
                              </div>
                              <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label><strong>Program:</strong> </label>
                                <p class="form-control input-sm"></p>
                              </div>

                            </div>
                            <div class="row">
                              <div class="form-group col-md-3 col-sm-4 col-xs-6">
                                <label><strong>Fernandino Card ID:</strong></label>
                                <p class="form-control input-sm"></p>
                              </div>
                              <div class="form-group col-md-3 col-sm-4 col-xs-6">
                                <label><strong>Senior Citizen ID:</strong></label>
                                <p class="form-control input-sm"></p>
                              </div>
                              <div class="form-group col-md-6 col-sm-4 col-xs-12">
                                <label><strong>Name:</strong></label>
                                <p class="form-control input-sm"></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-3 col-sm-3 col-xs-6">
                                <label><strong>Type:</strong></label>
                                <p class="form-control input-sm"></p>
                              </div>
                              <div class="form-group col-md-9 col-sm-9 col-xs-6">
                                <label><strong class="mlbl-bgry">Brgy:</strong></label>
                                <p class="form-control input-sm"></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label><strong>Dispense by:</strong></label>
                                <p class="form-control input-sm"></p>
                              </div>
                              <div class="form-group col-md-4 col-sm-4 col-xs-6">
                                <label><strong>Date:</strong> <sup>YYYY-MM-DD</sup></label>
                                <p class="form-control input-sm"></p>
                              </div>
                              <div class="form-group col-md-4 col-sm-4 col-xs-6">
                                <label><strong>RIS No.:</strong></label>
                                <p class="form-control input-sm"></p>
                              </div>
                            </div>
                            <div class="draft-table"></div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn-close btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="btn_frm_dispense" class="buttonNext btn btn-success">Save</button>
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
                            <p>Issue Slip</p>
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
                              <td colspan="3">&nbsp;<span class="destination" style="text-transform: uppercase;"></span></td>
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

                    <div class="modal fade" id="mdl-popup" role="dialog" data-keyboard="true">
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
