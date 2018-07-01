<template>
	<div class="Group">
		<!-- View mode -->
		<div class="Group__content ClientBasicInfo" v-if="! isEditing">
			{{ basicInfo.name }}<br/>
		</div>
		<!-- Edit mode -->
		<div class="ClientBasicInfoForm" v-if="isEditing">
			<input type="text" v-model="basicInfo.name" /><br/>
		</div>
		<!-- Actions -->
		<form-actions @save="saveClient" @cancel="cancel" @edit="editClient" :is-editable="isEditable"></form-actions>
	</div>
</template>

<script>
	export default {
		props: ['client', 'is-editable'],
		data: function() {
			return {
				isEditing: false,
				basicInfo: {},
				tempBasicInfo: {}
			};
		},
		created: function() {
			this.basicInfo = this.client.basicInfo;
		},
		methods: {
			editClient: function() {
				this.cacheData();
				this.isEditing = true;
			},
			saveClient: function() {
				this.saveData();
				this.isEditing = false;
			},
			cancel: function() {
				this.restoreData();
				this.isEditing = false;
			},
			cacheData: function() {
				this.tempBasicInfo = {
					name: this.basicInfo.name
				}
			},
			restoreData: function() {
				this.basicInfo = this.tempBasicInfo;
			},
			saveData: function() {
				console.log('save the client basic info with an axios call');
			}
		}
	}
</script>