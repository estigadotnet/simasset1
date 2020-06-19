<?php
namespace PHPMaker2020\p_simasset1;
?>
<?php if ($t004_asset->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_t004_assetmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($t004_asset->property_id->Visible) { // property_id ?>
		<tr id="r_property_id">
			<td class="<?php echo $t004_asset->TableLeftColumnClass ?>"><?php echo $t004_asset->property_id->caption() ?></td>
			<td <?php echo $t004_asset->property_id->cellAttributes() ?>>
<span id="el_t004_asset_property_id">
<span<?php echo $t004_asset->property_id->viewAttributes() ?>><?php echo $t004_asset->property_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t004_asset->department_id->Visible) { // department_id ?>
		<tr id="r_department_id">
			<td class="<?php echo $t004_asset->TableLeftColumnClass ?>"><?php echo $t004_asset->department_id->caption() ?></td>
			<td <?php echo $t004_asset->department_id->cellAttributes() ?>>
<span id="el_t004_asset_department_id">
<span<?php echo $t004_asset->department_id->viewAttributes() ?>><?php echo $t004_asset->department_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t004_asset->signature_id->Visible) { // signature_id ?>
		<tr id="r_signature_id">
			<td class="<?php echo $t004_asset->TableLeftColumnClass ?>"><?php echo $t004_asset->signature_id->caption() ?></td>
			<td <?php echo $t004_asset->signature_id->cellAttributes() ?>>
<span id="el_t004_asset_signature_id">
<span<?php echo $t004_asset->signature_id->viewAttributes() ?>><?php echo $t004_asset->signature_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t004_asset->Code->Visible) { // Code ?>
		<tr id="r_Code">
			<td class="<?php echo $t004_asset->TableLeftColumnClass ?>"><?php echo $t004_asset->Code->caption() ?></td>
			<td <?php echo $t004_asset->Code->cellAttributes() ?>>
<span id="el_t004_asset_Code">
<span<?php echo $t004_asset->Code->viewAttributes() ?>><?php echo $t004_asset->Code->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t004_asset->Description->Visible) { // Description ?>
		<tr id="r_Description">
			<td class="<?php echo $t004_asset->TableLeftColumnClass ?>"><?php echo $t004_asset->Description->caption() ?></td>
			<td <?php echo $t004_asset->Description->cellAttributes() ?>>
<span id="el_t004_asset_Description">
<span<?php echo $t004_asset->Description->viewAttributes() ?>><?php echo $t004_asset->Description->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t004_asset->group_id->Visible) { // group_id ?>
		<tr id="r_group_id">
			<td class="<?php echo $t004_asset->TableLeftColumnClass ?>"><?php echo $t004_asset->group_id->caption() ?></td>
			<td <?php echo $t004_asset->group_id->cellAttributes() ?>>
<span id="el_t004_asset_group_id">
<span<?php echo $t004_asset->group_id->viewAttributes() ?>><?php echo $t004_asset->group_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t004_asset->ProcurementDate->Visible) { // ProcurementDate ?>
		<tr id="r_ProcurementDate">
			<td class="<?php echo $t004_asset->TableLeftColumnClass ?>"><?php echo $t004_asset->ProcurementDate->caption() ?></td>
			<td <?php echo $t004_asset->ProcurementDate->cellAttributes() ?>>
<span id="el_t004_asset_ProcurementDate">
<span<?php echo $t004_asset->ProcurementDate->viewAttributes() ?>><?php echo $t004_asset->ProcurementDate->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t004_asset->ProcurementCurrentCost->Visible) { // ProcurementCurrentCost ?>
		<tr id="r_ProcurementCurrentCost">
			<td class="<?php echo $t004_asset->TableLeftColumnClass ?>"><?php echo $t004_asset->ProcurementCurrentCost->caption() ?></td>
			<td <?php echo $t004_asset->ProcurementCurrentCost->cellAttributes() ?>>
<span id="el_t004_asset_ProcurementCurrentCost">
<span<?php echo $t004_asset->ProcurementCurrentCost->viewAttributes() ?>><?php echo $t004_asset->ProcurementCurrentCost->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t004_asset->Salvage->Visible) { // Salvage ?>
		<tr id="r_Salvage">
			<td class="<?php echo $t004_asset->TableLeftColumnClass ?>"><?php echo $t004_asset->Salvage->caption() ?></td>
			<td <?php echo $t004_asset->Salvage->cellAttributes() ?>>
<span id="el_t004_asset_Salvage">
<span<?php echo $t004_asset->Salvage->viewAttributes() ?>><?php echo $t004_asset->Salvage->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t004_asset->Qty->Visible) { // Qty ?>
		<tr id="r_Qty">
			<td class="<?php echo $t004_asset->TableLeftColumnClass ?>"><?php echo $t004_asset->Qty->caption() ?></td>
			<td <?php echo $t004_asset->Qty->cellAttributes() ?>>
<span id="el_t004_asset_Qty">
<span<?php echo $t004_asset->Qty->viewAttributes() ?>><?php echo $t004_asset->Qty->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t004_asset->Remarks->Visible) { // Remarks ?>
		<tr id="r_Remarks">
			<td class="<?php echo $t004_asset->TableLeftColumnClass ?>"><?php echo $t004_asset->Remarks->caption() ?></td>
			<td <?php echo $t004_asset->Remarks->cellAttributes() ?>>
<span id="el_t004_asset_Remarks">
<span<?php echo $t004_asset->Remarks->viewAttributes() ?>><?php echo $t004_asset->Remarks->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>