<template>
    <div>
        <b-navbar toggleable="lg" type="dark">
            <b-navbar-brand href="#">Sneaker World</b-navbar-brand>
            <b-navbar-nav v-if="!isAdmin">
                <b-nav-item href="#">NMD</b-nav-item>
                <b-nav-item href="#">Adizero</b-nav-item>
                <b-nav-item href="#">Samba</b-nav-item>
                <b-nav-item href="#">Adizero</b-nav-item>
                <b-nav-item href="#">Gazelle</b-nav-item>
                <b-nav-item href="#">Ultraboost</b-nav-item>
                <b-nav-item href="#">Stan Smith</b-nav-item>
                <b-nav-item href="#">Superstar</b-nav-item>
                <b-nav-item href="#">Adilette</b-nav-item>
            </b-navbar-nav>

            <!-- Right aligned nav items -->
            <b-navbar-nav class="ml-auto">
                <b-nav-item-dropdown text="User" right>
                    <b-dropdown-item href="#">Profile</b-dropdown-item>
                    <b-dropdown-item href="#">Wishlist</b-dropdown-item>
                    <b-dropdown-item href="#">Log out</b-dropdown-item>
                </b-nav-item-dropdown>
            </b-navbar-nav>
        </b-navbar>
    </div>
</template>

<script>
export default {
    name: 'TheHeader',
    data: function () {
        return {
            isAdmin: true
        }
    }
}
</script>