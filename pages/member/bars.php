				<!--<div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">N/A</div>
                                    <div>New Memo's!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>-->
               
                <div class="col-lg-12 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-car fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php
															$countint=0;
															$barsint="SELECT * FROM dcstoretrip as H LEFT JOIN dcdetails as D on(H.trip_ticket_no=D.trip_no) WHERE D.dcticpass='OPEN' AND H.trpstatus='S' AND H.trip_store='".$name."'";
															$countintquery=mysqli_query($link,$barsint);
															while($rowint=mysqli_fetch_array($countintquery)){
																$countint++;
															}
															echo $countint;
									?></div>
                                    <div>Delivery from DC!</div>
                                </div>
                            </div>
                        </div>
                        <a href="trucks.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                