<template>
	<div>
		<client-address 
			v-for="address in client.addresses" 
			:key="address.id"
			:is-editable="isEditable"
			:client-address="address" 
			:countries="countries"
		></client-address>
	</div>
</template>

<script>
	export default {
		props: ['client', 'countries', 'is-editable']
	}
</script>