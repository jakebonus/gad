        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Reports - M a s t e r l i s t</h2>
                    <div class="clearfix"></div>
                 </div>
                 <form id="frm_sdispense" autocomplete="off" method="post" class="fv-form fv-form-bootstrap">
                    <input type="hidden" class="" id="tr_qty1" name="tr_qty1">

                    <div class="row">
                      <div class="form-group col-md-3 col-sm-3 col-xs-6">
                        <label class="control-label">Format <span>*</span></label>
                        <select class="form-control input-sm" id="tr_format" name="tr_format" required="">
                          <option value="">- - -</option>
                          <option value="0">[On Hand] Dosage Form</option>
                          <option value="1">[On Hand] Category</option>
                          <option value="a">[Dispense] Dosage Form</option>
                          <option value="b">[Dispense] Category</option>
                       </select>
                    </div>
                 </div>

                 <div class="row">
                   <div class="form-group col-md-3 col-sm-4 col-xs-6">

                     <?php if ($this->session->userdata('profile') == 'admin') { ?>
                       <label class="control-label">Source</label>
                       <select class="form-control input-sm" id="tr_location" name="tr_location" disabled="">
                         <option value="">loading...</option>
                       </select>
                      <?php } else { ?>
                        <label class="control-label">Location <sup><span>Current location</span></sup></label>
                        <p class="form-control input-sm c-disabled" style="margin-bottom:0"><?php echo $this->session->userdata('location'); ?></p>
                      <?php } ?>
                 </div>
                 <div class="form-group col-md-2 col-sm-2 col-xs-6">
                  <label class="control-label">Fund</label>
                  <select class="form-control input-sm" id="tr_funding" name="tr_funding" disabled="">
                    <option value="">loading...</option>
                 </select>
              </div>
              <div class="form-group col-md-2 col-sm-2 col-xs-6">
                  <label class="control-label">Program</label>
                  <select class="form-control input-sm" id="tr_program" name="tr_program" disabled="">
                    <option value="">loading...</option>
                 </select>
              </div>
              <div class="form-group col-md-4 col-sm-4 col-xs-6">
               <label class="control-label">Form - To</label>
               <div class="input-daterange" id="datepicker" >
                 <input id="start" type="text" class="form-control1 input-sm col-md-5 col-sm-5 col-xs-5" name="start"/>
                 <span class="add-on col-md-2 col-sm-2 col-xs-2" style="vertical-align: top;height:20px">to</span>
                 <input id="end" type="text" class="form-control1 input-sm col-md-5 col-sm-5 col-xs-5" name="end" />
              </div>
           </div>
        </div>

        <div class="actionBar">
          <button type="button" id="btn_cancel" class="buttonFinish btn btn-default">Cancel</button>
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
        <strong class="title"><font size="3" face="Serif">ISSUE SLIP</font></strong>
      </center>
      <div class="p_risno">
        <font color="darkgray" size="1" face="Sans-serif"><?php echo "PHARMAv".VERSION."-".$this->session->userdata('accountId'); ?></font>
      </div>

      <p><strong>LOCATION: </strong><span></span></p>
      <p><strong>FUND: </strong><span></span></p>
      <p><strong>PROGRAM: </strong><span></span></p>
      <p><strong>FROM: </strong><span></span> - <strong>TO: </strong><span></span></p><br/>
    </div>

      <table class="cell-border compact hover width-full" id="dt_report" cellspacing="0" width="100%">
        <thead bgcolor="#darkgray">
        <tr>
            <th width="50%">MEDICINE</th>
            <th width="0">FUND</th>
            <th width="0">LOCATION</th>
            <th width="0">m_therapeutic_use</th>
            <th width="0">m_dosage_form</th>
            <th width="">tr_date</th>
            <th width="20%">AVAILABLE</th>
            <th width="30%">REMARKS</th>
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
