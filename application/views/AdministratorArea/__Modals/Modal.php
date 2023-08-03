<div class="modal fade" id="modal">
	<div class="modal-dialog">
		<div class="modal-content modal-main">
			<div class="modal-content">
				<div class="portlet light bordegreen">
					<div class="portlet-title">
						<div class="caption font-green-thunderbird">
							<i class="fa fa-check font-green-thunderbird"></i>
							<span class="caption-subject bold uppercase"> Modal </span>
						</div>
					</div>
					
					<div style="text-align: center;">
						<div class="caption font-green-thunderbird row" style="padding-top: 30px;padding-bottom: 50px;">
							<i class="fa fa-check font-green-thunderbird"></i>
							<!-- <br> -->
							<span class="caption-subject bold uppercase"> Are you sure to save ?<br><small>Save will overwrite previous data </small></span><br><br>
							<button type="button" class="btn red-thunderbird" id="save-button" onclick="$('#building_form').submit();$('#modal').modal('hide')">Save Changes</button>
							<button type="button" class="btn red btn-outline" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>