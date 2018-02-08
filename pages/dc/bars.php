<!--<div class="col-lg-3 col-md-6">
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
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php $countct=0;
															$barsct="SELECT * FROM dcdetails WHERE  dcticpass='' or trip_status='OPEN' AND DATEDIFF(NOW(),dctimestamp) < 2";
															//$barsct="SELECT * FROM dcdetails WHERE  dcticpass='' or trip_status='OPEN' AND DATEDIFF(DATE_ADD(NOW(), INTERVAL 48 HOUR),dctimestamp) <= 2";
															$countctquery=mysqli_query($link,$barsct);
															while($rowct=mysqli_fetch_array($countctquery)){
																$countct++;
															}
															echo $countct;
									?></div>
                                    <div>Created Tickets!</div>
                                </div>
                            </div>
                        </div>
                        <a href="delhistory.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-car fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php
															$countint=0;
															$barsint="SELECT * FROM dcdetails WHERE dcticpass='OPEN' AND DATEDIFF(NOW(),dctimestamp) < 2 ORDER BY dd_id DESC";
															//$barsint="SELECT * FROM dcdetails WHERE dcticpass='OPEN'";
															$countintquery=mysqli_query($link,$barsint);
															while($rowint=mysqli_fetch_array($countintquery)){
																$countint++;
															}
															echo $countint;
									?></div>
                                    <div>Delivery Status!</div>
                                </div>
                            </div>
                        </div>
                        <a href="pertmain.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php $countat=0;
															$barsat="SELECT DATEDIFF(NOW(),dctimestamp) > 2 as DATEAC FROM dcdetails WHERE trip_status='OPEN'";
															//$barsat="SELECT DATEDIFF(DATE_ADD(NOW(), INTERVAL 48 HOUR),dctimestamp) > 2 as DATEAC FROM dcdetails WHERE trip_status='OPEN'";
															
															
															//SELECT DATEDIFF(CURDATE(), dctimestamp) AS DATEAC FROM dcdetails WHERE trip_status='OPEN' GROUP BY dd_id";
															$countatquery=mysqli_query($link,$barsat);
															while($rowat=mysqli_fetch_array($countatquery)){
																$isempty=$rowat['DATEAC'];
																if(!empty($isempty))
																{ //do thing
																$countat++;
																}
															}
															echo $countat; 
									?></div>
                                    <div>Pending Tickets!</div>
                                </div>
                            </div>
                        </div>
                        <a href="pentrip.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>