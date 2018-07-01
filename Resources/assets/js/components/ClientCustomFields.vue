<template>
	<div class="Group">
		<!-- View mode -->
		<div class="Group__content ClientCustomFields" v-if="! isEditing">
			<div v-for="customField in customFields">
				<strong>{{ customFieldTitle(customField.custom_field_id) }}: </strong>
				{{ customField.value }}<br/>
			</div>
			<slot name="foobar"></slot>
		</div>
		<!-- Edit mode -->
		<div class="ClientCustomFieldsForm" v-if="isEditing">
			<input type="text" v-for="customField in customFields" v-model="customField.value" /><br/>
		</div>
		<!-- Actions -->
		<form-actions @save="saveClient" @cancel="cancel" @edit="editClient" :is-editable="isEditable"></form-actions>
	</div>
</template>

<script>
	export default {
		props: ['client', 'all-custom-fields', 'is-editable'],
		data: function() {
			return {
				isEditing: false,
				customFields: [],
				tempCustomFields: []
			};
		},
		created: function() {
			this.customFields = this.client.customFields;
		},
		methods: {
			customFieldTitle: function(id) {
				return this.allCustomFields.filter((customField) => {
					return customField.id == id;
				})[0].title;
			},
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
				this.tempCustomFields = [];
				this.customFields.forEach((customField) => {
					this.tempCustomFields.push({
						name: customField.name,
						value: customField.value
					});
				});
			},
			restoreData: function() {
				this.customFields = this.tempCustomFields;
			},
			saveData: function()
			{
				console.log('save the client custom fields with an axios call');
			}
		}
	}
</script>