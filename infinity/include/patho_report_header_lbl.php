
			<div>
				<br>
				<center>
					<h3 class="hr_special"><?PHP ECHO $hos_name;?></h3>
				</center>
				<hr class="hr_special">
				<center><?PHP ECHO $hos_add;?>. || Gst no.<?PHP ECHO $gst_no_hos;?><br>  Mob.: <?PHP ECHO $contact;?></center>
				<hr>
				<br>
			</div>
			<br>
			<div class="hmms_hdr_lft">
                    <table width="100%">
                        <tr>
                            <td>Reg. Label</td>
                            <td>:</td>
							<td><img id="barcode1"/></td>
                        </tr>
                        <tr>
                            <td>Lab ID</td>
                            <td>:</td>
                            <td class="font-RobotoBold"><span id="ctl00_lbllabid"></span></td>
                        </tr>
                        <tr>
                            <td>Patient Name</td>
                            <td>:</td>
                            <td class="font-RobotoBold"><span id="ctl00_lblpatientname"></span></td>
                        </tr>
						<tr>
                            <td>Patient ID</td>
                            <td>:</td>
                            <td class="font-RobotoBold"><span id="ctl00_lblpatid"></span></td>
                        </tr>
                        <tr>
                            <td>Ref. By</td>
                            <td>:</td>
                            <td><span id="ctl00_lbldrname"></span></td>
                        </tr>
                        <tr hidden>
                            <td>Cons. Dr.</td>
                            <td>:</td>
                            <td><span id="ctl00_lblconsdr"></span></td>
                        </tr>
                    </table>
                </div>
                <div class="hmms_hdr_rgt">
                    <table>
                        <tr>
                            <td>Registration ID</td>
                            <td>:</td>
                            <td class="font-RobotoBold"><span id="ctl00_lblregID"></span></td>
                        </tr>
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
                            <td><span id="ctl00_lblsample"></span></td>
                        </tr>
						<tr hidden>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>
<input type="hidden" name="ctl00_reportmaster_AdminID" id="ctl00_reportmaster_AdminID" value="<?php echo (base64_encode($userDetails->ID));  ?>"/>
<input type="hidden" name="ctl00_reportmaster_RegID" id="ctl00_reportmaster_RegID"  value="" />
<input type="hidden" name="ctl00_reportmaster_PatID" id="ctl00_reportmaster_PatID"  value="" />
	