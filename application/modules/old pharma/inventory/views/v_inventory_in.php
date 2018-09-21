        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Inventory - IN</h2>
                    <div class="clearfix"></div>
                  </div>
                  <form id="frm_in" autocomplete="off" novalidate="novalidate" class="fv-form fv-form-bootstrap">
                    <div class="row">
                      <div class="form-group col-md-3 col-sm-3 col-xs-6">
                       <label class="control-label">Add to <span>*</span></label>
                       <select class="form-control input-sm" id="tr_location" name="tr_location" required="">
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
                  </div>

                  <div class="row">
                    <div class="form-group col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label">Fund <span>*</span></label>
                      <select class="form-control input-sm" id="tr_funding" name="tr_funding" required="">
                        <option value="">- - -</option>
                        <option value="CSFP">CDRRMC</option>
                        <option value="CSFP">CSFP</option>
                        <option value="DOH">DOH</option>
                        <option value="PHILHEALTH">PHILHEALTH</option>
                        <option value="PHO">PHO</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-2 col-xs-12">
                      <label class="control-label">Program</label>
                      <select class="form-control input-sm" id="tr_program" name="tr_program">
                        <option value="N/A">N/A</option>
                        <option value="ABTC">ABTC</option>
                        <option value="BIRTHING STATION">BIRTHING STATION</option>
                        <option value="CARI">CARI</option>
                        <option value="CDD">CDD</option>
                        <option value="CVD">CVD</option>
                        <option value="DENGUE">DENGUE</option>
                        <option value="DENTAL">DENTAL</option>
                        <option value="DONATED">DONATED</option>
                        <option value="DISASTER">DISASTER</option>
                        <option value="EPI">EPI</option>
                        <option value="GENERAL MEDICAL SERVICES">GENERAL MEDICAL SERVICES</option>
                        <option value="LABORATORY">LABORATORY</option>
                        <option value="LEPTOSPIROSIS">LEPTOSPIROSIS</option>
                        <option value="MALARIA">MALARIA</option>
                        <option value="MATERNAL AND CHILD HEALTHCARE">MATERNAL AND CHILD HEALTHCARE</option>
                        <option value="PSORIASIS">PSORIASIS</option>
                        <option value="SOCIAL HYGINE">SOCIAL HYGINE</option>
                        <option value="TB">TB</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-2 col-xs-4">
                      <label class="control-label">SI No.</label>
                      <input type="text" class="form-control input-sm" id="tr_si_no" name="tr_si_no" maxlength="20">
                    </div>
                    <div class="form-group col-md-2 col-sm-2 col-xs-4">
                     <label class="control-label">DR No.</label>
                     <input type="text" class="form-control input-sm" id="tr_dr_no" name="tr_dr_no" maxlength="20">
                   </div>
                   <div class="form-group col-md-3 col-sm-3 col-xs-4">
                     <label class="control-label">Supplier</label>
                     <input type="text" class="form-control input-sm" id="tr_supplier" name="tr_supplier" maxlength="20">
                   </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-3 col-sm-3 col-xs-6">
                      <label class="control-label">Received by <span>*</span></label>
                      <input type="text" class="form-control input-sm" id="tr_by" name="tr_by" required="" maxlength="20" value="<?php echo $this->session->userdata('name'); ?>">
                    </div>
                    <div class="form-group col-md-3 col-sm-3 col-xs-6">
                      <label class="control-label">Date <span>*</span> <sup>YYYY-MM-DD</sup></label>
                      <input type="text" class="form-control input-sm" id="tr_date" name="tr_date" value="<?php echo date("Y-m-d")?>" required="">
                    </div>
                  </div>

                  <div class="ln_solid"></div>

                  <div class="row">
                    <div class="form-group form-group-add col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label">Medicine <span>*</span></label>
                      <select class="form-control input-sm" id="medicine" name="medicine">
                        <option value="">loading...</option>
                      </select>
                    </div>
                    <div class="form-group form-group-add col-md-2 col-sm-2 col-xs-12">
                      <label class="control-label">Lot No <span>*</span></label>
                      <input type="text" class="form-control input-sm" id="tr_lot_no" name="tr_lot_no" maxlength="20">
                    </div>
                    <div class="form-group form-group-add col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label">Expiration Date <span>*</span> <sup>YYYY-MM-DD</sup></label>
                      <input type="text" class="form-control input-sm" id="tr_expiration_date" name="tr_expiration_date" value="<?php //echo date("Y-m-d")?>" required="">
                    </div>
                    <div class="form-group form-group-add col-md-2 col-sm-2 col-xs-6">
                      <label class="control-label">Package <span>*</span></label>
                      <select class="form-control input-sm" id="unit" name="unit" >
                        <option value="">- - -</option>
                      </select>
                    </div>
                    <div class="form-group form-group-add col-md-1 col-sm-1 col-xs-6">
                      <label class="control-label">Qty <span>*</span></label>
                      <input type="text" class="form-control input-sm text-right" id="tr_qty" name="tr_qty" maxlength="11">
                    </div>
                    <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-12">
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
                              <td style="min-width: 60px">Lot No</td>
                              <td style="min-width: 70px">Exp. Date</td>
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
                    <button type="submit" id="draftButton" class="buttonNext btn btn-success">Save</button>
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
                                <label><strong>Add to:</strong></label>
                                <p class="form-control input-sm"></p>
                              </div>
                              <div class="form-group col-md-4 col-sm-4 col-xs-6">
                                <label><strong>Fund:</strong> </label>
                                <p class="form-control input-sm"></p>
                              </div>
                              <div class="form-group col-md-4 col-sm-4 col-xs-6">
                                <label><strong>Program:</strong> </label>
                                <p class="form-control input-sm"></p>
                              </div>
                              <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                <label><strong>SI No:</strong></label>
                                <p class="form-control input-sm"></p>
                              </div>
                              <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                <label><strong>DR No:</strong></label>
                                <p class="form-control input-sm"></p>
                              </div>
                              <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label><strong>Supplier:</strong></label>
                                <p class="form-control input-sm"></p>
                              </div>
                              <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                <label><strong>Received by:</strong></label>
                                <p class="form-control input-sm"></p>
                              </div>
                              <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                <label><strong>Date:</strong> <sup>YYYY-MM-DD</sup></label>
                                <p class="form-control input-sm"></p>
                              </div>
                            </div>
                            <div class="draft-table"></div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn-close btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="btn_frm_in" class="buttonNext btn btn-success">Save</button>
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
