

<?php include $_SERVER['DOCUMENT_ROOT']."/include/include_in_patho_report.php"; ?><body>
    <form method="post" action="" id="aspnetForm" class="section-to-print">
        <div class="hmms_report">
            <div class="hmms_hdr">
                 <?php include $_SERVER['DOCUMENT_ROOT']."/include/patho_report_header_lbl.php";?>
            </div>
            <div>
                
    <input type="hidden" name="ctl00$reportmaster$hfAdminID" id="ctl00_reportmaster_hfAdminID" />
    <input type="hidden" name="ctl00$reportmaster$hfLIPID" id="ctl00_reportmaster_hfLIPID" value="0" />
    <div class="hmms_hdr">
        <div class="">
            <div class="hmms-reprtname">HVC</div>
        </div>
        <div class="profile_tbl">
            <table class="width-100">
                <tr>
                    <td class="font-RobotoBold width-40">TEST DESCRIPTION</td>
                    <td class="font-RobotoBold width-20 text-center">RESULT</td>
                    <td class="font-RobotoBold width-40">REFERENCE RANGE</td>
                </tr>
                <tr>
                    <td class="width-40">HCV Antibody</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtHCVAntibody" type="text" maxlength="100" id="ctl00_reportmaster_txtHCVAntibody" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
                <tr>
                    <td class="width-40">Result</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtResult" type="text" maxlength="100" id="ctl00_reportmaster_txtResult" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
            </table>
        </div>
        <div class="hmms-rptnote">
            <span>Method - Rapid Card Test<br />
Material Used -J.Mitra (Tridot)</span>
            <span class="text-center margin-bottom-60 ">--END OF REPORT--</span>

        </div>
        <div class="hmms-click section-notto-print"><input type="submit" name="ctl00_reportmaster_btnSave" value="Save" id="ctl00_reportmaster_btnSave" class="btn-css primry-colr" /><?php $db = getDB();  $statement=$db->prepare("SELECT  *  FROM `pathopatientregistrationmaster`  WHERE  `PatientId`=:PathoRegID  AND `payment`=0" );  $statement->bindParam(':PathoRegID', $ID, PDO::PARAM_INT); $statement->execute();  if ( $statement->rowCount() <= 0){ echo '<input type="button"   name="ctl00_reportmaster_btnPrint" value="Print" id="ctl00_reportmaster_btnPrint" class="btn-css primry-colr pull-right" />';}?>
        </div>
    </div>


            </div>
        </div>
    </form>
</body>
	<script>
	</script>
<?php include $_SERVER["DOCUMENT_ROOT"]."/include/include_in_patho_report_footer.php";?>
