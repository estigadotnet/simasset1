<?php
namespace PHPMaker2020\p_simasset1;
?>
<?php if ($t005_assetgroup->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_t005_assetgroupmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($t005_assetgroup->Code->Visible) { // Code ?>
		<tr id="r_Code">
			<td class="<?php echo $t005_assetgroup->TableLeftColumnClass ?>"><?php echo $t005_assetgroup->Code->caption() ?></td>
			<td <?php echo $t005_assetgroup->Code->cellAttributes() ?>>
<span id="el_t005_assetgroup_Code">
<span<?php echo $t005_assetgroup->Code->viewAttributes() ?>><?php echo $t005_assetgroup->Code->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t005_assetgroup->Description->Visible) { // Description ?>
		<tr id="r_Description">
			<td class="<?php echo $t005_assetgroup->TableLeftColumnClass ?>"><?php echo $t005_assetgroup->Description->caption() ?></td>
			<td <?php echo $t005_assetgroup->Description->cellAttributes() ?>>
<span id="el_t005_assetgroup_Description">
<span<?php echo $t005_assetgroup->Description->viewAttributes() ?>><?php echo $t005_assetgroup->Description->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t005_assetgroup->EstimatedLife->Visible) { // EstimatedLife ?>
		<tr id="r_EstimatedLife">
			<td class="<?php echo $t005_assetgroup->TableLeftColumnClass ?>"><?php echo $t005_assetgroup->EstimatedLife->caption() ?></td>
			<td <?php echo $t005_assetgroup->EstimatedLife->cellAttributes() ?>>
<span id="el_t005_assetgroup_EstimatedLife">
<span<?php echo $t005_assetgroup->EstimatedLife->viewAttributes() ?>><?php echo $t005_assetgroup->EstimatedLife->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t005_assetgroup->SLN->Visible) { // SLN ?>
		<tr id="r_SLN">
			<td class="<?php echo $t005_assetgroup->TableLeftColumnClass ?>"><?php echo $t005_assetgroup->SLN->caption() ?></td>
			<td <?php echo $t005_assetgroup->SLN->cellAttributes() ?>>
<span id="el_t005_assetgroup_SLN">
<span<?php echo $t005_assetgroup->SLN->viewAttributes() ?>><?php echo $t005_assetgroup->SLN->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>