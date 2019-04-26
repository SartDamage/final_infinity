


<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>

</title><link href="./dist/css/report.css" rel="stylesheet" /><link href="./dist/css/adminlayout.css" rel="stylesheet" />
</head>
<body>
    <form method="post" action="" id="Form_report">

        <div class="hmms_report">
            <div class="hmms_hdr">
                <div class="hmms_hdr_lft">
                    <table>
                        <tr>
                            <td>Lab ID</td>
                            <td>:</td>
                            <td class="font-RobotoBold">
                                <span id="ctl00_lbllabid"></span></td>
                        </tr>
                        <tr>
                            <td>Patient Name</td>
                            <td>:</td>
                            <td class="font-RobotoBold"><span id="ctl00_lblpatientname"></span></td>
                        </tr>
                        <tr>
                            <td>Ref. By</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Cons. Dr.</td>
                            <td>:</td>
                            <td><span id="ctl00_lblconsdr"></span></td>
                        </tr>
                    </table>
                </div>
                <div class="hmms_hdr_rgt">
                    <table>
                        <tr>
                            <td>Reg. Date</td>
                            <td>:</td>
                            <td><span id="ctl00_lblregdate"></span></td>
                        </tr>
                        <tr>
                            <td>Report Date</td>
                            <td>:</td>
                            <td><span id="ctl00_lblreportdate"></span></td>
                        </tr>
                        <tr>
                            <td>Age/Sex</td>
                            <td>:</td>
                            <td><span id="ctl00_lblage_sex"></span></td>
                        </tr>
                        <tr>
                            <td>Sample Collected</td>
                            <td>:</td>
                            <td>Lab</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div>
                
    <input type="hidden" name="ctl00$reportmaster$hfAdminID" id="ctl00_reportmaster_hfAdminID" value="Kevt2BDBrasaANu3mJMvOQ==" />
    <input type="hidden" name="ctl00$reportmaster$hfCBCESRID" id="ctl00_reportmaster_hfCBCESRID" value="0" />
    <div class="hmms_hdr">
        <div class="">
            <div class="hmms-reprtname">CBC+ESR</div>
        </div>
        <div class="profile_tbl">
            <table class="width-100">
                <tr>
                    <td class="font-RobotoBold width-40">TEST DESCRIPTION</td>
                    <td class="font-RobotoBold width-20 text-center">RESULT</td>
                    <td class="font-RobotoBold width-40">REFERENCE RANGE</td>
                </tr>
                <tr>
                    <td class="width-40">Haemoglobin</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtHaemoglobin" type="text" maxlength="100" id="ctl00_reportmaster_txtHaemoglobin" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">male : 14 - 16 g%<br />
                        Female : 12 - 14 g%<br />
                    </td>
                </tr>
                <tr>
                    <td class="width-40">RBC Count</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtRBCCount" type="text" maxlength="100" id="ctl00_reportmaster_txtRBCCount" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">14 - 16g%</td>
                </tr>
                <tr>
                    <td class="width-40">PCV</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtPCV" type="text" maxlength="100" id="ctl00_reportmaster_txtPCV" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">35 - 45 %</td>
                </tr>
                <tr>
                    <td class="width-40">MCV</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtMCV" type="text" maxlength="100" id="ctl00_reportmaster_txtMCV" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">80 - 99 fl</td>
                </tr>
                <tr>
                    <td class="width-40">MCH</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtMCH" type="text" maxlength="100" id="ctl00_reportmaster_txtMCH" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">28 - 32 pg</td>
                </tr>
                <tr>
                    <td class="width-40">MCHC</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtMCHC" type="text" maxlength="100" id="ctl00_reportmaster_txtMCHC" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">30 - 34 %</td>
                </tr>
                <tr>
                    <td class="width-40">RDW</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtRDW" type="text" maxlength="100" id="ctl00_reportmaster_txtRDW" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">9 - 17 fl</td>
                </tr>
                <tr>
                    <td class="width-40">Total WBC Count</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtTotalWBCCount" type="text" maxlength="100" id="ctl00_reportmaster_txtTotalWBCCount" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">4000 - 11000 / cu.mm</td>
                </tr>
                <tr>
                    <td class="width-40">Neutrophils</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtNeutrophils" type="text" maxlength="100" id="ctl00_reportmaster_txtNeutrophils" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">40 - 75 %</td>
                </tr>
                <tr>
                    <td class="width-40">Lymphocytes</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtLymphocytes" type="text" maxlength="100" id="ctl00_reportmaster_txtLymphocytes" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">20 - 45 %</td>
                </tr>
                <tr>
                    <td class="width-40">Eosinophils</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtEosinophils" type="text" maxlength="100" id="ctl00_reportmaster_txtEosinophils" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">00 - 06 %</td>
                </tr>
                <tr>
                    <td class="width-40">Monocytes</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtMonocytes" type="text" maxlength="100" id="ctl00_reportmaster_txtMonocytes" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">00 - 10 %</td>
                </tr>
                <tr>
                    <td class="width-40">Basophils</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtBasophils" type="text" maxlength="100" id="ctl00_reportmaster_txtBasophils" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">00 - 01 %</td>
                </tr>
                <tr>
                    <td class="width-40">Platelet Count </td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtPlateletCount" type="text" maxlength="100" id="ctl00_reportmaster_txtPlateletCount" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">150000 - 450000 / cu.mm</td>
                </tr>
                <tr>
                    <td class="width-40">Platelets on Smear</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtPlateletsonSmear" type="text" maxlength="100" id="ctl00_reportmaster_txtPlateletsonSmear" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
                <tr>
                    <td class="width-40">RBC Morphology</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtRBCMorphology" type="text" maxlength="100" id="ctl00_reportmaster_txtRBCMorphology" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
                <tr>
                    <td class="width-40">WBCs on PS</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtWBCsonPS" type="text" maxlength="100" id="ctl00_reportmaster_txtWBCsonPS" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
                <tr>
                    <td class="width-40">E.S.R. at the end of 1 hour</td>
                    <td class="width-20 text-center">
                        <input name="ctl00$reportmaster$txtESR" type="text" maxlength="100" id="ctl00_reportmaster_txtESR" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">0 - 20 mm at 1 hour
                    </td>
                </tr>
            </table>
        </div>
        <div class="hmms-rptnote">
            <span>Note:Test done on Nihon Kohden MEK- 6420K fully automated cell counter.</span>
            <span class="text-center margin-bottom-60 ">--END OF REPORT--</span>

        </div>
        <div class="hmms-click">
            <input type="submit" name="ctl00$reportmaster$btnSave" value="Save" id="ctl00_reportmaster_btnSave" class="btn-css primry-colr" />
        </div>
    </div>

            </div>
        </div>
    </form>
</body>
</html>
