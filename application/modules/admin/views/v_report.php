<!-- page content -->
<div class="right_col page-masterlist" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">

      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="x_panel">
          <table class="cell-border compact hover width-full" id="dt_masterlist" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th style="min-width: 80px">ACCESS ID</th>
                <th>LASTNAME</th>
                <th>FIRSTNAME</th>
                <th>MIDDLENAME</th>
                <th>BIRTHDATE</th>
                <th>AGE</th>
                <th>BARANGAY</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div><!-- end of masterlist -->
    <div class="row">
      <div class="x_panel">
        <div class="x_content">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <form id="frm_info"  autocomplete="off" novalidate="novalidate" class="fv-form fv-form-bootstrap">
              <div class="form-group col-xs-12">
                <label class="control-label">Sector Services</label>
                <select multiple class="form-control input-sm" id="sectortag" name="sectortag">
                 <option value="" disabled>- - -</option>
                 <option value="SOLO PARENT">SOLO PARENT</option>
                 <option value="PWD">PWD</option>
               </select>
              </div>

                <div class="form-group col-xs-12">
                  <label class="control-label">Full Name<input type="hidden" id="masterid" name="masterid"></label>
                  <input type="text" class="form-control input-sm" id="fullname" name="fullname" readonly>
                </div>
                <div class="form-group col-xs-3">
                  <label class="control-label">Age</label>
                  <input type="text" class="form-control input-sm" id="age" name="age" readonly>
                </div>
                <div class="form-group col-xs-9">
                  <label class="control-label">Sector</label>
                  <input type="text" class="form-control input-sm"  id="sel_sector" name="sel_sector"  readonly>
                </div>
                <div class="form-group col-xs-6">
                  <label class="control-label">Fernandino Number</label>
                  <input type="text" class="form-control input-sm" id="idNo" name="idNo" readonly>
                </div>
                <div class="form-group col-xs-6">
                  <label class="control-label">PWD Number</label>
                  <input type="text" class="form-control input-sm" id="pwdnum" name="pwdnum" readonly>
                </div>
                <div class="form-group col-xs-6">
                  <label class="control-label">Senior Citizen Number</label>
                  <input type="text" class="form-control input-sm" id="seniornum" name="seniornum" readonly>
                </div>
                <div class="form-group col-xs-6">
                  <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  <button class="btn btn-sm btn-primary col-xs-12" id="btn_tag"><i class="fa fa-tag"></i> Tag </button>
                </div>

            </form>
          </div>
          <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
            <!-- <table id="" class="cell-border compact hover width-full">
            </table> -->
            <table class="cell-border compact hover width-full" id="dt_services" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>OFFICE</th>
                  <th>SERVICE</th>
                  <th>BIRTHDATE</th>
                  <th>AGE</th>
                  <th>BARANGAY</th>
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
