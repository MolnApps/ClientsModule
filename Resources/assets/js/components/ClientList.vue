<template>
	<div>
		<client-view 
			v-for="client in clients" 
			:key="client.id" 
			:is-editable="isEditable"
			:client="client" 
			:countries="countries"
			:all-custom-fields="allCustomFields"
		></client-view>
	</div>
</template>

<script>
	export default {
		props: ['is-editable', 'clients', 'countries', 'all-custom-fields'],
	}
</script>