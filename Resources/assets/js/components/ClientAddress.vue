<template>
	<div class="Group">
		<!-- View mode -->
		<div class="Group__content ClientAddress" v-if="! isEditing">
			{{ address.address1 }}<br/>
			<span v-if="address.address2">{{ address.address2 }}<br/></span>
			{{ address.postalCode }}, {{ address.city }}, {{ countryName }}<br/>
		</div>
		<!-- Edit mode -->
		<div class="ClientAddressForm" v-if="isEditing">
			<input type="text" v-model="address.address1" /><br/>
			<input type="text" v-model="address.address2" /><br/>
			<input type="text" v-model="address.postalCode" /><br/>
			<input type="text" v-model="address.province" /><br/>
			<select v-model="address.countryCode">
				<option v-for="country in countries" :value="country.code">{{ country.name }}</option>
			</select><br/>
		</div>
		<!-- Actions -->
		<form-actions :is-editable="isEditable" @save="saveClient" @cancel="cancel" @edit="editClient"></form-actions>
	</div>
</template>

<script>
	export default {
		props: ['is-editable', 'client-address', 'countries'],
		data: function() {
			return {
				isEditing: false,
				address: {},
				tempAddress: {}
			};
		},
		computed: {
			countryName: function() {
				return this.countries.filter((country) => {
					return country.code == this.address.countryCode;
				})[0].name;
			}
		},
		created: function() {
			this.address = this.clientAddress;
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
				this.isEditing = false;
				this.restoreData();
			},
			cacheData: function() {
				this.tempAddress = {
					address1: this.address.address1,
					address2: this.address.address2,
					postalCode: this.address.postalCode,
					city: this.address.city,
					province: this.address.province,
					countryCode: this.address.countryCode,
				}
			},
			restoreData: function() {
				this.address = this.tempAddress;
			},
			saveData: function() {
				console.log('save the client address with an axios call');
			}
		}
	}
</script>