        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Medicine list</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="cell-border compact hover width-full" id="dt_medicinelist" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th style="min-width: 250px">NAME</th>
                           <th style="min-width: 130px">DOSAGE FORM</th>
                           <th style="min-width: 142px">CATEGORY</th>
                           <th>SET</th>
                           <th style="min-width: 105px">PCS PER SET</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel bgedit">
                  <div class="x_title">
                    <h2 class="title">Add</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <form id="frm-medicine" data-id="" autocomplete="off" novalidate="novalidate" class="fv-form fv-form-bootstrap">
                       <div class="row">
                          <div class="form-group col-md-12 col-sm-6 col-xs-12">
                             <label class="control-label">Name <span>*</span></label>
                             <input type="text" class="form-control input-sm" id="m_name" name="m_name" required="">
                          </div>
                          <div class="form-group col-md-12 col-sm-6 col-xs-12">
                             <label class="control-label">Dosage Form <span>*</span></label>
                             <select class="form-control input-sm" id="m_dosage_form" name="m_dosage_form" required="">
                                <option value="">- - -</option>
                                <option value="AMPULE">AMPULE</option>
                                <option value="VIAL">VIAL</option>
                                <option value="BOTTLE">BOTTLE</option>
                                <option value="TABLET">TABLET</option>
                                <option value="CAPSULE">CAPSULE</option>
                                <option value="SYRUP">SYRUP</option>
                                <option value="SUSPENSION">SUSPENSION</option>
                                <option value="DROPS">DROPS</option>
                                <option value="NEBULE">NEBULE</option>
                                <option value="OINTMENT">OINTMENT</option>
                                <option value="CREAM">CREAM</option>
                                <option value="SOAP">SOAP</option>
                                <option value="PC">PC</option>
                             </select>
                          </div>
                          <div class="form-group col-md-12 col-sm-6 col-xs-12">
                             <label class="control-label">Category <span>*</span></label>
                             <select class="form-control input-sm" id="m_therapeutic_use" name="m_therapeutic_use" required="">
                                <option value="">- - -</option>
                                <option value="ANTIBIOTICS">ANTIBIOTICS</option>
                                <option value="CARI">CARI</option>
                                <option value="CDD">CDD</option>
                                <option value="CVD">CVD</option>
                                <option value="GENERAL MEDS">GENERAL MEDS</option>
                                <option value="VITAMINS">VITAMINS</option>
                                <option value="MEDICAL SUPPLIES">MEDICAL SUPPLIES</option>
                             </select>
                          </div>
                          <div class="form-group col-md-6 col-sm-6 col-xs-6">
                             <label class="control-label">Set <span>*</span></label>
                             <select class="form-control input-sm" id="m_set" name="m_set" required="">
                                <option value="">- - -</option>
                                <option value="BOX">BOX</option>
                                <option value="BOTTLE">BOTTLE</option>
                                <option value="TUBE">TUBE</option>
                                <option value="PACK">PACK</option>
                             </select>
                          </div>
                          <div class="form-group col-md-6 col-sm-6 col-xs-6">
                             <label class="control-label">Pcs per set <span>*</span></label>
                             <input type="text" class="form-control input-sm" id="m_pcsper_set" name="m_pcsper_set" required="">
                          </div>
                        </div>

                        <div class="actionBar">
                          <button type="button" id="btn_reset" class="buttonFinish btn btn-default">Cancel</button>
                          <button type="submit" id="btn-frm-medicine" class="buttonNext btn btn-success">Submit</button>
                        </div>

                        <div class="modal fade bs-delete-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">

                              <div class="modal-header btn-danger">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Delete</h4>
                              </div>
                              <div class="modal-body">
                                <p>Are you sure you want to delete? </p>
                                <p></p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                <button type="button" id="btn_mdelete" class="btn btn-danger" data-dismiss="modal">Yes</button>
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
        </div>
        <!-- /page content -->
