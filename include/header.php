<?php 
include('session.php'); 
$userId = ($_SESSION['empid'] ?? 'b');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" sizes="16x16" href="images/sepl.jpeg">
    <link rel="stylesheet" type="text/css" href="../style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

   <!----------------------- jQuery UI --------------------------->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
    #myDiv 
    {
        transform: rotateZ(180deg);
        width: 30px;
    }
    </style>
</head>
<body>
    <div id="body-pd" class="body-pd">
        <header class="header header-pd" id="header">
            <div class="header_toggle" style="line-height: 0.5;"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <!-- <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div> -->
            <div class="text-white" style="font-size:1rem; font-weight:500;"><?php echo $_SESSION['name']; ?></div>
        </header>
        <div class="l-navbar show" id="nav-bar" style="background-image: url(images/bg1.jpg);">
            <nav class="nav">
                <div> 
                    <a href="#" class="nav_logo"><img src="images/sepl.jpeg" height="30px"><span class="nav_logo-name">SE<small>PL</small></span> </a>
                    <div class="nav_list">
                        <a href="..\main\dashboard.php" class="nav_link" id="dashboard">
                            <i class='bx bxs-dashboard nav_icon'></i>
                            <span class="nav_name">Dashboard.</span>
                        </a>
                        <a class="sub-btn nav_link mb-1" id="submenu">
                            <i class='bx bx-folder nav_icon'></i>
                            <span class="nav_name">PO Purchase</span>
                        </a>
                        <div class="submenu collapse drop">
                            <a class="nav_link" href="..\po\Requisition\showRequisition.php" id="req"><span class="nav_name">&nbsp; 1. &nbsp;&nbsp;Requistion</span></a>
                            <a class="nav_link" href="..\po\create_po.php" id="createpo"><span class="nav_name">&nbsp; 2. &nbsp;&nbsp;Create PO</span></a>
                            <a class="nav_link" href="..\po\search_po.php" id="serach_po"><span class="nav_name">&nbsp; 3. &nbsp;&nbsp;Search PO</span></a>
                            <a class="nav_link" href="..\po\purchase_entry.php" id="pur_entry"><span class="nav_name">&nbsp; 4. &nbsp;&nbsp;Purchase Entry</span></a>
                            <a class="nav_link" href="..\po\search_purchase.php" id="pur_list"><span class="nav_name">&nbsp; 5. &nbsp;&nbsp;Search Purchase</span></a>
                            <?php if($_SESSION['crmid'] == '3077' || $_SESSION['crmid'] == '3064' || $_SESSION['crmid'] == '3025' || $_SESSION['crmid'] == '3047' || $_SESSION['crmid'] == '1070' || $_SESSION['crmid'] == '1023' ||  $_SESSION['crmid'] == '3098' || $_SESSION['crmid'] == '1017') { ?>
                            <a class="nav_link" href="..\po\inward_confirm.php"><span class="nav_name">&nbsp; 3.1 &nbsp;&nbsp;Inward Confirmation</span></a>
                            <?php } ?>
                            <?php if($_SESSION['crmid'] == '3077' || $_SESSION['crmid'] == '3064' || $_SESSION['crmid'] == '3025' || $_SESSION['crmid'] == '3047' || $_SESSION['crmid'] == '1070' || $_SESSION['crmid'] == '3112' || $_SESSION['crmid'] == '3099' || $_SESSION['crmid'] == '3098') { ?>
                            <a class="nav_link" href="..\po\showcreditnote.php"><span class="nav_name">&nbsp; 3.3 &nbsp;&nbsp;Search Credit Note</span></a>
                            <?php } ?>
                            <a class="nav_link" href="..\po\po_to_inward.php"><span class="nav_name">&nbsp; 4.0 &nbsp;&nbsp;Pending PO</span></a>
                            <a class="nav_link" href="..\po\report-old.php"><span class="nav_name">&nbsp; 5.0 &nbsp;&nbsp;Purchase Report</span></a>                               

                            <?php if($_SESSION['crmid'] == '3077' || $_SESSION['crmid'] == '3065' || $_SESSION['crmid'] == '1070' || $_SESSION['crmid'] == '1017' || $_SESSION['crmid'] == '3134') { ?>
                            <a class="nav_link" href="..\po\packingList.php"><span class="nav_name">&nbsp; 5.1 &nbsp;&nbsp;Packing List</span></a>
                            <?php } ?>
                            <a class="nav_link" href="..\po\psummary\psummary.php"><span class="nav_name">&nbsp; 6.0 &nbsp;&nbsp;Purchase Summary</span></a>
                            <a class="nav_link" href="..\po\reportItemWise.php"><span class="nav_name">&nbsp; 7.0 &nbsp;&nbsp;Item History</span></a>
                            <a class="nav_link" href="..\po\tcreceipt_report.php"><span class="nav_name">&nbsp; 7.1 &nbsp;&nbsp;TC Receipt</span></a>
                            <a class="nav_link" href="..\po\report_696.php"><span class="nav_name">&nbsp; 8.0 &nbsp;&nbsp;Purchase-696</span></a>

                            <?php if($_SESSION['crmid'] == '3077' || $_SESSION['crmid'] == '3099' || $_SESSION['crmid'] == '3112' || $_SESSION['crmid'] == '3080' || $_SESSION['crmid'] == '3046' || $_SESSION['crmid'] == '1070') { ?>
                            <a class="nav_link" href="..\po\Account\accountReport.php"><span class="nav_name">&nbsp; 9.0 &nbsp;&nbsp;Account Report</span></a>
                            <?php } ?>

                            <?php if($_SESSION['crmid'] == '3077') { ?>
                            <a class="nav_link" href="..\po\po_log.php"><span class="nav_name">&nbsp; 10.0 &nbsp;&nbsp;PO_Log</span></a>
                            <a class="nav_link" href="..\po\purchase_log.php"><span class="nav_name">&nbsp; 11.0 &nbsp;&nbsp;Purchase_Log</span></a>
                            <?php } ?>
                            <?php if($_SESSION['crmid'] == '3077') { ?>
                            <a class="nav_link" href="..\po\poTrace.php"><span class="nav_name">&nbsp; 12.0 &nbsp;&nbsp;Pur_Traceability</span></a>
                            <?php } ?>
                        </div>
                        <a class="sub-btn nav_link mb-1" class="nav_link" id="Po_Pucrhase_696">
                            <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">Po_Pucrhase_696</span>
                        </a>
                        <div class="Po_Pucrhase_696 collapse drop">
                            <a class="nav_link" href="po\Requisition-696\showRequisition.php"><span class="nav_name">&nbsp; 1.0 &nbsp;&nbsp;Requisition</span></a>
                            <a class="nav_link" href="po\adddata-696.php"><span class="nav_name">&nbsp; 2.1 &nbsp;&nbsp;PO entry</span></a>
                            <a class="nav_link" href="po\showdata-696.php"><span class="nav_name">&nbsp; 2.2 &nbsp;&nbsp;Search PO</span></a>
                            <a class="nav_link" href="po\inward_field-696.php"><span class="nav_name">&nbsp; 3.1 &nbsp;&nbsp;Purchase entry</span></a>
                            <a class="nav_link" href="po\showinvoice-696.php"><span class="nav_name">&nbsp; 3.2 &nbsp;&nbsp;Search Purchase</span></a>
                            <a class="nav_link" href="po\po_to_inward-696.php"><span class="nav_name">&nbsp; 4.0 &nbsp;&nbsp;Pending PO</span></a>
                            <a class="nav_link" href="po\purchase-report-696.php"><span class="nav_name">&nbsp; 5.0 &nbsp;&nbsp;Purchase Report</span></a>
                            <a class="nav_link" href="po\psummary\psummary_696.php"><span class="nav_name">&nbsp; 6.0 &nbsp;&nbsp;Purchase Summary</span></a>
                        </div>
                        <?php if($_SESSION['crmid'] == '3077' || $_SESSION['crmid'] == '3025' || $_SESSION['crmid'] == '3109' || $_SESSION['crmid'] == '3063' || $_SESSION['crmid'] == '1023' || $_SESSION['crmid'] == '3064' || $_SESSION['crmid'] == '3098') { ?>
                        <a class="sub-btn nav_link mb-1" id="packing_reports">
                            <i class='bx bx-cube nav_icon'></i>
                            <span class="nav_name">Packing</span>
                        </a>
                        <div class="packing_reports collapse drop">
                            <a class="nav_link" href="po\packing\addPakcingDisaply.php">
                                <span class="nav_name">&nbsp; 1.0 &nbsp;&nbsp;Add Packing</span>
                            </a>
                        </div>
                        <?php } ?>
                        <?php if($_SESSION['crmid'] == '3077' || $_SESSION['crmid'] == '3064' || $_SESSION['crmid'] == '3098') { ?>
                            <a class="sub-btn nav_link mb-1" id="payment_sys">
                                <i class='bx bx-rupee nav_icon'></i>
                                <span class="nav_name">Payment Sys.</span>
                            </a>
                            <div class="payment_sys collapse drop">
                                <a class="nav_link" href="po\payment_sys\bill_out.php">
                                    <span class="nav_name">&nbsp; 1.0 &nbsp;&nbsp;Bill_Out</span>
                                </a>
                                <a class="nav_link" href="po\payment_sys\bill_in.php">
                                    <span class="nav_name">&nbsp; 2.0 &nbsp;&nbsp;Bill_In</span>
                                </a>
                                <?php if($_SESSION['crmid'] == '3077' || $_SESSION['crmid'] == '3064' || $_SESSION['crmid'] == '3098'){?>
                                    <a class="nav_link" href="po\payment_sys\approve.php">
                                        <span class="nav_name">&nbsp; 3.0 &nbsp;&nbsp;Bill Approve</span>
                                    </a>
                                <?php } ?>
                                <?php if($_SESSION['crmid'] == '3077' || $_SESSION['crmid'] == '3064' || $_SESSION['crmid'] == '3098' || $_SESSION['crmid'] == '2135' || $_SESSION['crmid'] == '3065' || $_SESSION['crmid'] == '3020' || $_SESSION['crmid'] == '3063' || $_SESSION['crmid'] == '1009' || $_SESSION['crmid'] == '1017' || $_SESSION['crmid'] == '3025' || $_SESSION['crmid'] == '1031' || $_SESSION['crmid'] == '3111' || $_SESSION['crmid'] == '1052' || $_SESSION['crmid'] == '1045'){?>
                                    <a class="nav_link" href="po\payment_sys\online\approve_online.php">
                                        <span class="nav_name">&nbsp; 3.1 &nbsp;&nbsp;Bill Approval-Send</span>
                                    </a>
                                <?php } ?>
                                <?php if($_SESSION['crmid'] == '3077' || $_SESSION['crmid'] == '3064' || $_SESSION['crmid'] == '3047' || $_SESSION['crmid'] == '9002' || $_SESSION['crmid'] == 'b' || $_SESSION['crmid'] == '3036' || $_SESSION['crmid'] == '1019' || $_SESSION['crmid'] == '1023' || $_SESSION['crmid'] == '3025'){ ?>
                                    <a class="nav_link" href="po\payment_sys\online\approved_bill_online.php">
                                        <span class="nav_name">&nbsp; 3.2 &nbsp;&nbsp;Bill Approval-Rec.</span>
                                    </a>
                                <?php } ?>
                                <a class="nav_link" href="po\payment_sys\payment_due.php">
                                    <span class="nav_name">&nbsp; 4.0 &nbsp;&nbsp;Payment Due</span>
                                </a>
                                <a class="nav_link" href="po\payment_sys\payment_table.php">
                                    <span class="nav_name">&nbsp; 4.1 &nbsp;&nbsp;Payment</span>
                                </a>
                                <a class="nav_link" href="po\payment_sys\advancePayment.php">
                                    <span class="nav_name">&nbsp; 5.0 &nbsp;&nbsp;Advance Payment</span>
                                </a>
                                <a class="nav_link" href="po\payment_sys\pymt_report.php">
                                    <span class="nav_name">&nbsp; 6.0 &nbsp;&nbsp;Payment Report</span>
                                </a>
                                <a class="nav_link" href="po\payment_sys\pymt_verify.php">
                                    <span class="nav_name">&nbsp; 7.0 &nbsp;&nbsp;Payment Verify</span>
                                </a>
                            </div>
                        <?php } ?>
                        <a class="sub-btn nav_link mb-1" id="store">
                            <i class='bx bx-store-alt nav_icon'></i>
                            <span class="nav_name">Store - 2205</span>
                        </a>
                        <div class="store collapse drop">
                            <a class="nav_link" href="po\store\inward.php">
                                <span class="nav_name">&nbsp; 1.0 &nbsp;&nbsp;Inward Material</span>
                            </a>
                            <a class="nav_link" href="po\store\rm_issue.php">
                                <span class="nav_name">&nbsp; 2.0 &nbsp;&nbsp;Material Issue</span>
                            </a>
                            <a class="nav_link" href="po\store\opening.php">
                                <span class="nav_name">&nbsp; 3.0 &nbsp;&nbsp;Add New Item</span>
                            </a>
                            <a class="nav_link" href="po\store\opening_table.php">
                                <span class="nav_name">&nbsp; 4.0 &nbsp;&nbsp;Monthly Opening</span>
                            </a>
                            <a class="nav_link" href="po\store\min_limit.php">
                                <span class="nav_name">&nbsp; 5.0 &nbsp;&nbsp;Min Ord Qnty</span>
                            </a>
                            <a class="nav_link" href="po\store\stock_mismatch.php">
                                <span class="nav_name">&nbsp; 6.0 &nbsp;&nbsp;Stock mismatch</span>
                            </a>
                            <a class="nav_link" href="po\store\report.php">
                                <span class="nav_name">&nbsp; 7.0 &nbsp;&nbsp;Live Stock</span>
                            </a>
                            <a class="nav_link" href="po\store\issue_rep.php">
                                <span class="nav_name">&nbsp; 8.0 &nbsp;&nbsp;Issue Report</span>
                            </a>
                            <a class="nav_link" href="po\store\store_rep.php">
                                <span class="nav_name">&nbsp; 9.0 &nbsp;&nbsp;Store Report</span>
                            </a>
                            <a class="nav_link" href="po\store\bill_out.php">
                                <span class="nav_name">&nbsp; 10.0 &nbsp;&nbsp;Bill_Out</span>
                            </a>
                            <a class="nav_link" href="po\store\shoes_issue.php">
                                <span class="nav_name">&nbsp; 11.0 &nbsp;&nbsp;Shoes Issue</span>
                            </a>
                        </div>
                        <a class="sub-btn nav_link mb-1" id="store_696">
                            <i class='bx bx-store-alt nav_icon'></i>
                            <span class="nav_name">Store - 696</span>
                        </a>
                        <div class="store_696 collapse drop">
                            <a class="nav_link" href="po\store\696\inward-696.php">
                                <span class="nav_name">&nbsp; 1.0 &nbsp;&nbsp;Inward Material</span>
                            </a>
                            <a class="nav_link" href="po\store\696\rm_issue-696.php">
                                <span class="nav_name">&nbsp; 2.0 &nbsp;&nbsp;Material Issue</span>
                            </a>
                            <a class="nav_link" href="po\store\696\opening_696.php">
                                <span class="nav_name">&nbsp; 3.0 &nbsp;&nbsp;Add New Item</span>
                            </a>
                            <a class="nav_link" href="po\store\696\opening_table-696.php">
                                <span class="nav_name">&nbsp; 3.1 &nbsp;&nbsp;Monthly Opening</span>
                            </a>
                            <a class="nav_link" href="po\store\696\min_limit-696.php">
                                <span class="nav_name">&nbsp; 4.0 &nbsp;&nbsp;Min Ord Qnty</span>
                            </a>
                            <a class="nav_link" href="po\store\696\report-696.php">
                                <span class="nav_name">&nbsp; 5.0 &nbsp;&nbsp;Live Stock</span>
                            </a>
                            <a class="nav_link" href="po\store\696\issue_rep-696.php">
                                <span class="nav_name">&nbsp; 6.0 &nbsp;&nbsp;Issue Report</span>
                            </a>
                            <a class="nav_link" href="po\store\696\store_rep-696.php">
                                <span class="nav_name">&nbsp; 7.0 &nbsp;&nbsp;Store Report</span>
                            </a>
                        </div>
                        <a class="sub-btn nav_link mb-1" id="RM">
                            <i class='bx bx-cube nav_icon'></i>
                            <span class="nav_name">Raw Material</span>
                        </a>
                        <div class="RM collapse drop">
                            <a class="nav_link" href="po\RM\rm_issue.php">
                                <span class="nav_name">&nbsp; Material Issue</span>
                            </a>
                            <a class="nav_link" href="po\RM\pvcIssueBc.php">
                                <span class="nav_name">&nbsp; Barcode Issue - PVC</span>
                            </a>
                            <a class="nav_link" href="po\RM\pvcBarCodeReoprt.php">
                                <span class="nav_name">&nbsp; Barcode Reoprt - PVC</span>
                            </a>
                            <a class="nav_link" href="po\RM\packingIssue.php">
                                <span class="nav_name">&nbsp; Barcode Issue - Packing</span>
                            </a>
                            <a class="nav_link" href="po\RM\packingBarCodeReoprt.php">
                                <span class="nav_name">&nbsp; Barcode Reoprt - Packing</span>
                            </a>
                            <a class="nav_link" href="po\RM\opening.php">
                                <span class="nav_name">&nbsp; Add New Grade</span>
                            </a>
                            <a class="nav_link" href="po\RM\opening_table.php">
                                <span class="nav_name">&nbsp; Monthly Opening</span>
                            </a>
                            <a class="nav_link" href="po\RM\stock_mismatch.php">
                                <span class="nav_name">&nbsp; Stock mismatch</span>
                            </a>
                            <a class="nav_link" href="po\RM\report.php">
                                <span class="nav_name">&nbsp; Live Stock</span>
                            </a>
                            <a class="nav_link" href="po\RM\issue_rep.php">
                                <span class="nav_name">&nbsp; Issue Report</span>
                            </a>
                            <a class="nav_link" href="po\RM\subGradeReport.php">
                                <span class="nav_name">&nbsp; Grade Wise Report</span>
                            </a>
                            <a class="nav_link" href="po\RM\rmtaWiseReport.php">
                                <span class="nav_name">&nbsp; RMTA Wise Report</span>
                            </a>
                            <a class="nav_link" href="po\RM\pvc_outerWtReport.php">
                                <span class="nav_name">&nbsp; PVC Outer_WT</span>
                            </a>
                            <a class="nav_link" href="po\RM\barcodVsMaterialIssue.php">
                                <span class="nav_name">&nbsp; Barcode/Manual</span>
                            </a>
                            <a class="nav_link" href="po\RM\copperTapeStock.php">
                                <span class="nav_name">&nbsp; Copper Tape Live Stock</span>
                            </a>
                            <a class="nav_link" href="po\RM\copperTapeIssue.php">
                                <span class="nav_name">&nbsp; Copper Tape Issue</span>
                            </a>
                            <a class="nav_link" href="po\RM\pvcRmtaWiseReport.php">
                                <span class="nav_name">&nbsp; PVC RMta Wise Report</span>
                            </a>
                            <a class="nav_link" href="po\RM\PVCOpenningStock.php">
                                <span class="nav_name">&nbsp; PVC Stock - Add</span>
                            </a>
                            <a class="nav_link" href="po\RM\pvcLiveStock.php">
                                <span class="nav_name">&nbsp; PVC Live Stock</span>
                            </a>
                        </div>
                        <a class="sub-btn nav_link mb-1" id="rubber">
                            <i class='bx bx-devices nav_icon'></i>
                            <span class="nav_name">Rubber</span>
                        </a>
                        <div class="rubber collapse drop">
                            <a class="nav_link" href="po\Rubber\inward.php">
                                <span class="nav_name">&nbsp; Inward Material</span>
                            </a>
                            <a class="nav_link" href="po\Rubber\rb_issue.php">
                                <span class="nav_name">&nbsp; Issue Rubber</span>
                            </a>
                            <a class="nav_link" href="po\Rubber\issue_report.php">
                                <span class="nav_name">&nbsp; Issue Report</span>
                            </a>
                            <a class="nav_link" href="po\Rubber\liveReport.php">
                                <span class="nav_name">&nbsp; Live Stock</span>
                            </a>
                            <a class="nav_link" href="po\Rubber\RmtaWiseliveReport.php">
                                <span class="nav_name">&nbsp; Rmta-Live Stock</span>
                            </a>
                        </div>
                        <?php if($_SESSION['crmid'] == '3077' || $_SESSION['crmid'] == '1023' || $_SESSION['crmid'] == '1070') { ?>
                            <a class="sub-btn nav_link mb-1" id="wddrum">
                                <i class='bx bx-cylinder nav_icon'></i>
                                <span class="nav_name">Wooden Drum</span>
                            </a>
                            <div class="wddrum collapse drop">
                                <a class="nav_link" href="po\Wodden_drum\wd_po_graph.php">
                                    <span class="nav_name">&nbsp; Party Wise Order</span>
                                </a>
                                <a class="nav_link" href="po\Wodden_drum\openingStock.php">
                                    <span class="nav_name">&nbsp; Opening Stock</span>
                                </a>
                                <a class="nav_link" href="po\Wodden_drum\liveStock.php">
                                    <span class="nav_name">&nbsp; Live Stock</span>
                                </a>
                            </div>
                        <?php } ?>
                        <a class="sub-btn nav_link mb-1" id="jobWork">
                            <i class='bx bxs-truck nav_icon'></i>
                            <span class="nav_name">Job Work</span>
                        </a>
                        <div class="jobWork collapse drop">
                            <a class="nav_link" href="po\Job_Work\adddata.php">
                                <span class="nav_name">&nbsp; Create JW</span>
                            </a>
                            <a class="nav_link" href="po\Job_Work\showdata.php">
                                <span class="nav_name">&nbsp; Search JW</span>
                            </a>
                            <a class="nav_link" href="po\Job_Work\report.php">
                                <span class="nav_name">&nbsp; Report JW</span>
                            </a>
                        </div>
                        <a class="sub-btn nav_link mb-1" id="vendorRating">
                            <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                            <span class="nav_name">Vendor Rating</span>
                        </a>
                        <div class="vendorRating collapse drop">
                            <a class="nav_link" href="po\vendor\vendorIS.php">
                                <span class="nav_name">&nbsp; IS</span>
                            </a>
                            <a class="nav_link" href="po\vendor\venderCal.php">
                                <span class="nav_name">&nbsp; Calculation</span>
                            </a>
                            <a class="nav_link" href="po\vendor\supplyRatingReport.php">
                                <span class="nav_name">&nbsp; Supply Rating Report</span>
                            </a>
                        </div>
                        <a class="sub-btn nav_link mb-1" id="masterMenu">
                            <i class='bx bx-cog nav_icon'></i>
                            <span class="nav_name">Master</span>
                        </a>
                        <div class="masterMenu collapse drop">
                            <?php if($_SESSION['crmid'] == '3077' || $_SESSION['crmid'] == '3047' || $_SESSION['crmid'] == '3025' || $_SESSION['crmid'] == '3098' || $_SESSION['crmid'] == '3064' || $_SESSION['crmid'] == '1032' || $_SESSION['crmid'] == '3063' || $_SESSION['crmid'] == '2135') { ?>
                            <a class="nav_link" href="po\add_master\category.php">
                                <span class="nav_name">&nbsp; Item Master</span>
                            </a>
                            <a class="nav_link" href="po\add_master\modifyItem.php">
                                <span class="nav_name">&nbsp; Modify Item</span>
                            </a>
                            <a class="nav_link" href="po\add_master\showparty.php">
                                <span class="nav_name">&nbsp; Party Master</span>
                            </a>
                            <?php } ?>
                            <a class="nav_link" href="po\add_master\set_Item_limit.php">
                                <span class="nav_name">&nbsp; Set Item Limit</span>
                            </a>
                            <a class="nav_link" href="po\add_master\make_by_master.php">
                                <span class="nav_name">&nbsp; Make By</span>
                            </a>
                            <a class="nav_link" href="po\add_master\modelno_master.php">
                                <span class="nav_name">&nbsp; Model No</span>
                            </a>
                            <a class="nav_link" href="po\add_master\project_master.php">
                                <span class="nav_name">&nbsp; Project Master</span>
                            </a>
                            <a class="nav_link" href="po\add_master\employee_master.php">
                                <span class="nav_name">&nbsp; EMP Machine Master</span>
                            </a>
                        </div>
                        <a class="sub-btn nav_link mb-1" id="materialMenu">
                            <i class='bx bxs-truck nav_icon'></i>
                            <span class="nav_name">Material Shifting</span>
                        </a>
                        <div class="materialMenu collapse drop">
                            <a class="nav_link" href="po\ms\dashboard.php">
                                <span class="nav_name">&nbsp; Dashboard</span>
                            </a>
                            <!-- <a class="nav_link" href="http://103.53.72.188:5556/inward-outward/index.php">
                                <span class="nav_name">&nbsp; Old MS</span>
                            </a> -->
                        </div>
                        <?php if($_SESSION['crmid'] == '3063' || $_SESSION['crmid'] == '3077' || $_SESSION['crmid'] == '3047' || $_SESSION['crmid'] == '3025' || $_SESSION['crmid'] == '3064' || $_SESSION['crmid'] == '1023') { ?>
                        <a class="sub-btn nav_link mb-1" id="reportsMenu">
                            <i class='bx bxs-report nav_icon'></i>
                            <span class="nav_name">Reports</span>
                        </a>
                        <div class="reportsMenu collapse drop">
                            <a class="nav_link" href="po\reports\itemReport.php">
                                <span class="nav_name">&nbsp; Item Report</span>
                            </a>
                            <a class="nav_link" href="po\reports\pvcReports.php">
                                <span class="nav_name">&nbsp; PVC Report</span>
                            </a>
                            <a class="nav_link" href="po\reports\partyReport.php">
                                <span class="nav_name">&nbsp; Party Report</span>
                            </a>
                            <a class="nav_link" href="po\reports\machineReport.php">
                                <span class="nav_name">&nbsp; Machine Report</span>
                            </a>
                        </div>
                    <?php } ?>
                        <!-- <a href="#" class="nav_link" id="joinForm">
                            <i class='bx bx-user-plus nav_icon'></i>
                            <span class="nav_name">Joining</span>
                        </a>
                        <a href="#" class="nav_link" id="device">
                            <i class='bx bx-devices nav_icon'></i>
                            <span class="nav_name">Mobile-Device</span>
                        </a>
                        <a href="#" class="nav_link" id="leaveRep">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Leave</span>
                        </a> 
                        <a href="#" class="nav_link" id="policy">
                            <i class='bx bx-message-square-detail nav_icon'></i>
                            <span class="nav_name">Policy</span>
                        </a> 
                        <a href="#" class="nav_link">
                            <i class='bx bx-bookmark nav_icon'></i>
                            <span class="nav_name">Penalty</span>
                        </a> 
                        <a href="#" class="nav_link" id="warning">
                            <i class='bx bx-folder nav_icon'></i>
                            <span class="nav_name">Warning</span>
                        </a>
                        <a href="#" class="nav_link" id="circular"> 
                            <i class='bx bx-file nav_icon'></i>
                            <span class="nav_name">Circulars</span>
                        </a>
                        <a href="#" class="nav_link" id="work"> 
                            <i class='bx bx-clipboard nav_icon'></i>
                            <span class="nav_name">Work Report</span>
                        </a> 
                        <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a>  -->
                    </div>
                </div> 
                <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100">
      