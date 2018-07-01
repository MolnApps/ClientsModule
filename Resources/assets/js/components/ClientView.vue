<template>
	<div class="Client">
		<h3 class="Title">Basic info</h3>
		<client-basic-info 
			:client="client" 
			:is-editable="isEditable"
		></client-basic-info>
		<h3 class="Title">Address</h3>
		<client-address-list 
			:client="client" 
			:countries="countries" 
			:is-editable="isEditable"
		></client-address-list>
		<h3 class="Title">Custom fields</h3>
		<client-custom-fields 
			:client="client" 
			:all-custom-fields="allCustomFields" 
			:is-editable="isEditable"
		></client-custom-fields>
	</div>
</template>

<script>
	export default {
		props: ['is-editable', 'client', 'countries', 'all-custom-fields']
	}
</script>