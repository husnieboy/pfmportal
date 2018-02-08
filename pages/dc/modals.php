<div class="modal fade" id="byrangerep" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">REPORT BY RANGE</h4>
        </div>
        <div class="modal-body">
		<form role="form" class="form-horizontal" id="trucks" method="POST" action="range.php">
		<input type="date" id="fdate" name="fdate" placeholder="FROM DATE" style="text-align:Center;" required/>
		<input type="date" id="ldate" name="ldate" placeholder="TO DATE" style="text-align:Center;" required/>
		<input type="submit" class="btn btn-success" Value="Submit"/>
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
 </div>
 
 <div class="modal fade" id="hisrecord" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Historical Record Page</h4>
        </div>
        <div class="modal-body">
		<input type="date" id="ffdate" name="ffdate" placeholder="FROM DATE" style="text-align:Center;" required />
		<input type="date" id="lldate" name="lldate" placeholder="TO DATE" style="text-align:Center;" required />
		<input type="button" id="hrp" class="btn btn-success" Value="Submit"/>
		<div id="datehis"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
 </div>

<!--<script src="../js/checker.js" type="text/javascript"></script>-->
