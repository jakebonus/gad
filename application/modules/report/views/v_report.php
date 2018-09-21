<!-- page content -->
<div class="right_col page-masterlist" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <center><h2>SERNIOR CITIZEN</h2></center>
            <table class="cell-border compact hover width-full" id="dt_seniorperbrgy" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="min-width: 80px">BARANGAY</th>
                  <th>MALE</th>
                  <th>FEMALE</th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <center>  <h2> SENIOR BY AGE GROUP</h2></center>
            <table class="cell-border compact hover width-full" id="dt_senioragegroup" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="min-width: 80px">BARANGAY</th>
                  <th style="min-width: 200px">SC PRESIDENT</th>
                  <th style="min-width: 140px">60 - 69 MALE</th>
                  <th style="min-width: 140px">60 - 69 FEMALE</th>
                  <th style="min-width: 140px">70 - 79 MALE</th>
                  <th style="min-width: 140px">70 - 79 FEMALE</th>
                  <th style="min-width: 140px">80 - 89 MALE</th>
                  <th style="min-width: 140px">80 - 89 FEMALE</th>
                  <th style="min-width: 140px">90 and above MALE</th>
                  <th style="min-width: 140px">90 and above FEMALE</th>
                </tr>
              </thead>
            </table>
          </div>


        </div>
      </div>
    </div><!-- end of masterlist -->
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <center>  <h2> FERNANDINOs BY CIVIL STATUS</h2></center>
            <table class="cell-border compact hover width-full" id="dt_civilstatus" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="min-width: 80px">BARANGAY</th>
                  <th>SINGLE</th>
                  <th>MARRIED</th>
                  <th>WIDOW</th>
                  <th>SEPARATED</th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <center>  <h2> PWD</h2></center>
            <table class="cell-border compact hover width-full" id="dt_pwdperbrgy" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="min-width: 80px">BARANGAY</th>
                  <th>MALE</th>
                  <th>FEMALE</th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <center>  <h2> SOLO PARENT</h2></center>
            <table class="cell-border compact hover width-full" id="dt_soloparentperbrgy" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="min-width: 80px">BARANGAY</th>
                  <th>MALE</th>
                  <th>FEMALE</th>
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

<div class="modal fade bs-example-modal-sm" id="modal_scpresident" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Senior Citizen Presdent</h4>
        </div>
        <form id="frm_scpresident" name="frm_scpresident">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label class="control-label"> Barangay Name:</label>
              <input type="hidden" id="mdl_brgyid" name="mdl_brgyid">
              <label class="form-control" id="mdl_brgyname"></label>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label class="control-label"> Senior Citizen Name:</label>
              <input type="hidden" id="mdl_masterid" name="mdl_masterid">
              <input type="text" class="form-control" id="mdl_seniorcitizen">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="btn-group">
          <button type="button" class="btn btn-default" id="btn_close"><i class="fa fa-remove"></i> Close</button>
          <button type="button" class="btn btn-default" id="btn_scpressave" ><i class="fa fa-tag"></i> Save</button>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
