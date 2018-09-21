        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Report - S t o c k &nbsp; C a r d</h2>
                    <div class="clearfix"></div>
                  </div>
                  <form id="frm_stockcard" autocomplete="off" method="post" class="fv-form fv-form-bootstrap">
                    <input type="hidden" class="" id="tr_qty1" name="tr_qty1">

                    <div class="row">
                      <div class="form-group col-md-5 col-sm-5 col-xs-6">
                        <label class="control-label">Medicine <span>*</span></label>
                        <select class="form-control input-sm" id="medicine" name="medicine" required="" disabled="">
                          <option value="">loading...</option>
                        </select>
                      </div>

                      <div class="form-group col-md-2 col-sm-2 col-xs-6">
                        <label class="control-label">Fund <span>*</span></label>
                        <select class="form-control input-sm" id="str_funding" name="tr_funding" required="" disabled="">
                          <option value="">loading...</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2 col-sm-2 col-xs-6">
                        <label class="control-label">Program <span>*</span></label>
                        <select class="form-control input-sm" id="str_program" name="tr_program" required="" disabled="">
                          <option value="">loading...</option>
                        </select>
                      </div>
                    </div>

                    <div class="row" <?php if ($this->session->userdata('profile') == 'user') { echo "style='display:none'"; } ?>>
                      <div class="form-group col-md-3 col-sm-4 col-xs-6">
                        <label class="control-label">Source</label>
                        <select class="form-control input-sm" id="tr_location" name="tr_location" disabled="">
                          <option value="">loading...</option>
                        </select>
                      </div>
                    </div>

                    <div class="actionBar">
                      <button type="button" id="btn_scancel" class="buttonFinish btn btn-default">Cancel</button>
                      <button type="submit" id="btn_search" class="btn btn-success">Search</button>
                    </div>

                  </form>

                  <button onclick="printContent('print-report')" type="button" class="hidden btn btn-primary _print">Print</button>

                <div id="print-report" class="hidden">

                  <div class="heading">
                    <img class="img-logo" src="<?php echo base_url('build/images/logo.png'); ?>" width="55"/>

                    <center>
                      <strong><font size="3" face="Sans-serif">CITY OF SAN FERNANDO, PAMPANGA</font></strong><br>
                      City Health Office<br>
                      <strong class="title"><font size="3" face="Serif">STOCK CARD</font></strong>
                    </center>
                    <div class="p_risno">
                      <font color="darkgray" size="1" face="Sans-serif"><?php echo "PHARMAv".VERSION."-".$this->session->userdata('accountId'); ?></font>
                    </div>

                    <p><strong>MEDICINE: </strong><span></span></p>
                    <p><strong>FUND: </strong><span></span></p>
                    <p><strong>PROGRAM: </strong><span></span></p>
                    <p><strong>SOURCE: </strong><span></span></p><br/>
                  </div>

                    <table class="cell-border compact hover width-full" id="dt_stockcard" cellspacing="0" width="100%">
                      <thead bgcolor="#darkgray">
                      <tr>
                          <th style="min-width:40px">DATE</th>
                          <th style="width:10px!important; max-width:20px">TRAN</th>
                          <th style="min-width:70px;">RIS NO</th>
                          <th style="min-width:100px;">RELEASED BY</th>
                          <th style="min-width:100px;">RECEIVED BY</th>
                          <th style="min-width:20px; max-width:30px">IN</th>
                          <th style="min-width:20px; max-width:30px">OUT</th>
                          <th style="max-width:30px">BALANCE</th>
                       </tr>
                       </thead>
                    </table>
                  </div>

</div>
</div>
</div>
</div>
</div>
<!-- /page content -->
