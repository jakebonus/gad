<!-- page content -->
<div class="right_col page-masterlist" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="row">
        <div class="x_panel">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <form id="frm_service" name="frm_service">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
              <label class="control-label">Office</label>
              <input type="text" class="form-control input-sm" value="CSWD" disabled>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
              <label class="control-label">Sector</label>
              <select class="form-control input-sm" id="sector" name="sector" required>
                  <option value="N/A"> - Choose - </option>
                  <option value="SENIOR CITIZEN">SENIOR CITIZEN</option>
                  <option value="SOLO PARENT">SOLO PARENT</option>
                  <option value="PWD">PWD</option>
              </select>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label class="control-label">Service Name</label>
              <input type="hidden" class="form-control input-sm" id="serviceID" name="serviceID" placeholder="serviceID">
              <input type="text" class="form-control input-sm" id="description" name="description" required>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label class="control-label">Service Description</label>
              <textarea class="form-control input-sm" id="moredetails" name="moredetails" rows="6"></textarea>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-group">
              <!-- <div class="btn-group"> -->
              <hr>
                <button type="button" class="btn btn-primary col-lg-6 col-md-6 col-sm-12 col-xs-12" id="btn_reset" name="btn_reset"><i class="fa fa-refresh"></i> Reset</button>
                <button type="button" class="btn btn-success col-lg-6 col-md-6 col-sm-12 col-xs-12" id="btn_save" name="btn_save"><i class="fa fa-save"></i> Save</button>
                <!-- <button type="button" class="btn btn-danger col-lg-4 col-md-4 col-sm-12 col-xs-12" id="btn_remove" name="btn_remove"><i class="fa fa-remove"></i> Deleted</button> -->
              <!-- </div> -->
            </div>
          </form>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <table class="cell-border compact hover width-full" id="dt_services" cellspacing="0" width="100%">
            <thead>
              <tr>
                <!-- <th>Office</th> -->
                <th>Sector</th>
                <th>Service</th>
                <!-- <th>Description</th> -->
              </tr>
            </thead>
          </table>
        </div>
      </div>
      </div>
    </div><!-- end of masterlist -->
  </div>
</div>
<!-- /page content -->
