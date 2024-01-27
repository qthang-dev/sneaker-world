<template>
    <div>
        <the-header></the-header>
        <b-container fluid>
            <b-row>
                <b-col cols="3" id="left-menu">
                    <the-left-menu></the-left-menu>
                </b-col>
                <b-col>
                    <base-table-admin></base-table-admin>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<script>
import TheHeader from './TheHeader.vue'
import TheLeftMenu from './TheLeftMenu.vue'
import BaseTableAdmin from './BaseTableAdmin.vue'

export default {
    name: 'App',
    components: {
        TheHeader,
        TheLeftMenu,
        BaseTableAdmin
    }
}
</script>

<style>
    
</style>