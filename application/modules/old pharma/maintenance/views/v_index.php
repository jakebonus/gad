<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel x_panel-maintenance">
          <form id="frm_search" autocomplete="off" novalidate="novalidate" class="fv-form fv-form-bootstrap">
            <div class="row">
              <div class="form-group col-xs-12">
                <label class="control-label">RIS No.
               </label>
               <input id="t_risno" type="text" class="form-control input-sm" name="t_risno" autofocus autocomplete=""/>
              </div>

              <div class="form-group col-xs-12">
                <label class="control-label">TYPE <sup>RIS NO.</sup>
               </label>
                <select class="form-control input-sm" id="tr_risno" name="tr_risno">
                <option value="">ALL</option>
                <option value="I-">Inventory IN</option>
                <option value="A-">Allocation</option>
                <option value="D-">Dispense</option>
              </select>
              </div>

              <div class="form-group col-xs-12">
                <label class="control-label">Medicine
               </label>
                <select class="form-control input-sm" id="m_name" name="m_name" disabled="">
                <option value="">loading...</option>
              </select>
              </div>
              <div class="form-group col-xs-12 lbl-brgy hidden">
                <label class="control-label">Barangay</label>
                <select class="form-control input-sm" id="tr_brgy" name="tr_brgy" disabled="">
                <option value="">loading...</option>
              </select>
              </div>
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label">Form - To</label>
                <div class="input-daterange" id="datepicker">
                  <input id="start" type="text" class="form-control1 input-sm col-md-5 col-sm-5 col-xs-5" name="start" />
                  <span class="add-on col-md-2 col-sm-2 col-xs-2" style="vertical-align: top;height:20px">to</span>
                  <input id="end" type="text" class="form-control1 input-sm col-md-5 col-sm-5 col-xs-5" name="end" />
                </div>
              </div>


              <div class="col-xs-12">
                <div class="actionBar">
                  <button type="button" id="btn_reset" class="buttonFinish btn btn-default">Reset</button>
                  <button type="submit" id="btn_search" class="buttonNext btn btn-success">Search</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
          <div class="x_content">

            <div class="no-record alert alert-info">
              <ul class="fa-ul">
                <li>
                  <i class="fa fa-info-circle fa-lg fa-li"></i> No data available. Please search.
                </li>
              </ul>
            </div>

            <table class="cell-border compact hover width-full hidden" id="dt_all_transaction" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <!--  <th style="min-width: 70px;">LOT NO.</th>
             <th style="min-width: 40px;">PROGRAM</th> -->
                  <th style="min-width:80px;">RIS NO.</th>
                  <th style="min-width:300px;">MEDICINE</th>
                  <th style="min-width:80px;">LOT NO.</th>
                  <th style="min-width:70px;">PACKAGE</th>
                  <th style="min-width:30px;">QTY</th>
                  <th style="min-width:200px;">LOCATION</th>
                  <th style="min-width:190px;">RECEIVED BY</th>
                  <th style="min-width:120px;">BARANGAY</th>
                  <th style="min-width:120px;">ADDED BY</th>
                  <th style="min-width:130px;">ADDED DATETIME</th>
                </tr>
              </thead>
            </table>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div id="mdl-trans-del" class="modal fade bs-delete-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
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
        <hr>
        <div class="row">
          <div class="form-group col-md-12 col-sm-12 col-xs-12">
            <label class="control-label">Enter Your Password <span>*</span> </label>
            <input type="password" class="form-control input-sm" id="txt-delpassword" name="txt-delpassword" maxlength="30" autocomplete="off" autofocus>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" id="btn_mdelete" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
